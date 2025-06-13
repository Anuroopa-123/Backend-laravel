@extends('layouts.app')

@section('content')
<div class="container">
    <div class="top-section d-flex justify-content-between pt-3 pb-3">
        <h2>Events</h2>
        <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Add New</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Title</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($events as $event)
            <tr>
                <td><a href="{{ route('events.editForm', $event->id) }}"><b>{{ $event->title }}</b></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
