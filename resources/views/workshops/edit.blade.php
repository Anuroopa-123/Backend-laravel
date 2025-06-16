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
                    <h4 class="mb-0">Edit Workshop</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('workshops.edit', $workshop->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label class="form-label fw-bold">Image (Supported Types: JPG, PNG, JPEG, GIF)</label>
                            @if($workshop->image)
                                <div class="mb-2">
                                    <img src="{{ asset($workshop->image) }}" alt="Current Image" style="max-width: 180px; border-radius: 8px;">
                                </div>
                                <div class="text-muted mb-2">Currently: {{ basename($workshop->image) }}</div>
                            @endif
                            <input type="file" name="image" class="form-control">
                            <div class="form-text">Leave blank to keep current image.</div>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="is_published" value="1" id="is_published" {{ old('is_published', $workshop->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">Published</label>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-success">Save</button>
                            <a href="{{ route('workshops.list') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection