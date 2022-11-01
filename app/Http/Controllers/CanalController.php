<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Canal;
use App\Models\User;

class CanalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('search');

        if($search){
            $canais = Canal::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $canais = Canal::all()->where('estado', 1);
        }

        return view('welcome', ['canais'=>$canais, 'search'=>$search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('canal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $canal = new Canal;
        $user = auth()->user();

        $canal->nome = $request->nome;
        $canal->descricao = $request->descricao;
        $canal->admin = $user->id;
        $canal->estado = 1;

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImage = $request->imagem;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime('now')).".".$extension;

            //Adicionar imagem no banco
            $request->imagem->move(public_path('imgs/canais'), $imageName);
            $canal->imagem = $imageName;
        }

        $canal->save();

        return redirect('/')->with('msg', 'Canal Criado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $canal = Canal::findOrFail($id);

        $admin = User::where('id', $canal->admin)->first()->toArray();

        return view('canal.show', ['canal'=>$canal, 'admin'=>$admin]);
    }

    public function dashboard(){
        $user = auth()->user();
        $canal = $user->canal;

        return view('canal.dashboard', ['canais'=>$canal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
