<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterAbogadoRequest;
use App\Http\Requests\RegisterPostRequest;
use App\Models\Abogado;
use App\Models\User;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;

class ClienteController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $cliente = User::where('estado', '1')->role(['Cliente'])->get();
        return response()->json($cliente);
    }

    public function store(RegisterPostRequest $request)
    {
        try {
            User::create([
                "document" => $request->document,
                "num_document" => $request->num_document,
                "noveno_numero" => $request->num_document[9],
                "fullname" => $request->fullname,
                "email" => $request->email,
                "dni_pasaporte" => $request->dni_pasaporte,
                "telefono" => $request->telefono,
                "direccion" => $request->direccion,
                "password" => bcrypt($request->password),
            ])->assignRole('Cliente');


            return response()->json([
                'mensaje' =>  'Cliente creado con exito'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => ['Error interno del servidor'],
                'message' => 'Error interno del servidor',
            ], 500);
        }
    }

    // public function show(Abogado $abogado)
    // {
    //     return response()->json($abogado);
    // }

    // public function update(Request $request, Abogado $abogado)
    // {
    //     $abogado->fill($request->post())->save();
    //     return response()->json([
    //         'abogado' => $abogado
    //     ]);
    // }

    public function destroy(User $cliente)
    {

        $cliente = User::where('id', $cliente->id)->update(['estado' => '0']);


        return response()->json([
            'mensaje' =>  'Cliente eliminado'
        ]);
    }
}
