<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class authwp extends Controller
{
    //
    public function login_without_password(Request $request){

        $usuario = User::where('rpe',$request->rpe)->first();

        if(Auth::login($usuario)){
            return redirect('/Inicio');
        }else{
            return redirect('/login');
        }

        /*$resultado = $this->validar_sesion($request->rpe,$request->password);

        if($resultado == 1){
            $usuario = User::where('rpe',$request->rpe)->first();

            Auth::login($usuario);

            return redirect('/Inicio');
        }else{
            return redirect('/login');
        }*/
    }

    function validar_sesion($rpe, $pass)
    {
        $conectado = 0;

        # Checar la conexión con el servidor nuevo
        # $hostldap = 'buaslp.local';
        # $hostldap = '148.224.94.15'; # Dejó de funcionar
        # $hostldap = '148.224.94.18'; # Sí funciona
        $hostldap = '148.224.94.22'; # Sí funciona
        $userldap = 'buaslp\\'.strval($rpe);
        $passldap = $pass;

        $ldapconn = ldap_connect($hostldap) or die("Imposible conectar...");     

        if ($ldapconn) {
            # Especifico la versión del protocolo LDAP
            ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3) or die ("Imposible asignar el protocolo LDAP !");
            ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
             
            # Valido las credenciales para accesar al servidor LDAP
            $login = @ldap_bind($ldapconn, $userldap, $passldap); # or die ("Imposible validar en el servidor LDAP !");

            if ($login) $conectado = 1;
        }

        # Si no se logró la conexión con el servidor nuevo, intentarlo con el servidor anterior
        if (!$conectado) {
          # $hostldap = 'uaslp.local';    
          $hostldap = '148.224.97.71';
          $userldap = 'uaslp\\'.strval($rpe);
          $passldap = $pass;

          $ldapconn = ldap_connect($hostldap) or die("Imposible conectar...");     

          if ($ldapconn) {
              # Especifico la versión del protocolo LDAP
              ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3) or die ("Imposible asignar el protocolo LDAP !");
              ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
               
              # Valido las credenciales para accesar al servidor LDAP
              $login = @ldap_bind($ldapconn, $userldap, $passldap); # or die ("Imposible validar en el servidor LDAP !");

              if ($login) $conectado = 1;
          }
        }
        
        return $conectado;
    }
}
