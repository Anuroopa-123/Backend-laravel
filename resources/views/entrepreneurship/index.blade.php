@extends('layouts.app')

@section('content')
<div class="container">
    <div class="top-section d-flex justify-content-between pt-3 pb-3">
        <h2>Entrepreneurship Events</h2>
        <a href="{{ route('entrepreneurship.create') }}" class="btn btn-primary mb-3">Add New</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Entrepreneurships</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($entrepreneurships as $entrepreneurship)
            <tr>
                <td><a href="{{ route('entrepreneurship.editForm', $entrepreneurship->id) }}" class="link-underline-opacity-100"><b>{{ $entrepreneurship->course_title }}</b></a></td>
                <td>
                    <a href="{{ route('entrepreneurship.delete', $entrepreneurship->id) }}">
                        <i class="bi bi-trash3-fill text-red-500"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection