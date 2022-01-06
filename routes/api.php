<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Api\V1\AbogadoController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ChatbotController;
use Illuminate\Support\Facades\Route;

Route::resource('blog', BlogController::class)->only(['index', 'store', 'update', 'show', 'destroy']);
Route::post('login', [AuthController::class, 'login']);
Route::post('forgotPassword', [AuthController::class, 'forgotPassword']);
Route::post('register', [AuthController::class, 'register']);
Route::get('optimize', [AuthController::class, 'optimize']);
Route::post('chatbot', [ChatbotController::class, 'init']);

Route::group(
    [
        'middleware' => 'jwt.verify',
        'prefix' => 'auth',
    ],
    function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'getUser']);
        Route::post('checkToken', [AuthController::class, 'checkToken']);
        Route::resource('abogado', AbogadoController::class)->only(['index', 'store', 'update', 'show', 'destroy']);
    }
);

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'chat',
], function () {
    Route::get('solicitud/{id_cliente}/{id_esp}', [ChatController::class, 'solicitud']);
    Route::get('list/{type}', [ChatController::class, 'listar_sol']);
    Route::get('tomar_chat/{chat_id}', [ChatController::class, 'tomar_chat']);
    Route::get('message/{chat_id}', [ChatController::class, 'message']);
    Route::post('send', [ChatController::class, 'sendmessage']);
    Route::get('close_chat/{chat_id}', [ChatController::class, 'close_chat']);
});

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'cont',
], function () {
    Route::get('areas', [MenuContenidoController::class, 'areas']); //? 1 nivel
    Route::get('areas_cont/{id}', [MenuContenidoController::class, 'areas_cont']); //? 2 nivel
    Route::get('areas_cont_det/{id}', [MenuContenidoController::class, 'areas_cont_det']); //? 3 nivel
    Route::get('mapas/{zona}/{det_id}', [MenuContenidoController::class, 'mapas']); //? 4 nivel
    Route::get('mapas_sub/{id}', [MenuContenidoController::class, 'mapas_sub']); //? 5 nivel
    Route::get('mapas_sub_det/{id}', [MenuContenidoController::class, 'mapas_sub_det']); //? 6 nivel
    Route::get('mapas_sub_det_extra/{id}', [MenuContenidoController::class, 'mapas_sub_det_extra']); //? 7 nivel
    Route::get('zonas_func', [MenuContenidoController::class, 'zonas_func']); //? listar zona distrito provincia
    Route::get('zona_filter/{zona}/{det_id}', [MenuContenidoController::class, 'zona_filter']); //? filtro por zona
    Route::get('imageables/{nivel}/{menu}', [MenuContenidoController::class, 'imageables']); //? imagenes
    Route::get('attacheable/{nivel}/{menu}', [MenuContenidoController::class, 'attacheable']); //? adjuntos
    Route::get('suggestions', [MenuContenidoController::class, 'suggestions']); //? 1 nivel
});