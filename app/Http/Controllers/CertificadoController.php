<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Certificado;
use App\Models\Deliverynote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class CertificadoController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



         $delivery        = "";
         $corder          = "";
         $date            = "";
         $description     = "";

         $user = Auth::user();

         $query = Deliverynote::where('num_cliente', '=', $user->num_cliente);



        if ($request->has('delivery') and !empty($request->input('delivery'))) {
            $query->where('deliverynote', 'like', '%' . $request->input('delivery') . '%');
            $delivery =  $request->input('delivery');
        }
  
        if ($request->has('corder') and !empty($request->input('corder'))) {
            $query->where('enc_cliente', 'like', '%' .  $request->input('corder') . '%');
            $corder  = $request->input('corder');
        }


        if ($request->has('date') and !empty($request->input('date'))) {
            $query->where('date', '=', $request->input('date'));
            $date = $request->input('date');
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
        $certificados = $query->get();




         foreach ($certificados as $key => $value) {
                
                    $numeroCliente = '661'; // Número de cliente desejado
                    $nomeArquivo =  $value->lote.'.'.$value->num_enc.'.'.$value->linha_guia.'.pdf'; // Nome do arquivo

                    $caminhoArquivo = public_path('files/' . $numeroCliente . '/' . $nomeArquivo);

                
                    if (file_exists($caminhoArquivo)) {
                        $value->download = URL::asset('files/' . $numeroCliente . '/' . $nomeArquivo);
                    }
     
          }


     
       

          return view('backend.Certificado.index',compact('certificados','delivery','corder','date','description'));
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
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function show(Certificado $certificado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificado $certificado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificado $certificado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificado $certificado)
    {
        //
    }
}
