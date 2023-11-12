<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateRequest;
use App\Jobs\SendEmailJob;
use App\Models\Permission;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Kutia\Larafirebase\Facades\Larafirebase;

class UserController extends Controller
{

    public function telaLogin(){
        return view('login');
    }

    public function telaPrincipal(){
        return view('principal');
    }

    public function telaAdmin(){
        $list_users = User::all();
        return view('admin', compact('list_users'));
    }

    public function telaCadastrar(){
        $listarDadosPermission = Permission::all(['id','name']) ;

        return view('cadastrar', compact('listarDadosPermission'));
    }

    public function telaEditar($userId){

        $listarDadosPermission = Permission::all(['id','name']) ;
        

        if(!$user = User::find($userId)){
            return response()->json(["msg" => 'ID inválido!']);

        }

        $permissionId = $user->permissions()->first()->id ?? null;
        

        return view('editar', compact('user','listarDadosPermission', 'permissionId'));
    }

    public function index()
    {
        $list_users = User::all();
        return view('admin', compact('list_users'));
    }

    public function autenticarUsuario(LoginRequest $request){
        $email = $request->email;
        $password = $request->password;

        $verificarUsuario = Auth::attempt(['email'=>$email,'password'=>$password]);

        if($verificarUsuario){

            // $userPermission = DB::select('select * from user_permissions where user_id = ? order by permission_id ASC limit 1',[Auth::user()->id]);
            $userPermission = DB::select('select * from user_permissions where user_id = ?',[Auth::user()->id]);
            $permissionId = !empty($userPermission[0]) ? $userPermission[0]->permission_id : null;

            session(['permissionId' => $permissionId]);
            return redirect()->route('tela-principal');
        }else{
            return redirect()->route('login')->with('message','Usuário não possui cadastro!');
        }

    }

    public function sair(){
        Auth::logout();
        return redirect()->route('tela-login');
    }

    public function store(CreateRequest $request)
    {

        $senha = bcrypt($request->password);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $senha,
        ]);

        $user->permissions()->attach([$request->permissionId]);

        dispatch(new SendEmailJob($user));


        return redirect()->route('tela-cadastrar')->with('message','Cadastrado com sucesso!');
    }

    public function update(UpdateRequest $request, $userId)
    {     
        if(!$user = User::find($userId)){
           return redirect()->route('tela-admin')->with("msg",'ID inválido!');
        }        

        $dadosUpdate = [];        

        $dadosUpdate['name'] = $request->name;
        $dadosUpdate['email'] = $request->email;

        if(!empty($request->password)){

            $dadosUpdate['password'] = $request->password;
        }        
        
        $user->update($dadosUpdate);

        $this->sendNotification($user);

        $permissionIdTela = (int) $request->permissionId;

        $permissionIdBanco = $user->permissions()->first()->id ?? null;        

        if($permissionIdBanco != null && $permissionIdTela != $permissionIdBanco){
            $user->permissions()->detach([$permissionIdBanco]);
            $user->permissions()->attach([$permissionIdTela]);
        }        

        return redirect()->route('tela-admin')->with("message","Atualização Realizada com Sucesso!");
    }


    public function destroy($userId)
    {

        if(!$user = User::find($userId)){
            return redirect()->route('admin')->with("msg", 'ID inválido!');
        }

        $user->permissions()->detach();
        $user->delete();

        return redirect()->route('tela-admin')->with("msg","Deletado com sucesso!");
    }

    public function updateToken(Request $request){
        try{
            $request->user()->update(['fcm_token'=>$request->token]);
            return response()->json([
                'success'=>true
            ]);
        }catch(\Exception $e){
            report($e);
            return response()->json([
                'success'=>false
            ],500);
        }
    }

    private function sendNotification($userId)
    {              
        try{
            $fcmTokens = User::whereNotNull('fcm_token')->where('id','=', $userId )->pluck('fcm_token')->toArray();
            
            Larafirebase::withTitle('Usuário Editado')
                ->withBody('Seu usuário foi editado!')
                ->sendMessage($fcmTokens);           
    
        }catch(\Exception $e){
            report($e);   
        }
    }
}
