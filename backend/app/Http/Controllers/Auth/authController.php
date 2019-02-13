<?php

namespace App\Http\Controllers\auth;
use App\Models\User\User;
use App\Models\User\User_type;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Notifications\SignupActivate;

class authController extends Controller
{
	public function login(Request $request){
    	//pegando dados do request
		$data = $request->all();
	    //validando informações!
		$validacao = Validator::make($data, [
			'email' => 'required|string|email|max:255',
			'password' => 'required|string',
		]);
	    //verificando se tem erros
		if ($validacao->fails()) {
			return [
				'status' => false,
				'validacao' => true,
				'erros' => $validacao->errors()
			];
		}
		if (Auth::attempt([
			'email'=>$data['email'],
			'password'=>$data['password'],
		])) {
			$user = auth()->user();
			$user->type_user = $user->type_user()->first();
	    	//retornando token(accessToken) e criando tokeen
			$user->token = $user->createToken($user->email)->accessToken;
			return [
				'status' => 'true',
				'usuario' => $user,
			];
		}else{
			$resposta['status'] = false;
			return $resposta;
		}
	}
	public function register(Request $request){
		$data = $request->all();
	    //validando informações!
		$validacao = Validator::make($data, [
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6|confirmed',
		]);
	    //verificando se tem erros
		if ($validacao->fails()) {

			return [
				'status' => false,
				'validacao' => true,
				'erros' => $validacao->errors()
			];
		}else{

			$user = User::create([
				'name' => $data['name'],
				'email' => $data['email'],
				'password' => Hash::make($data['password']),
				'type_user_id' => 1,
				'activation_token' => str_random(60)
			]);
		    //retornando token(accessToken) e criando tokeen
			$user->notify(new SignupActivate($user));
			$user->token = $user->createToken($user->email)->accessToken;
		    //padrão de resposta correta
			return [
				'status' => 'true'
			];
		}
	}

	public function signupActivate($token){
		$user = User::where('activation_token', $token)->first();
	    if (!$user) {
	        return response()->json([
	            'message' => 'This activation token is invalid.'
	        ], 404);
	    }
	    $user->active = true;
	    $user->activation_token = '';
	    $user->save();
	    return redirect(env('FRONT_URL'));
	}
}
