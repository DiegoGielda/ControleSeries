<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index(){
        
        $series = Serie::query()->orderby('nome')->get();
        
        //$series = DB::select('SELECT nome FROM series;');

        return view('series.index')->with('series', $series);

        // return view('listar-series', compact('series'));
        
        // return view('listar-series',['series' => $series]);

    }

    public function create(){
        return view('series.create');
    }

    public function store(Request $request){

        Serie::create($request->all());
      /*  
        $nomeSeries = $request->input('nome');
        $serie = new Serie();
        $serie->nome = $nomeSeries;
        $serie->save();
      */

        return to_route('series.index');

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

      return to_route('series.index');
    }
}