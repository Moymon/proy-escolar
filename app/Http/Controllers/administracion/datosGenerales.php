<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\administracion\datosGenerales as datosGenModel;
use App\Encryption;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class datosGenerales extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $datosG = datosGenModel::find(1);
        $boton = "edit";
        return view('administracion.datos-generales',compact('datosG','boton'));
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
        $datosG = datosGenModel::find(1);
        $boton = "update";
        return view('administracion.datos-generales',compact('datosG','boton'));
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
        //var_dump($request->all());
        
        $datosG = new datosGenModel();

        DB::table($datosG->getTable())->where('id',1)->update([
            'institucion' => $request->institucion,
            'url'   => $request->url,
            'version_git' => $request->version_git,
            'nombre_version'=> $request->nombre_version,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'ext' => $request->ext,
        ]);

        if( $request->master !== NULL && $request->master !== "soyunacontrasena"){
            DB::table($datosG->getTable())->where('id',1)->update([
            'master' => Crypt::encrypt($request->master),
            ]);
        }

        return redirect('/administracion-index');

        /*
        var_dump($request->all());
        echo "Contrasena encryptada";
        var_dump(Crypt::encrypt($request->master));
        echo "Contrasena desencryptada";
        var_dump(Crypt::decrypt(Crypt::encrypt($request->master)));
        */
        ///pruebas de inserccion
        /*
        $datosG = new datosGenModel();
        $datosG->institucion = $request->institucion;
        $datosG->url = $request->url;
        $datosG->version_git = $request->version_git;
        $datosG->nombre_version = $request->nombre_version;
        $datosG->correo = $request->correo;
        $datosG->telefono = $request->telefono;
        $datosG->ext = $request->ext;
        $datosG->master = Crypt::encrypt($request->master);


        DB::insert('insert into ' . $datosG->getTable() . '(institucion, url,version_git,nombre_version,correo, telefono,ext,master) values (?,?,?,?,?,?,?,?)', [$datosG->institucion, $datosG->url,$datosG->version_git,$datosG->nombre_version,$datosG->correo,$datosG->telefono,$datosG->ext,$datosG->master]);
        */
        //$datosG->save();
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
