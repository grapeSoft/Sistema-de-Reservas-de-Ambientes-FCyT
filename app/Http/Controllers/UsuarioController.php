<?php

namespace App\Http\Controllers;

use App\Mail\InvitacionUsuario;
use Illuminate\Http\Request;
use App\Model\Usuario;
use App\Http\Requests\StoreUsuario;
use App\Http\Requests\UpdateUsuario;
use Illuminate\Support\Facades\Mail;


class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('autentificado', [
            'except' => ['login', 'logear', 'registro', 'registrar']
        ]);
        $this->middleware('adm', ['only' => [
            'index', 'create', 'store', 'edit', 'update', 'destroy',
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
        $valores = $request->all();
        $usuario = Usuario::create($valores);
        $this->enviarEmail($usuario);
        return redirect()
            ->route('usuarios.show', ['id' => $usuario->id_usuario])
            ->with('mensaje', 'El usuario se ha creado con éxito');
    }

    private function enviarEmail(Usuario $usuario)
    {
        Mail::to($usuario->email)->queue(new InvitacionUsuario($usuario));//
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
                'login' => 'Usuario o contraseña incorrectos'
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

    public function registro()
    {
        return view('usuarios.registro');
    }

    public function registrar(StoreUsuario $request)
    {
        $usuario = Usuario::create($request->all());
        return redirect()->route('usuarios.login')->with([
            'mensaje' => 'Se ha registrado con exito'
        ]);
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
}
