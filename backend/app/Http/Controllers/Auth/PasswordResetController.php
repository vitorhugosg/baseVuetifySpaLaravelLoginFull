<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\Models\User\User;
use App\Models\Auth\PasswordReset;
class PasswordResetController extends Controller
{
    /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function create(Request $request)
    {
    	$request->validate([
    		'email' => 'required|string|email',
    	]);
    	$user = User::where('email', $request->email)->first();
    	if (!$user){
    		return [
    			'message' => 'Não podemos encontrar um usuário com esse endereço de e-mail.',
    			'status' => false
    		];
    	}
    	$passwordReset = PasswordReset::updateOrCreate(
    		['email' => $user->email],
    		[
    			'email' => $user->email,
    			'token' => str_random(60)
    		]
    	);
    	if ($user && $passwordReset){
    		$user->notify(
    			new PasswordResetRequest($passwordReset->token)
    		);
    		return [
    			'message' => 'Nós enviamos um e-mail para o seu link de redefinição de senha!',
    			'status' => true
    		];
    	}
    }

    public function find($token)
    {
    	$passwordReset = PasswordReset::where('token', $token)
    	->first();
    	if (!$passwordReset){
    		return [
    			'message' => 'Este token de redefinição de senha é inválido.',
    			'status'=> false
    		];
    	}
    	if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
    		$passwordReset->delete();
    		return [
    			'message' => 'Este token de redefinição de senha é inválido.',
    			'status'=> false
    		];
    	}
    	return response()->json($passwordReset);
    }

    public function reset(Request $request)
    {
    	$request->validate([
    		'email' => 'required|string|email',
    		'password' => 'required|string|confirmed',
    		'token' => 'required|string'
    	]);
    	$passwordReset = PasswordReset::where([
    		['token', $request->token],
    		['email', $request->email]
    	])->first();
    	if (!$passwordReset){
    		return [
    			'message' => 'Este token de redefinição de senha é inválido.',
    			'status'=> false
    		];
    	}


    	$user = User::where('email', $passwordReset->email)->first();
    	if (!$user){
    		return [
    			'message' => 'Não podemos encontrar um usuário com esse endereço de e-mail.',
    			'status' => false
    		];
    	}

    	$user->password = bcrypt($request->password);
    	$user->save();
    	$passwordReset->delete();
    	$user->notify(new PasswordResetSuccess($passwordReset));
    	return response()->json($user);
    }
}
