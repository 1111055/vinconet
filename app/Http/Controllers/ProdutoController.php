<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(Request $request)
    {
        
        //dd($inforequest);


         $artigo          = "";
         $ccatalogo       = "";
         $description     = "";


         $user = Auth::user();

         $query = Produto::query();



            if ($request->has('artigo') and !empty($request->input('artigo'))) {
                $query->where('cod_art', 'like', '%' . $request->input('artigo') . '%');
                $artigo =  $request->input('artigo');
            }
      
            if ($request->has('ccatalogo') and !empty($request->input('ccatalogo'))) {
                $query->where('cod_catalog', 'like', '%' .  $request->input('ccatalogo') . '%');
                $ccatalogo  = $request->input('ccatalogo');
            }


            // Filtrar por palavras-chave de pesquisa
            if ($request->has('description') and !empty($request->input('description'))) {
                $palavrasChave = explode(' ', $request->input('description'));
                foreach ($palavrasChave as $palavra) {
                    $query->Where('des_art', 'like', '%' . $palavra . '%');
                }
                $description = $request->input('description');
            }

            // Executar a consulta e obter os resultados
            $produtos = $query->get();

            

          return view('backend.Produto.index',compact('produtos','artigo','ccatalogo','description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
