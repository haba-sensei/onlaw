<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAbogadoRequest;
use Illuminate\Http\Request;
use App\Models\Abogado;
use App\Models\User;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;

class AbogadoController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $abogado = User::where('estado', '1')->role(['Abogado'])->get();
        return response()->json($abogado);
    }

    public function store(RegisterAbogadoRequest $request)
    {
        try {
        User::create([
            "document" => "RUC",
            "num_document" => $request->num_document,
            "noveno_numero" => "0",
            "fullname" => $request->fullname,
            "email" => $request->email,
            "dni_pasaporte" => $request->num_document,
            "telefono" => $request->telefono,
            "direccion" => $request->direccion,
            "password" => bcrypt($request->password),
        ])->assignRole('Abogado');


        return response()->json([
            'mensaje' =>  'Abogado creado con exito'
        ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => ['Error interno del servidor'],
                'message' => 'Error interno del servidor',
            ], 500);
        }

    }

    public function show(Abogado $abogado)
    {
        return response()->json($abogado);
    }

    public function update(Request $request, Abogado $abogado)
    {
        $abogado->fill($request->post())->save();
        return response()->json([
            'abogado' => $abogado
        ]);
    }

    public function destroy(User $abogado)
    {

       $abogado = User::where('id', $abogado->id)->update(['estado' => '0']);


       return response()->json([
            'mensaje' =>  'Abogado eliminado'
        ]);
    }
}
