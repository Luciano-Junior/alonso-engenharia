<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Proposta;
use App\Exports\PropostasExport;
use Maatwebsite\Excel\Facades\Excel;

class PropostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propostas = Proposta::with('cliente')->get();
        return view('admin.index',compact('propostas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('admin.proposta.cadastro',compact('clientes'));
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
            'cliente_id' => 'required',
            'endereco_obra'=>'required',
            'valor_total'=>'required|min:1',
            'sinal'=>'required|min:1',
            'quantidade_parcelas'=>'required|min:1',
            'valor_parcelas'=>'required|min:1',
            'inicio_pagamento'=>'required|date',
            'data_parcelas'=>'required|date',
            'arquivo'=>'mimes:doc,docx,pdf',
            'status'=>'required'
        ]);

        $dados = $request->all();

        if ($request->hasFile('arquivo')) {
            $arquivo = $request->file('arquivo');

            $fileName = $arquivo->getClientOriginalName();
            $request->file('arquivo')->move(public_path('arquivos'), $fileName);
            $dados['arquivo'] = $fileName; 
        }

        $dados['valor_total'] = number_format(str_replace(",",".",str_replace(".","",$dados['valor_total'])), 2, '.', '');
        $dados['sinal'] = number_format(str_replace(",",".",str_replace(".","",$dados['sinal'])), 2, '.', '');
        $dados['valor_parcelas'] = number_format(str_replace(",",".",str_replace(".","",$dados['valor_parcelas'])), 2, '.', '');

        $proposta = Proposta::create($dados);

        return back()->with('success','Proposta cadastrada com sucesso!');
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
        $clientes = Cliente::all();
        $proposta = Proposta::where('id',$id)->first();
        return view('admin.proposta.editar',compact('proposta','clientes'));
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
            'cliente_id' => 'required',
            'endereco_obra'=>'required',
            'valor_total'=>'required|min:1',
            'sinal'=>'required|min:1',
            'quantidade_parcelas'=>'required|min:1',
            'valor_parcelas'=>'required|min:1',
            'inicio_pagamento'=>'required|date',
            'data_parcelas'=>'required|date',
            'arquivo'=>'mimes:doc,docx,pdf',
            'status'=>'required'
        ]);

        $dados = $request->all();

        if ($request->hasFile('arquivo')) {
            $arquivo = $request->file('arquivo');

            $fileName = $arquivo->getClientOriginalName();
            $request->file('arquivo')->move(public_path('arquivos'), $fileName);
            $dados['arquivo'] = $fileName; 
        }

        $dados['valor_total'] = number_format(str_replace(",",".",str_replace(".","",$dados['valor_total'])), 2, '.', '');
        $dados['sinal'] = number_format(str_replace(",",".",str_replace(".","",$dados['sinal'])), 2, '.', '');
        $dados['valor_parcelas'] = number_format(str_replace(",",".",str_replace(".","",$dados['valor_parcelas'])), 2, '.', '');

        $proposta = Proposta::find($id)->update($dados);

        return back()->with('success','Proposta atualizada com sucesso!');
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

    public function export() 
    {
        return Excel::download(new PropostasExport, 'propostas.xlsx');
    }

    public function updateStatus(Request $request){
        $proposta = Proposta::find($request->id)->update(['status'=>$request->status]);
    }

    public function pesquisa(Request $request){
        if($request->tipo == "Cliente"){
            $propostas = Proposta::whereHas('cliente', function ($query) use ($request) {
                $query->where('nome_fantasia', 'like', '%'.$request->pesquisa.'%');
           })->get();
            
        }else if($request->tipo == "Status"){
            $propostas = Proposta::with('cliente')->where('status','like','%'.$request->pesquisa.'%')->get();
        }

        return view('admin.index',compact('propostas'));
    }
}
