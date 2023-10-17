<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deliverynote;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $currentYear = date('Y');


        $user = Auth::user();


        $visitor = Deliverynote::select(
                        DB::raw("year(date) as year"),
                        DB::raw("SUM(quantidade) as qtd"))
                    ->where('num_cliente', '=',$user->num_cliente)
                    ->orderBy(DB::raw("YEAR(date)"))
                    ->groupBy(DB::raw("YEAR(date)"))
                    ->get();
  


        $result[] = ['Year','Qtd'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->year, (int)$value->qtd];
        }

        $data = DB::table('deliverynotes')
          ->select(DB::raw('date as date, SUM(quantidade) as total'))
          ->whereYear('date', $currentYear)
          ->where('num_cliente', '=',$user->num_cliente)
          ->groupBy('date')
          ->orderBy('date', 'asc')
          ->get();



        $chartData = [];

        foreach ($data as $item) {

           
            $monthname = date('F', strtotime($item->date)); 
                       
            $chartData[$monthname] = $item->total;

          
        }

        //dd($chartData);


        return view('home',compact('chartData'))->with('chart1',json_encode($result));
    }
}
