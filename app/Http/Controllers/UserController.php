<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Permission;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function telaEditar($user){
        $listarDadosPermission = Permission::all(['id','name']) ;

        if(!$idEditar = User::find($user)){
            return response()->json(["msg" => 'ID inválido!']);

        }          

        $permissionId = $idEditar->permissions()->first()->id ?? null;

        return view('editar', compact('idEditar','listarDadosPermission', 'permissionId'));
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
            return redirect()->route('tela-principal');
        }else{
            return view('login')->with('message','Usuário não possui cadastro!');
        }


    }

    public function store(CreateRequest $request)
    {
        $senha = $request->password;
        $senha = bcrypt($request->password);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $senha,
        ]);

        $user->permissions()->attach([$request->permissionId]);

        return redirect()->route('tela-cadastrar')->with('message','Cadastrado com sucesso!');
    }

    public function update(Request $request, $user)
    {     

        if(!$idEditar = User::find($user)){
           return redirect()->route('tela-admin')->with("msg",'ID inválido!');
        }        

        $dadosUpdate = [];        

        $dadosUpdate['name'] = $request->name;
        $dadosUpdate['email'] = $request->email;

        if(!empty($request->password)){

            $dadosUpdate['password'] = $request->password;
        }        
        
        $idEditar->update($dadosUpdate);

        $permissionIdTela = (int) $request->permissionId;

        $permissionIdBanco = $idEditar->permissions()->first()->id ?? null;        

        if($permissionIdBanco != null && $permissionIdTela != $permissionIdBanco){
            $idEditar->permissions()->detach([$permissionIdBanco]);
            $idEditar->permissions()->attach([$permissionIdTela]);
        }

        

        return redirect()->route('tela-admin')->with("message","Atualização Realizada com Sucesso!");
    }


    public function destroy($user)
    {

        if(!$id = User::find($user)){
            return redirect()->route('admin')->with("msg", 'ID inválido!');
        }

        $id->delete();

        return redirect()->route('tela-admin')->with("msg","Deletado com sucesso!");
    }

}
