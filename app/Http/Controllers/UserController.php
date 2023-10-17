<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
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
    public function index()
    {

          $users = User::all();

          return view('backend.User.index',compact('users'));
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
    public function store(UserRequest $request)
    {

        $request->persist();
        return redirect()->route('user')->with('sucess','Criado com sucesso.');
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


          $loginuser = Auth::user();


          $user = User::find($id);

          $loginuser->authorizeRoles("master");


          $roles = RoleUser::
                 where('user_id', '=', $id)->get();


          $role = Role::all();

          $selrole  = $role->pluck('name','id');
          $selroles = $roles->pluck('role_id');
          return view('backend.User.edit', compact('user','selrole','selroles'));
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
         $user = User::findOrFail($id);


         $lastid = $id;
         $imagename;
         $_path = $user->path;

        if($request->hasFile('banerimg')) {
                       
            
                        $photo = $request->file('banerimg');
                       
                        //Nome Do Ficheiro
                        $filenamewithextension = $request->file('banerimg')->getClientOriginalName();
                 
                        //Nome Sem Extensão 
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                 
                        //Extenção do ficheiro
                        $extension = $request->file('banerimg')->getClientOriginalExtension();
                 
                        //Novo nome do ficheiro
                        $imagename = "user_".$lastid.'.'.$photo->getClientOriginalExtension(); 

                        $data = getimagesize($photo);
                        $width = $data[0];
                        $height = $data[1];

                        $namepng = "user_".$lastid.'.png';
                        $namejgp = "user_".$lastid.'.jpg';
                        $namegif = "user_".$lastid.'.gif';
                        $nametiff = "user_".$lastid.'.tiff';

                 
                        if(file_exists(public_path('/logotipo/User/'.$namepng))){

                              unlink(public_path('/logotipo/User/'.$namepng));

                        }
                       if(file_exists(public_path('/logotipo/User/'.$namejgp))){

                              unlink(public_path('/logotipo/User/'.$namejgp));

                        }
                        if(file_exists(public_path('/logotipo/User/'.$namegif))){

                              unlink(public_path('/logotipo/User/'.$namegif));

                        }
                        if(file_exists(public_path('/logotipo/User/'.$nametiff))){

                              unlink(public_path('/logotipo/User/'.$nametiff));

                        }

    
                        //Upload File                     
                      //  $file = $request->file('banerimg')->storeAs('User', $imagename, 'upload');
                        
                        
                       // crop image

                        $destinationPath = public_path('/logotipo/User/');
                        $thumb_img = Image::make($photo->getRealPath());
                    
                        if(file_exists(public_path('/logotipo/User/'.$imagename))){

                              unlink(public_path('/logotipo/User/'.$imagename));

                        }

                        $altura =   $height;
                        $comprimento = $width;

                        $divisaoalt = 160 / $altura; 
                        $divisaocom = 160 / $comprimento;

                        if($divisaoalt < $divisaocom){
                            $altfinal = $altura * $divisaoalt;
                            $cmpfinal = $comprimento * $divisaoalt;
                        }else{
                            $altfinal = $altura * $divisaocom;
                            $cmpfinal = $comprimento * $divisaocom;

                        }
                        $_path = $request->root().'/logotipo/User/'.$imagename;
                        // Resized image
                        $thumb_img->resize($cmpfinal, $altfinal, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        // Canvas image
                        $canvas = Image::canvas(160, 160);
                        $canvas->insert($thumb_img, 'center');
                        $canvas->save($destinationPath.'/'.$imagename,50);
                                    
      }

      if($request->acessos){

            if(count($request->acessos) > 0){



          $roles = RoleUser::
                 where('user_id', '=', $id)->toSql();



                   DB::table('role_user')->where('user_id', $id)->delete(); 

                     //dd($request->acessos);
                     foreach ($request->acessos as $key => $value) {

                           $role_manager  = Role::where('id', $value)->first();
                           $user->roles()->attach($role_manager);
                        
                     } 

            }
        }


        //dd($request->all());
        $user->name        = $request->name;
        $user->path        = $_path;
        $user->activo      = $request->has('activo') && $request->activo !== '' ? 1 : 0;
        $user->num_cliente = $request->num_cliente;

        $user->save();

         return redirect()->route('user.edit', ['id' => $user->id])->with('success', 'Guardado com sucesso.');

         //return redirect()->route('user.edit', compact('user'))->with('sucess','Guardado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         User::destroy($id);

         return redirect()->route('user')->with('sucess','Removido com sucesso.');
    }
}
