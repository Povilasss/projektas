
@extends('layouts.app')

@section('content')
    <div class="container text-center text-black">
        <h1>{{ $conference->title }}</h1>
        <p>{{ $conference->description }}</p>
        <p><strong>Data:</strong> {{ $conference->date }}</p>
        <p><strong>Vieta:</strong> {{ $conference->address }}</p>

        <h3 class="mt-5">Užsiregistravę klientai:</h3>
        <ul class="list-disc list-inside">
            @forelse($registered_clients as $client)
                <li>{{ $client['name'] }} - {{ $client['email'] }}</li>
            @empty
                <p>Nėra užsiregistravusių klientų.</p>
            @endforelse
        </ul>
    </div>
@endsection


