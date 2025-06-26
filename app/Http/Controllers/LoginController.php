<?php

namespace App\Http\Controllers;

use App\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $userRepository;

    public function __construct(private UserRepositoryInterface $repository)
    {
        $this->userRepository = $repository;
    }

    public function index(Request $request)
    {
        $error = '';

        if ($request->get('error') == 1) {
            $error = "Usuário e/ou senha inválidos!!!";
        }

        if ($request->get('error') == 2) {
            $error = "Acesso negado!!!";
        }

        return view("site.login", ["error" => $error]);
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $messages = [
            'email' => 'Informe um e-mail válido.',
            'required' => 'O campo :attribute é obrigatório.',
        ];

        $request->validate($rules, $messages);

        $email = $request->email;
        $password = $request->password;

        $user = $this->userRepository->verifyUser($email, $password);

        if (isset($user->name)) {
            session_start();
            $_SESSION['name'] = $user->name;
            $_SESSION['email'] = $user->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['error' => 1]);
        }
    }

    public function logout()
    {
        session_destroy();
        return redirect()->route('site.main');
    }
}
