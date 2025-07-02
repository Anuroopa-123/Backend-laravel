@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Visitor Feedback</h2>

        <table class="table table-striped" data-toggle="table" data-filter-control="true" data-pagination="true"
            data-page-size="10" data-sort-reset="true">
            <thead>
                <tr>
                    <th data-field="id" data-sortable="true" data-filter-control="input">ID</th>
                    <th data-field="name" data-sortable="true" data-filter-control="input">Name</th>
                    <th data-field="designation" data-sortable="true" data-filter-control="input">Designation</th>
                    <th data-field="email" data-sortable="true" data-filter-control="input">Email</th>
                    <th data-field="visitPurpose" data-sortable="true" data-filter-control="input">Purpose</th>
                    <th data-field="message" data-sortable="false">Message</th>
                    <th data-field="rating" data-sortable="true">Rating</th>
                    <th data-field="created_at" data-sortable="true">Submitted At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbacks as $fb)
                    <tr>
                        <td>{{ $fb->id }}</td>
                        <td>{{ $fb->name }}</td>
                        <td>{{ $fb->designation }}</td>
                        <td>{{ $fb->email }}</td>
                        <td>{{ $fb->visitPurpose }}</td>
                        <td>{{ Str::limit($fb->message, 50) }}</td>
                        <td>
                            <span class="text-warning">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="bi {{ $i <= $fb->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                @endfor
                            </span>
                        </td>
                        <td>{{ $fb->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('styles')
    <style>
        th .filter-control,
        td .filter-control {
            min-width: 140px;
            padding: 5px;
        }
    </style>
@endsection
