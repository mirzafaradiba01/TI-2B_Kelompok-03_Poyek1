<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm() {
        return view('layouts.login');
    }

    public function username() {
        return 'username';
    }

    public function password() {
        return 'password';
    }

    protected function validateLogin(Request $request) {
        $request->validate([
            $this->username() => 'required|string',
            $this->password() => 'required|string',
        ]);
    }

    public function logout(Request $request) {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/login');
    }

    protected function authenticated(Request $request, $user) {

        // Lakukan logika redirect sesuai dengan peran pengguna
        if ($request->user() && $user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($request->user() && $user->role === 'petugas') {
            return redirect()->route('petugas.dashboard');
        } elseif ($request->user() && $user->role === 'pelanggan') {
            return redirect()->route('pelanggan.index');
        }

        // Jika peran pengguna tidak cocok dengan peran yang diperiksa,
        // lakukan redirect ke halaman default atau halaman beranda
        return redirect('/');
    }
}
