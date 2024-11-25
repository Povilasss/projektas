<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $studentInfo = [
            'name' => 'Povilas',
            'surname' => 'Nanartonis',
            'group' => 'PIT-21-I-NT',
        ];

        return view('home.index', compact('studentInfo'));
    }
}
