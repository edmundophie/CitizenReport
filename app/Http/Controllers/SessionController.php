<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\UserModel;
use Session;

class SessionController extends Controller {

	public function login(Request $request) {
		$username = $request->get('username');
		$password = $request->get('password');
		$user = UserModel::where('username', $username)->where('password', $password)->first();
		if(count($user)<1)
			return redirect('login');
		else {
			Session::put('id_user', $user->id);
			Session::put('username', $user->username);
			Session::put('role', $user->role);
			return redirect('index');
		}
	}

	public function logout() {
		Session::flush();

		return redirect('login');
	}

}
