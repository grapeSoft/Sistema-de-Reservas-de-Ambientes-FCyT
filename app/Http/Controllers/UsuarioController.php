<?php

namespace App\Http\Controllers;

use App\Mail\InvitacionUsuario;
use App\Mail\RecuperarContrasea;
use Illuminate\Http\Request;
use App\Model\Usuario;
use App\Http\Requests\StoreUsuario;
use App\Http\Requests\UpdateUsuario;
use Illuminate\Support\Facades\Mail;
use App\Reserva;


class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('autentificado', [
            'except' => ['login', 'logear', 'recuperarContrasea', 'enviarContrasea', ]
        ]);
        $this->middleware('docente', ['only' => [
            'edit', 'update', 'show',
        ]]);
        $this->middleware('autorizado', ['only' => [
            'edit', 'update', 'show',
        ]]);
        $this->middleware('adm', ['only' => [
            'index', 'create', 'store', 'destroy', 'upload', 'registrarUsuarios', 
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(StoreUsuario $request)
    {
        $usuario = new Usuario;
        $usuario->nombre = $request->nombre;
        $usuario->apellido_paterno = $request->apellido_paterno;
        $usuario->apellido_materno = $request->apellido_materno;
        $usuario->email = $request->email;
        $usuario->username = $request->email;
        $password = uniqid();
        $usuario->password = $password;
        $usuario->tipo = $request->tipo;
        $usuario->save();
        $this->enviarEmail($usuario, $password);
        return redirect()
            ->route('usuarios.show', ['id' => $usuario->id_usuario])
            ->with('mensaje', 'El usuario se ha creado con exito');
    }

    private function enviarEmail(Usuario $usuario, $password)
    {
        Mail::to($usuario->email)->queue(new InvitacionUsuario($usuario, $password));//
    }
     private function enviarEmail2(Usuario $usuario, $password)
    {
        Mail::to($usuario->email)->queue(new RecuperarContrasea($usuario, $password));//
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.view', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->esAdministrador()){            
        }
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsuario $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->fill($request->all());
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $foto->move(public_path().'/foto-usuario/',$foto->getClientOriginalName());
            $usuario->foto = $foto->getClientOriginalName();
        }
        $usuario->save();
        return redirect()->route('usuarios.show',
            ['id' => $usuario->id_usuario]
        )->with('mensaje', 'El usuario se ha modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')
            ->with('mensaje', 'Se ha eliminado el usuario');
    }


    public function login()
    {
        return view('usuarios.login');
    }

    public function logear(Request $request)
    {
        $credenciales = $request->only([
            'username', 'password'
        ]);
        if(auth()->attempt($credenciales))
            return redirect()
                ->route('principal.inicio');
        else return redirect()
            ->route('usuarios.login')
            ->withErrors([
                'login' => 'Usuario o clave incorrectos'
            ])
            ->withInput([
                'username' => $request->input('username'),
            ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('principal.inicio');
    }

    public function perfil()
    {
        $usuario = auth()->user();
        return view('usuarios.perfil', compact('usuario'));
    }

     public function recuperarContrasea()
    {
        return view('usuarios.recuperarC');
    }

    public function enviarContrasea(Request $request)
    {
        $usuario = Usuario::where('email',$request->email)->first();
        if(empty($usuario))
            return redirect()
            ->route('usuarios.recuperarC')
            ->withErrors([
                'recuperarC' => 'Email Incorrecto'
            ])
            ->withInput([
                'email' => $request->input('email'),
            ]);

        else {
        $password = uniqid();
        $usuario->password = $password;
        $usuario->save();
        $this->enviarEmail2($usuario,$password);
        return redirect()
            ->route('usuarios.login')
            ->with('mensaje', 'Se le envio un mensaje con sus datos revise su correo');

        }
    }
    public function registrarUsuarios()
    {
        $tipo = $_FILES['archivo']['type'];
         
        $tamanio = $_FILES['archivo']['size'];
         
        $archivotmp = $_FILES['archivo']['tmp_name'];
         
        //cargamos el archivo
        $lineas = file($archivotmp);
         
        //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
        $i=0;
         
        //Recorremos el bucle para leer línea por línea
        foreach ($lineas as $linea_num => $linea)
        { 
           //abrimos bucle
           /*si es diferente a 0 significa que no se encuentra en la primera línea 
           (con los títulos de las columnas) y por lo tanto puede leerla*/
           if($i != 0) 
           { 
               //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
               /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
               leyendo hasta que encuentre un ; */
               $datos = explode(";",$linea);
         
               //Almacenamos los datos que vamos leyendo en una variable
               $nombre = trim($datos[0]);
               $apellido_paterno = trim($datos[1]);
               $apellido_materno = trim($datos[2]);
               $email = trim($datos[3]);
               $username = trim($datos[3]);
               $tipo = trim($datos[4]);
         
               //guardamos en base de datos la línea leida
               
               $usuario = new Usuario;
               $usuario->nombre = $nombre;
               $usuario->apellido_paterno = $apellido_paterno;
               $usuario->apellido_materno = $apellido_materno;
               $usuario->email = $email;
               $usuario->username = $email;
               $password = uniqid();
               $usuario->password = $password;
               $usuario->tipo = $tipo;
               /**if($request->hasFile('foto')){
                    $foto = $request->file('foto');
                    $foto->move(public_path().'/foto-usuario/',$foto->getClientOriginalName());
                    $usuario->foto = $foto->getClientOriginalName();
               } */
               $usuario->save();
               //$this->enviarEmail($usuario, $password);
               
           }
         
           /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
           entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
           $i++;
           //cerramos bucle
        }
        return redirect()
                ->route('usuarios.index')
                ->with('mensaje', 'Los docentes se han registrado con exito');
    }
}
