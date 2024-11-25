
@extends('layouts.app')

@section('content')
    <div class="container text-center text-black">
        <h1>Redaguoti naudotoją: {{ $user->name }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="inline-block">
            @csrf
            @method('PUT')

            <
            <div class="form-group mb-4">
                <label for="name">Vardas</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control bg-gray-200" required>
            </div>


            <div class="form-group mb-4">
                <label for="email">El. paštas</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control bg-gray-200" required>
            </div>

            <button type="submit" class="btn btn-success">Išsaugoti</button>
        </form>
    </div>
@endsection





