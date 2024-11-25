<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Rodyti visų konferencijų sąrašą.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $conferences = Conference::all();

        return view('client.index', compact('conferences'));
    }

    /**
     * Rodyti konkrečią konferenciją.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        $conference = Conference::findOrFail($id);

        return view('client.show', compact('conference'));
    }

    /**
     * Registruoti klientą į konferenciją.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register($id)
    {
        $conference = Conference::findOrFail($id);


        if ($conference->participants()->where('user_id', Auth::id())->exists()) {
            return redirect()->back()->with('message', 'Jūs jau užsiregistravote šioje konferencijoje.');
        }


        $conference->participants()->attach(Auth::id());

        return redirect()->route('client.index')->with('message', 'Sėkmingai užsiregistravote į konferenciją!');
    }
}

