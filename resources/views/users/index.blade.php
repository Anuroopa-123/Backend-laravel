@extends('layouts.app')

@section('content')
<div class="container">
    <div class="top-section d-flex justify-content-between pt-3 pb-3">
        <h2>Users</h2>
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Users</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($users as $user)
            <tr>
                <td class="flex justify-between">
                    {{ $user->email }}
                    <a href="{{ route('users.edit', $user->id) }}">
                        <i class="bi bi-pen-fill text-black"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection