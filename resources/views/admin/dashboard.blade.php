
@extends('layouts.app')

@section('content')
    <div class="container text-center text-black">
        <h1 class="text-4xl font-bold mb-6">Sistemos administratoriaus posistemis</h1>
        <p class="mb-6">Pasirinkite vieną iš žemiau pateiktų valdymo galimybių:</p>
        <ul class="space-y-4">
            <li>
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary w-1/2 mx-auto py-2 text-center">Naudotojų duomenų valdymas</a>
            </li>
            <li class="mt-4">
                <a href="{{ route('admin.conferences.index') }}" class="btn btn-primary w-1/2 mx-auto py-2 text-center">Konferencijų valdymas</a>
            </li>
        </ul>
    </div>
@endsection




