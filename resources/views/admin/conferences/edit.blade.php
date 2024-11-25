
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="color: black; text-align: center; font-weight: bold; font-size: 2rem;">Redaguoti konferenciją</h1>

        <form action="{{ route('admin.conferences.update', $conference['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title" style="color: black; font-weight: bold">Pavadinimas</label>
                <input type="text" id="title" name="title" value="{{ old('title', $conference['title']) }}" class="form-control" required style="background-color: #f0f0f0; color: black;">
            </div>

            <div class="form-group">
                <label for="description" style="color: black; font-weight: bold">Aprašymas</label>
                <textarea id="description" name="description" class="form-control" required style="background-color: #f0f0f0; color: black;">{{ old('description', $conference['description']) }}</textarea>
            </div>

            <div class="form-group">
                <label for="lecturers" style="color: black; font-weight: bold">Lektoriai</label>
                <input type="text" id="lecturers" name="lecturers" value="{{ old('lecturers', $conference['lecturers']) }}" class="form-control" required style="background-color: #f0f0f0; color: black;">
            </div>

            <div class="form-group">
                <label for="date" style="color: black; font-weight: bold">Data</label>
                <input type="date" id="date" name="date" value="{{ old('date', $conference['date']) }}" class="form-control" required style="background-color: #f0f0f0; color: black;">
            </div>

            <div class="form-group">
                <label for="time" style="color: black; font-weight: bold">Laikas</label>
                <input type="time" id="time" name="time" value="{{ old('time', $conference['time']) }}" class="form-control" required style="background-color: #f0f0f0; color: black;">
            </div>

            <div class="form-group">
                <label for="address" style="color: black; font-weight: bold">Adresas</label>
                <input type="text" id="address" name="address" value="{{ old('address', $conference['address']) }}" class="form-control" required style="background-color: #f0f0f0; color: black;">
            </div>

            <div style="margin-top: 20px;">
                <button type="submit" class="btn btn-success">Išsaugoti</button>
            </div>
        </form>
    </div>
@endsection


