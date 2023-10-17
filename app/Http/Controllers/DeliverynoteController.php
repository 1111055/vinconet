<?php

namespace App\Http\Controllers;

use App\Models\Deliverynote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;


class DeliverynoteController extends Controller
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


         $delivery = "";


         $user = Auth::user();

        $query = DB::table('deliverynotes')
                ->select('deliverynote','download','date')
                ->where('num_cliente', '=', $user->num_cliente)
                ->groupBy('deliverynote','download','date')->get();

        // $query = Deliverynote::where('num_cliente', '=', $user->num_cliente);



         if ($request->has('delivery') and !empty($request->input('delivery'))) {
                $query->where('deliverynote', 'like', '%' . $request->input('delivery') . '%');
                $delivery =  $request->input('delivery');
         }

 
            foreach ($query as $key => $value) {
                    
         
                    

                             $value->download = 'teste';
                     
         
              }
             
       
        $notes = $query;

        return view('backend.Delivery.index',compact('notes','delivery'));
            
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
     * @param  \App\Models\Deliverynote  $deliverynote
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


       $delivery = "";


       $user = Auth::user();

        $notes = Deliverynote::where('num_cliente', '=', $user->num_cliente)->where('deliverynote','=',$id)->get();
             


        //dd($notes);


        return view('backend.Delivery.show',compact('notes','id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deliverynote  $deliverynote
     * @return \Illuminate\Http\Response
     */
    public function edit(Deliverynote $deliverynote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deliverynote  $deliverynote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deliverynote $deliverynote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deliverynote  $deliverynote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deliverynote $deliverynote)
    {
        //
    }
}
