<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\LoginRequest;
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
        return view('admin');
    }

    public function telaCadastrar(){
        return view('cadastrar');
    }

    public function telaEditar(){
        return view('editar');
    }

    public function index()
    {
        $list_users = User::all();
        return response()->json(["users" => $list_users]);
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
        
        User::create([
            "name" => $request->name,
            "email" => $request->email,            
            "password" => $senha          
        ]);        

        return view('cadastrar')->with('message','Cadastrado com sucesso!');
    }

    public function update(Request $request, $user)
    {
        if(!$id = User::find($user)){
            return response()->json(["msg" => 'ID inválido!']);
        }

        $id->update($request->all());

        return response()->json(["msg" => "Atualização Realizada com Sucesso!"]);
    }

    
    public function destroy($user)
    {
        if(!$id = User::find($user)){
            return response()->json(["msg" => 'ID inválido!']);
        }

        $id->delete();

        return response()->json(["msg" => "Deletado com sucesso!"]);
    }
}
