<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('admin.cliente.listagem', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cliente.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'razao_social' => 'required|min:5',
            'nome_fantasia'=>'required',
            'cnpj'=>'required|min:14',
            'endereco'=>'required',
            'email'=>'required|email',
            'telefone'=>'required',
            'responsavel'=>'required',
            'cpf'=>'required|min:11',
            'celular'=>'required|min:11'
        ]);

        $cliente = Cliente::create($request->all());

        return back()->with('success','Cliente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::where('id',$id)->first();
        return view('admin.cliente.editar',compact('cliente'));
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
        $request->validate([
            'razao_social' => 'required|min:5',
            'nome_fantasia'=>'required',
            'cnpj'=>'required|min:14',
            'endereco'=>'required',
            'email'=>'required|email',
            'telefone'=>'required',
            'responsavel'=>'required',
            'cpf'=>'required|min:11',
            'celular'=>'required|min:11'
        ]);

        $cliente = Cliente::find($id)->update($request->all());

        return back()->with('success','Cliente atualizado com sucesso!');
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
