<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deliverynote;
use App\Models\User;
use App\Models\Certificado;
use App\Models\Produto;
use Validator;

class TranferdadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function deliverynotepost(Request $request){


                $validator = Validator::make($request->all(), [
                        'deliverynote'  => 'required|string',
                        'date'          => 'required',
                        'num_cliente'   => 'required',
                        'linha_guia'    => 'required',
                        'cod_art'       => 'required',
                        'des_art'       => 'required',
                        'quantidade'    => 'required'
                ]);


                if($validator->fails()){

                    return response()->json([
                        'status' => 422,
                        'erros'  => $validator->messages()
                    ],422);
                }else{

                    $deliverynote = Deliverynote::create([

                                  'download'       =>  $request->download,
                                  'date'           =>  $request->date,
                                  'deliverynote'   =>  $request->deliverynote,
                                  'num_cliente'    =>  $request->num_cliente,  
                                  'num_enc'        =>  $request->num_enc,
                                  'enc_cliente'    =>  $request->enc_cliente,
                                  'linha_guia'     =>  $request->linha_guia,
                                  'cod_art'        =>  $request->cod_art,
                                  'des_art'        =>  $request->des_art,
                                  'path'           =>  $request->path,
                                  'quantidade'     =>  $request->quantidade,
                                  'fig_number'     =>  $request->fig_number,
                                  'lote'           =>  $request->lote

                    ]);


                    if($deliverynote){


                        return response()->json([
                                'status'  => 200,
                                'message' => "Delivery Note Create Successfully."
                        ],200);

                         $deliverynote->save();
                         
                    }else{

                        return response()->json([
                                'status'  => 500,
                                'message' => "Somthing Wrong!"
                        ],500);

                    }
                }



    }


    public function userspost(Request $request){


                $validator = Validator::make($request->all(), [
                        'name'       => 'required|string',
                        'email'      => 'required',
                        'password'   => 'required'
                ]);


                if($validator->fails()){

                    return response()->json([
                        'status' => 422,
                        'erros'  => $validator->messages()
                    ],422);
                }else{

                    $user = User::create([
                                  'name'           =>  $request->name,
                                  'email'          =>  $request->email,
                                  'password'       =>  $request->password
                    ]);


                    if($user){


                        return response()->json([
                                'status'  => 200,
                                'message' => "Delivery Note Create Successfully."
                        ],200);
                    }else{

                        return response()->json([
                                'status'  => 500,
                                'message' => "Somthing Wrong!"
                        ],500);

                    }
                }

    }

    

        public function produtopost(Request $request){


                $validator = Validator::make($request->all(), [

                                  'cod_art'       => 'required',
                                  'cod_catalog'   => 'required',
                                  'des_art'       => 'required',
                                  'exist_actual'  => 'required'
                ]);


                if($validator->fails()){

                    return response()->json([
                        'status' => 422,
                        'erros'  => $validator->messages()
                    ],422);
                }else{

                    $user = Produto::create([
                                  'cod_art'       => $request->cod_art,
                                  'cod_catalog'   => $request->cod_catalog,
                                  'des_art'       => $request->des_art,
                                  'exist_actual'  => $request->exist_actual
                    ]);


                    if($user){


                        return response()->json([
                                'status'  => 200,
                                'message' => "Delivery Note Create Successfully."
                        ],200);
                    }else{

                        return response()->json([
                                'status'  => 500,
                                'message' => "Somthing Wrong!"
                        ],500);

                    }
                }

    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         return reposnse()->json([
                                'status'  => 500,
                                'message' => "Somthing Wrong!"
                        ],500);
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
