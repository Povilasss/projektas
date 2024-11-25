<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Conference;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::all();

        return view('admin.conferences.index', compact('conferences'));
    }

    public function create()
    {
        return view('admin.conferences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'lecturers' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'address' => 'required|string|max:255',
        ]);

        Conference::create($validated);

        return redirect()->route('admin.conferences.index')->with('message', 'Konferencija sėkmingai sukurta!');
    }

    public function edit($id)
    {
        $conference = Conference::findOrFail($id);

        return view('admin.conferences.edit', compact('conference'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'lecturers' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'address' => 'required|string|max:255',
        ]);

        $conference = Conference::findOrFail($id);
        $conference->update($validated);

        return redirect()->route('admin.conferences.index')->with('success', 'Konferencija sėkmingai atnaujinta!');
    }

    public function destroy($id)
    {
        $conference = Conference::findOrFail($id);

        if ($conference->status === 'Įvykusi') {
            return redirect()->route('admin.conferences.index')->with('error', 'Įvykusios konferencijos negalima ištrinti.');
        }

        $conference->delete();

        return redirect()->route('admin.conferences.index')->with('success', 'Konferencija sėkmingai ištrinta!');
    }
}
