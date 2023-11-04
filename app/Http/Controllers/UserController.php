<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_users = User::all();
        return response()->json(["users" => $list_users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {        

        User::create([
            "name" => $request->name,
            "email" => $request->email            
        ]);

        return response()->json(["msg" => "Cadastrado com sucesso!"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
        if(!$id = User::find($user)){
            return response()->json(["msg" => 'ID inválido!']);
        }

        $id->update($request->all());

        return response()->json(["msg" => "Atualização Realizada com Sucesso!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        if(!$id = User::find($user)){
            return response()->json(["msg" => 'ID inválido!']);
        }

        $id->delete();

        return response()->json(["msg" => "Deletado com sucesso!"]);
    }
}
