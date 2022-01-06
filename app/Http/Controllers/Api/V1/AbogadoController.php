<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Abogado;
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
        $abogado = Abogado::all();
        return response()->json($abogado);
    }

    public function store(Request $request)
    {
        $abogado = Abogado::create($request->post());
        return response()->json([
            'abogado' => $abogado
        ]);
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

    public function destroy(Abogado $abogado)
    {
        $abogado->delete();
        return response()->json([
            'mensaje' => 'Abogado eliminado'
        ]);
    }
}