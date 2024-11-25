
@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1 style="font-size: 2rem; font-weight: bold;" class="text-black mb-6">Darbuotojo posistemis</h1>
        <p class="text-black mb-6">Šiame posistemyje galite matyti visų įvykusių ir planuojamų konferencijų sąrašą.</p>
        <a href="{{ route('employee.conferences.index') }}" class="btn btn-primary mx-auto">Peržiūrėti konferencijas</a>
    </div>
@endsection





