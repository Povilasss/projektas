
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="color: black; text-align: center; font-weight: bold; font-size: 2rem;">Sukurti naują konferenciją</h1>

        <form action="{{ route('admin.conferences.store') }}" method="POST">
            @csrf

            <!-- Pavadinimas -->
            <div class="form-group">
                <label for="title" style="color: black; font-weight: bold">Pavadinimas</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required style="background-color: #f0f0f0; color: black;">
                @error('title')
                <div class="text-danger" style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Aprašymas -->
            <div class="form-group">
                <label for="description" style="color: black; font-weight: bold">Aprašymas</label>
                <textarea id="description" name="description" class="form-control" required style="background-color: #f0f0f0; color: black;">{{ old('description') }}</textarea>
                @error('description')
                <div class="text-danger" style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Lektoriai -->
            <div class="form-group">
                <label for="lecturers" style="color: black; font-weight: bold">Lektoriai</label>
                <input type="text" id="lecturers" name="lecturers" class="form-control" value="{{ old('lecturers') }}" required style="background-color: #f0f0f0; color: black;">
                @error('lecturers')
                <div class="text-danger" style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Data -->
            <div class="form-group">
                <label for="date" style="color: black; font-weight: bold">Data</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}" required style="background-color: #f0f0f0; color: black;">
                @error('date')
                <div class="text-danger" style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Laikas -->
            <div class="form-group">
                <label for="time" style="color: black; font-weight: bold">Laikas</label>
                <input type="time" id="time" name="time" class="form-control" value="{{ old('time') }}" required style="background-color: #f0f0f0; color: black;">
                @error('time')
                <div class="text-danger" style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Adresas -->
            <div class="form-group">
                <label for="address" style="color: black; font-weight: bold">Adresas</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" required style="background-color: #f0f0f0; color: black;">
                @error('address')
                <div class="text-danger" style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-top: 20px;">
                <button type="submit" class="btn btn-success">Sukurti konferenciją</button>
            </div>
        </form>
    </div>
@endsection

