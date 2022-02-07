<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Solicitudes;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ReporteController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function basico()
    {
        $abogado = count(User::role(['Abogado'])->get());
        $cliente = count(User::role(['Cliente'])->get());
        $chatsAtendidos = count(Solicitudes::where('status', '3')->get());
        $chatsEspera = count(Solicitudes::where('status', '2')->get());

        $data = [
            'totalAbog' => $abogado,
            'totalClient' => $cliente,
            'totalChatsAtend' => $chatsAtendidos,
            'totalChatsEspe' => $chatsEspera,
        ];

        return response()->json($data);
    }
}
