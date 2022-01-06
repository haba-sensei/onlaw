<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\V1\MenuContenidoController;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{

    public function init(Request $request)
    {
        if ($request->message === "empezar") {
            return $this->chat_area("0");
        } else {
            return $this->chat($request->message, $request->nivel, $request->zona_id);
        }
    }

    public function chat($message, $nivel, $zona_id)
    {
        switch ($nivel) {
            case '1':
                return $this->chat_area($message);
                break;
            case '2':
                return $this->chat_area_cont($message);
                break;
            case '3':
                return $this->chat_area_cont_det($zona_id, $message);
                break;
            case '4':
                return $this->chat_mapas($message);
                break;
            case '5':
                return $this->chat_mapas_sub($message);
                break;
            case '6':
                return $this->chat_mapas_sub_det($message);
                break;
            case '7':
                return $this->chat_mapas_sub_det_extra($message);
                break;
            default:
                return $this->respuesta("Lo siento no es una opcion valida");
                break;
        }
    }


    public function chat_area($opcion)
    {
        $obj = new MenuContenidoController();

        switch ($opcion) {
            case '0':
                return $obj->areas();
                break;
            case $opcion:
                return $obj->areas_cont($opcion);
                break;
            default:
                return $this->chat_area("0");
                break;
        }
    }

    public function chat_area_cont($opcion)
    {
        $obj = new MenuContenidoController();
        switch ($opcion) {
            case '0':
                return $obj->areas();
                break;
            case $opcion:
                return $obj->areas_cont_det($opcion);
                break;
            default:
                return $this->respuesta("Lo siento no es una opcion valida");
                break;
        }
    }

    public function chat_area_cont_det($zona_id, $opcion)
    {
        $obj = new MenuContenidoController();
        switch ($opcion) {
            case '0':
                return $obj->areas();
                break;
            case $opcion:
                return $zona_id != '-1' ? $obj->mapas($zona_id, $opcion) : $obj->zona_filter($zona_id, $opcion);
                break;
            default:
                return $this->respuesta("Lo siento no es una opcion valida");
                break;
        }
    }

    public function chat_mapas($opcion)
    {
        $obj = new MenuContenidoController();
        switch ($opcion) {
            case '0':
                return $obj->areas();
                break;
            case $opcion:
                return   $obj->mapas_sub($opcion);
                break;
            default:
                return $this->respuesta("Lo siento no es una opcion valida");
                break;
        }
    }

    public function chat_mapas_sub($opcion)
    {
        $obj = new MenuContenidoController();
        switch ($opcion) {
            case '0':
                return $obj->areas();
                break;
            case $opcion:
                return   $obj->mapas_sub_det($opcion);
                break;
            default:
                return $this->respuesta("Lo siento no es una opcion valida");
                break;
        }
    }

    public function chat_mapas_sub_det($opcion)
    {
        $obj = new MenuContenidoController();
        switch ($opcion) {
            case '0':
                return $obj->areas();
                break;
            case $opcion:
                return   $obj->mapas_sub_det_extra($opcion);
                break;
            default:
                return $this->respuesta("Lo siento no es una opcion valida");
                break;
        }
    }

    public function chat_mapas_sub_det_extra($opcion)
    {
        $obj = new MenuContenidoController();
        switch ($opcion) {
            case '0':
                return $obj->areas();
                break;
            case $opcion:
                return $this->respuesta("Lo siento no hay mas elementos");
                break;
            default:
                return $this->respuesta("Lo siento no es una opcion valida");
                break;
        }
    }




    public function respuesta($resp)
    {
        return  response()->json([
            "id" => 0,
            "nombre" => $resp,
            "detalle" => "",
            "color" => "",
            "nivel" => 0
        ], 201);
    }
}