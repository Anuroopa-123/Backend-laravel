@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Internship Applications</h2>

        <table class="table table-striped" data-toggle="table" data-filter-control="true" data-pagination="true"
            data-page-size="10" data-sort-reset="true">
            <thead>
                <tr>
                    <th data-field="id" data-sortable="true" data-filter-control="input">ID</th>
                    <th data-field="fullName" data-sortable="true" data-filter-control="input">Full Name</th>
                    <th data-field="email" data-sortable="true" data-filter-control="input">Email</th>
                    <th data-field="contactNumber" data-sortable="true" data-filter-control="input">Contact</th>
                    <th data-field="collegeName" data-sortable="true" data-filter-control="input">College</th>
                    <th data-field="course" data-sortable="true" data-filter-control="input">Course</th>
                    <th data-field="duration" data-sortable="true">Duration</th>
                    <th data-field="startDate" data-sortable="true">Start</th>
                    <th data-field="endDate" data-sortable="true">End</th>
                    <th data-field="referredBy" data-sortable="true">Referred By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($internships as $intern)
                    <tr>
                        <td>{{ $intern->id }}</td>
                        <td>{{ $intern->fullName }}</td>
                        <td>{{ $intern->email }}</td>
                        <td>{{ $intern->contactNumber }}</td>
                        <td>{{ $intern->collegeName }}</td>
                        <td>{{ $intern->course }}</td>
                        <td>{{ $intern->duration }}</td>
                        <td>{{ \Carbon\Carbon::parse($intern->startDate)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($intern->endDate)->format('d M Y') }}</td>
                        <td>{{ $intern->referredBy ?? '-' }}</td>
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
            min-width: 150px !important;
            width: 100% !important;
            padding-left: 10px;
            padding-right: 10px;
            box-sizing: border-box;
        }

        th {
            text-align: center !important;
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

        });
    </script>
@endsection
