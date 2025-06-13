@extends('layouts.app')

@section('content')
<div class="container">
    <div class="top-section d-flex justify-content-between pt-3 pb-3">
        <h2>Hackathon Events</h2>
        <a href="{{ route('hackathons.create') }}" class="btn btn-primary mb-3">Add New</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Hackathons</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($hackathons as $hackathon)
            <tr>
                <td><a href="{{ route('hackathons.editForm', $hackathon->id) }}" class="link-underline-opacity-100"><b>{{ $hackathon->title }}</b></a></td>
                <td>
                    <a href="{{ route('hackathons.delete', $hackathon->id) }}">
                        <i class="bi bi-trash3-fill text-red-500"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection