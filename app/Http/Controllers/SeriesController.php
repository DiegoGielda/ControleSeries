<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index(Request $request){
        
        $series = Serie::query()->orderby('nome')->get();

        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);

        // UTILIZADO PARA ESQUECER O RETORNO DO "PUT" UTILIZANDO O FLASH
        //$request->session()->forget('mensagem.sucesso');

        // BUSCANDO O NOME DAS SERIES
        //$series = DB::select('SELECT nome FROM series;');

        // FORMAS DE PASSAR A VARIAVEL PARA A VIEW QUE SERA MONTADA NO HTML
        // return view('listar-series', compact('series'));
        //
        // return view('listar-series',['series' => $series]);

    }

    public function create(){
        return view('series.create');
    }

    public function store(Request $request){

        Serie::create($request->all());

        $request->session()->flash('mensagem.sucesso', 'Série adicionada com sucesso');

        return to_route('series.index');

      /*  
        $nomeSeries = $request->input('nome');
        $serie = new Serie();
        $serie->nome = $nomeSeries;
        $serie->save();
      */

      /*
        Tipo de redirecionamento
        return redirect('/series');

        return redicect()->route('series.index');

      */
        // DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSeries]);

        /*
        if(DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSeries])){
            return 'OK';
        }else{
            return 'Deu ERRO no inserir';
        }
        */
    }

    public function destroy(Request $request){
      Serie::destroy($request->series);

      $request->session()->flash('mensagem.sucesso', 'Série removida com sucesso');

      return to_route('series.index');

      // COLOCANDO NA SESSÃO UMA MENSAGEM SE REMOVIDO COM SUCESSO -- TROCADO POR FLASH
      // $request->session()->put('mensagem.sucesso', 'Série removida com sucesso');

    }
}