<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public $users = [
        ['name' => 'Mario', 'surname' => 'Rossi', 'role' => 'Senior Manager'],
        ['name' => 'Anna', 'surname' => 'Marino', 'role' => 'HR'],
        ['name' => 'Mattia', 'surname' => 'Cimaroli', 'role' => 'Developer'],
    ];

    public function homepage()
    {
        return view('welcome');
    }

    public function aboutUs()
    {
        return view('about-us', ['users' => $this->users]);
    }

    public function aboutUsDetail($name)
    {
        foreach ($this->users as $user) {
            if ($name == $user['name']) {
                return view('about-us-detail', ['user' => $user]);
            }
        }

        // Nome non presente nell'elenco
        abort(404);
    }

    public function contactUs(Request $request)
    {
        $request->validate([
            'user' => 'required|max:100',
            'email' => 'required|email',
            'message' => 'required|min:5',
        ]);

        $user = $request->input('user');
        $email = $request->input('email');
        $message = $request->input('message');
        $userData = compact('user', 'email', 'message');

        try {
            Mail::to($email)->send(new ContactMail($userData));
        } catch (Exception $e) {
            return redirect()
                ->route('homepage')
                ->with('emailError', "C'è stato un problema con l'invio della mail. Per favore riprova più tardi");
        }

        return redirect()
            ->route('homepage')
            ->with('emailSent', 'Hai correttamente inviato una email');
    }

    public function profile()
    {
        return view('movie.profile');
    }
}