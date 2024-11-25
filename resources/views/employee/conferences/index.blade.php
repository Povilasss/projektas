
@extends('layouts.app')

@section('content')
    <div class="container text-black">
        <h1>Visų konferencijų sąrašas</h1>
        <ul>
            @forelse($conferences as $conference)
                <li class="mb-4">
                    <h3>{{ $conference->title }}</h3>
                    <p>{{ $conference->description }}</p>
                    <p><strong>Data:</strong> {{ $conference->date }}</p>
                    <a href="{{ route('employee.conferences.show', $conference->id) }}" class="btn btn-primary">Peržiūrėti</a>
                </li>
            @empty
                <p>Šiuo metu nėra jokių konferencijų.</p>
            @endforelse
        </ul>
    </div>
@endsection

