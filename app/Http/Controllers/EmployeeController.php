<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Rodyti visų konferencijų sąrašą.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $conferences = Conference::all();


        return view('employee.conferences.index', compact('conferences'));
    }

    /**
     * Rodyti konkrečios konferencijos informaciją ir užsiregistravusius klientus.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        $conference = Conference::with(['participants' => function ($query) {
            $query->whereHas('roles', function ($roleQuery) {
                $roleQuery->where('name', 'client'); // Filtruojame tik klientus
            });
        }])->findOrFail($id);


        $registered_clients = $conference->participants->map(function ($participant) {
            return [
                'name' => $participant->name,
                'email' => $participant->email,
            ];
        });


        return view('employee.conferences.show', compact('conference', 'registered_clients'));
    }
}

