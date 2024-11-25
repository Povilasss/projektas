@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-black text-center" style="font-size: 2rem; font-weight: bold;">Naudotojų valdymas</h1>
        <p class="text-black text-center">Čia galite valdyti sistemos naudotojus</p>

        <table class="table table-bordered mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Vardas</th>
                <th>El. paštas</th>
                <th>Rolė</th>
                <th>Veiksmai</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge bg-secondary">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Redaguoti</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nėra sistemos naudotojų.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

