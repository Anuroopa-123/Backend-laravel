@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add Media Category</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('mediaCategories.add') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Name *</label>
                            <select name="name" class="form-control" required>
                                <option value="">-----</option>
                                <option value="Events" {{ old('name') == 'Events' ? 'selected' : '' }}>Events</option>
                                <option value="Print Media" {{ old('name') == 'Print Media' ? 'selected' : '' }}>Print Media</option>
                                <option value="LinkedIn" {{ old('name') == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description *</label>
                            <textarea name="description" rows="4" required class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="is_published" value="1" id="is_published" {{ old('is_published') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">Published</label>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-success">Save</button>
                            <a href="{{ route('jobs.list') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection