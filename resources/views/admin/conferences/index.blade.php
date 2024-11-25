@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="color: black; text-align: center; font-weight: bold; font-size: 2rem;">Konferencijų valdymas</h1>
        <a href="{{ route('admin.conferences.create') }}" class="btn btn-primary">Sukurti naują konferenciją</a>

        <!-- Pranešimų sekcija -->
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
            <tr>
                <th>Pavadinimas</th>
                <th>Data</th>
                <th>Vieta</th>
                <th>Veiksmai</th>
            </tr>
            </thead>
            <tbody>
            @forelse($conferences as $conference)
                <tr>
                    <td>{{ $conference->title }}</td>
                    <td>{{ $conference->date }}</td>
                    <td>{{ $conference->address }}</td>
                    <td>
                        <a href="{{ route('admin.conferences.edit', $conference->id) }}" class="btn btn-warning">Redaguoti</a>
                        <form action="{{ route('admin.conferences.destroy', $conference->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Trinti</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Nėra konferencijų.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection


