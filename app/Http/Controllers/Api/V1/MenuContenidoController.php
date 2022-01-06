<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class MenuContenidoController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function areas()
    {
        $areas_practica = DB::select('CALL `splaw_list_Areas`()');
        return response()->json($areas_practica, 201);
    }

    public function areas_cont($id)
    {
        $cont_areas_practica = DB::select('CALL `splaw_list_ContAreasPract`(' . $id . ')');

        return response()->json($cont_areas_practica, 201);
    }

    public function areas_cont_det($id)
    {
        $cont_areas_practica = DB::select('CALL `splaw_list_DetContAreasPract`(' . $id . ')');

        return response()->json($cont_areas_practica, 201);
    }

    public function mapas($zona, $det_id)
    {
        $mapas = DB::select('CALL `splaw_list_MapaAreasPract`(' . $zona . ', ' . $det_id . ')');
        return response()->json($mapas, 201);
    }

    public function mapas_sub($id)
    {
        $mapas_sub = DB::select('CALL `splaw_list_SubMapaAreasPract`(' . $id . ')');
        return response()->json($mapas_sub, 201);
    }

    public function mapas_sub_det($id)
    {
        $mapas_sub_det = DB::select('CALL `splaw_list_DetSubMapaAreasPract`(' . $id . ')');
        return response()->json($mapas_sub_det, 201);
    }

    public function mapas_sub_det_extra($id)
    {
        $extra_sub_mapa = DB::select('CALL `splaw_list_ExtraSubMapa`(' . $id . ')');
        return response()->json($extra_sub_mapa, 201);
    }

    public function zonas_func()
    {
        $licencia_de_func_zona = DB::select('CALL `splaw_list_ZonasFunc`()');
        return response()->json($licencia_de_func_zona, 201);
    }

    public function zona_filter($zona, $det_id)
    {
        $zona_filter = DB::select('CALL `splaw_list_MapaAreasPract`(' . $zona . ', ' . $det_id . ')');
        return response()->json($zona_filter, 201);
    }

    public function imageables($nivel, $menu)
    {
        $imageables = DB::select('CALL `splaw_list_AssetsImg`('. $nivel .', '. $menu.')') ;

        return response()->json($imageables, 201);
    }

    public function attacheable($nivel, $menu)
    {
        $attacheable = DB::select('CALL `splaw_list_AssetsFiles`('. $nivel .', '. $menu.')');

        return response()->json($attacheable, 201);
    }

    public function suggestions()
    {
        $suggestions = DB::select('CALL `splaw_list_Searching`()');
        return response()->json($suggestions, 201);
    }
}