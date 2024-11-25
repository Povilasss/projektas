@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-3xl my-10 p-6 bg-white rounded-lg shadow-md">
        @if(session('message'))
            <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <h1 class="text-4xl font-bold text-center mb-3 text-black">Konferencijų sąrašas</h1>
        <ul class="space-y-6">
            @forelse($conferences as $conference)
                <li class="p-6 bg-gray-50 rounded-lg shadow-sm">
                    <h3 class="text-2xl font-semibold mb-3 text-black">{{ $conference->title }}</h3>
                    <p class="text-gray-700 mb-4">{{ $conference->description }}</p>
                    <div class="flex justify-between">
                        <!-- Nuoroda į konferencijos peržiūrą -->
                        <a href="{{ route('client.show', $conference->id) }}" class="btn btn-primary">Peržiūrėti</a>

                        <!-- Registracijos forma -->
                        @if(Auth::check() && Auth::user()->hasRole('client'))
                            <form action="{{ route('client.conferences.register', $conference->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Registruotis</button>
                            </form>
                        @else
                            <p class="text-gray-500 italic">Prisijunkite kaip klientas, kad galėtumėte registruotis.</p>
                        @endif
                    </div>
                </li>
            @empty
                <p class="text-center text-gray-500">Šiuo metu nėra konferencijų.</p>
            @endforelse
        </ul>
    </div>
@endsection


