<?php

namespace App\Http\Controllers\usuarios;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class usuariosController extends Controller
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
    public function create(Request $request)
    {
        //
        /*Validar ambas rpe e ip unicas y mandar errores dependiendo de que exista y que no*/
        if($request->direccion_ipNew != null){
            $messages = [
                'rpeNew' => '[ RPE: ' . $request->rpeNew . ' ]',
                'direccion_ipNew' => '[ IP: ' . $request->direccion_ipNew . ' ]',
            ];
            $validate = Validator::make($request->all(),[
            'rpeNew' => 'unique:users,rpe',
            'direccion_ipNew' => 'unique:users,direccion_ip',
            ], $messages);

             /*Si algo fallo que recargue */
             if($validate->fails()){
                return redirect('/usuarios')->withErrors($validate)->withInput();
            }
        }else{
            $messages = [
                'rpeNew' => '[ RPE: ' . $request->rpeNew . ' ]',
            ];

            $validate = Validator::make($request->all(),[
            'rpeNew' => 'unique:users,rpe',
            ], $messages);

             /*Si algo fallo que recargue */
            if($validate->fails()){
                return redirect('/usuarios')->withErrors($validate)->withInput();
            }
        }

        if($request->rol_id != 0){
            $user = User::create([
                'rpe' => $request->rpeNew,
                'nombre' => $request->nombreNew,
                'apellido_pa' => $request->apellido_paNew,
                'apellido_ma' => $request->apellido_maNew,
                'direccion_ip' => $request->direccion_ipNew,
                'correo' => $request->correoNew,
            ])->assignRole($request->rol_id);
        }else{
            $user = User::create([
                'rpe' => $request->rpeNew,
                'nombre' => $request->nombreNew,
                'apellido_pa' => $request->apellido_paNew,
                'apellido_ma' => $request->apellido_maNew,
                'direccion_ip' => $request->direccion_ipNew,
                'correo' => $request->correoNew,
            ]);
        }

        return redirect('/usuarios');
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
    public function edit($user)
    {
        //

        $roles = Role::all();
        $permisos = Permission::all();

        $usuario = User::where('id',$user)->first();
        return view('administracion.usuarios.usuarios-edit',compact('usuario','roles', 'permisos'));
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
        $usuario = User::where('id',$id)->first();

        $usuario->roles()->sync($request->roles);
        

        return redirect()->route('catalogo.usuarios.edit',$id)->with('info','Se actualizaron los datos con exito');
    }

    public function actualizar(Request $request)
    {
        //
       return redirect("/Inicio");
       //echo $request->rol;
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

    public function edit_any(Request $request){
        $usuario = User::where("rpe",$request->rpeForm)->first();

        if($usuario->direccion_ip == $request->direccion_ipForm){
            /**/
            $usuario->rpe = $request->rpeForm;
            $usuario->nombre = $request->nombreForm;
            $usuario->apellido_ma = $request->apellido_maForm;
            $usuario->apellido_pa = $request->apellido_paForm;
            $usuario->correo = $request->correoForm;
            $usuario->direccion_ip = $request->direccion_ipForm;
            $usuario->save();

            return redirect("/usuarios");
        }
        //
        /*Validar ambas rpe e ip unicas y mandar errores dependiendo de que exista y que no*/
        if($request->direccion_ipForm != null){
            $messages = [
                'rpeForm' => '[ RPE: ' . $request->rpeForm . ' ]',
                'direccion_ipForm' => '[ IP: ' . $request->direccion_ipForm . ' ]',
            ];
            $validate = Validator::make($request->all(),[
            'rpeForm' => 'unique:users,rpe',
            'direccion_ipForm' => 'unique:users,direccion_ip',
            ], $messages);

             /*Si algo fallo que recargue */
             if($validate->fails()){
                return redirect('/usuarios')->withErrors($validate)->withInput();
            }
        }else{
            $messages = [
                'rpeForm' => '[ RPE: ' . $request->rpeForm . ' ]',
            ];

            $validate = Validator::make($request->all(),[
            'rpeNew' => 'unique:users,rpe',
            ], $messages);

             /*Si algo fallo que recargue */
            if($validate->fails()){
                return redirect('/usuarios')->withErrors($validate)->withInput();
            }
        }

        
        $usuario->rpe = $request->rpeForm;
        $usuario->nombre = $request->nombreForm;
        $usuario->apellido_ma = $request->apellido_maForm;
        $usuario->apellido_pa = $request->apellido_paForm;
        $usuario->correo = $request->correoForm;
        $usuario->direccion_ip = $request->direccion_ipForm;
        $usuario->save();

        return redirect("/usuarios");
    }
}
