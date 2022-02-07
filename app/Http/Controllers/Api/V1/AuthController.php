<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\LogoutPostRequest;
use App\Http\Requests\RegisterPostRequest;
use App\Http\Requests\UpdatePassPutRequest;
use App\Http\Requests\UpdateUserPutRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function optimize()
    {
        Artisan::call('optimize');
        return "optimizado";
    }

    private function generate_string($input, $strength = 16)
    {
        $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }

    public function login(LoginPostRequest $request)
    {

        try {
            $credentials = request(['email', 'password']);
            $token = null;
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'error' => 'Credenciales incorrectas',
                    'message' => 'Credenciales incorrectas ',
                ], Response::HTTP_UNAUTHORIZED);
            } else {

                // if (Auth::user()->roles()->get()[0]->name != "Cliente") {
                //     return response()->json([
                //         'success' => false,
                //         'error' => 'Unauthorized',
                //         'message' => 'Credenciales de abogado',
                //     ], Response::HTTP_UNAUTHORIZED);
                // }

                $user = Auth::user();
                $user->device_token = $token;
                $user->save();

                $data = [
                    'id' => $user->id,
                    'fullname' => $user->fullname,
                    'email' => $user->email,
                    'device_token' => $user->device_token,
                    'role' => $user->roles()->get()[0]->name,
                    // 'role' => Auth::user()->roles()->get()[0]->name
                ];

                return response()->json([
                    'success' => true,
                    'data' => $data,
                    'message' => 'El usuario ha sido autenticado',
                ], Response::HTTP_OK);
            }
        } catch (Exception $e) {
            // $e->getMessage()
            return response()->json([
                'success' => false,
                'error' => 'Error interno del servidor',
                'message' => 'Error interno del servidor',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function logout(LogoutPostRequest $request)
    {
        try {
            $user = Auth::user();
            JWTAuth::invalidate($request->device_token);
            $user->device_token = '';
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Session Cerrada',
            ], Response::HTTP_OK);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Error Interno',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateUser(UpdateUserPutRequest $request)
    {
        try {
            $user = Auth::user();
            $user->update([
                'document' => $request->document,
                'num_document' => $request->num_document,
                'noveno_numero' => $request->num_document[9],
                'fullname' => $request->fullname,
                'email' => $request->email,
                'dni_pasaporte' => $request->dni_pasaporte,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
            ]);

            $data = [
                'document' => $user->document,
                'num_document' => $user->num_document,
                'noveno_numero' => $user->noveno_numero,
                'fullname' => $user->fullname,
                'email' => $user->email,
                'dni_pasaporte' => $user->dni_pasaporte,
                'telefono' => $user->telefono,
                'direccion' => $user->direccion,
            ];

            return response()->json([
                'success' => true,
                'message' => 'Usuario Actualizado con exito',
                'data' => $data,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'message' => 'Error interno del servidor',
            ], 500);
        }
    }

    public function updatePass(UpdatePassPutRequest $request)
    {
        try {
            $user = Auth::user();
            $user->password = bcrypt($request->password);
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Password Actualizado con exito',
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Error Password',
                'message' => 'Error interno del servidor',
            ], 500);
        }
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                $code = $this->generate_string(time(), 8);
                $user->password = bcrypt($code);
                $user->save();

                $details = [
                    'code' => $code
                ];

                \Mail::to($request->email)->send(new \App\Mail\ForgotPasswordMail($details));

                return response()->json([
                    'success' => true,
                    'message' => 'Password Actualizado con exito',
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'error' => 'Error Password',
                    'message' => 'Error interno del servidor',
                ], 500);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Error Password',
                'message' => 'Error interno del servidor',
            ], 500);
        }
    }

    public function getUser()
    {
        try {
            $user = Auth::user();

            $data = [
                'id' => $user->id,
                'document' => $user->document,
                'num_document' => $user->num_document,
                'noveno_numero' => $user->noveno_numero,
                'fullname' => $user->fullname,
                'email' => $user->email,
                'dni_pasaporte' => $user->dni_pasaporte,
                'telefono' => $user->telefono,
                'direccion' => $user->direccion,
                'role' => Auth::user()->roles()->get()[0]->name
            ];

            return response()->json([
                'success' => true,
                'message' => 'Usuario obtenido con exito',
                'data' => $data,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Error interno del servidor',
                'message' => 'Error interno del servidor',
            ], 500);
        }
    }

    public function register(RegisterPostRequest $request)
    {
        try {
            $user = User::create([
                'document' => $request->document,
                'num_document' => $request->num_document,
                'noveno_numero' => $request->num_document[9],
                'fullname' => $request->fullname,
                'email' => $request->email,
                'dni_pasaporte' => $request->dni_pasaporte,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
                'password' => bcrypt($request->password),
            ])->assignRole('Cliente');

            $token = JWTAuth::fromUser($user);
            $user->device_token = $token;
            $user->save();

            $data = [
                'id' => $user->id,
                'fullname' => $user->fullname,
                'email' => $user->email,
                'device_token' => $token,
            ];

            return response()->json([
                'success' => true,
                'message' => 'Usuario Creado con exito',
                'data' => $data,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => ['Error interno del servidor'],
                'message' => 'Error interno del servidor',
            ], 500);
        }
    }

    public function checkToken()
    {
        return response()->json([
            'success' => true,
            'message' => 'Token valido',
        ], 200);
    }
}
