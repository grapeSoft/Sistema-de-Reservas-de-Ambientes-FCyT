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
        $this->middleware('autorizado', ['only' => [
            'edit', 'update', 'show',
        ]]);
        $this->middleware('adm', ['only' => [
            'index', 'create', 'store', 'destroy',
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
        //dd(compact($usuarios));
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
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $foto->move(public_path().'/foto-usuario/',$foto->getClientOriginalName());
            $usuario->foto = $foto->getClientOriginalName();
        }
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

    public function foto($id)
    {
        $usuario = Usuario::findOrFail($id);
        $ruta = storage_path($usuario->foto);
        return file_get_contents($ruta);
    }

     public function recuperarContrasea()
    {
        //$usuario = auth()->user();
        return view('usuarios.recuperarC');
    }

    public function enviarContrasea(Request $request)
    {
        $usuario = Usuario::where('email',$request->email)->first();

        //dd(compact('usuario'));
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
            ->with('mensaje', 'Se le envio mensaje con sus datos revise su email..¡¡');

    }
}
