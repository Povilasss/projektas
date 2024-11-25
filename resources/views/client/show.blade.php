@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $conference->title }}</h1>
        <p>{{ $conference->description }}</p>
        <p>Data: {{ $conference->date }}</p>
        <p>Vieta: {{ $conference->address }}</p>

        @if(Auth::check() && Auth::user()->hasRole('client'))
            <form action="{{ route('client.conferences.register', $conference->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Registruotis</button>
            </form>
        @else
            <p>Prisijunkite kaip klientas, kad galėtumėte registruotis į konferenciją.</p>
        @endif
    </div>
@endsection

