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
                    <h4 class="mb-0">Add Hackathon Event</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('hackathons.add') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Title *</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description *</label>
                            <input name="description" value="{{ old('description') }}" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Date *</label>
                            <input name="date" type="date" value="{{ old('date') }}" required class="form-control">
                        </div>

                         <div class="mb-3">
                            <label class="form-label fw-bold">Image *</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="is_published" value="1" id="is_published">
                            <label class="form-check-label" for="is_published">Published</label>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Font Style *</label>
                            <select name="font_style" required class="form-control">
                                <option value="">-----</option>
                                <option value="Arial" {{ old('font_style') == 'Arial' ? 'selected' : '' }}>Arial</option>
                                <option value="Verdana" {{ old('font_style') == 'Verdana' ? 'selected' : '' }}>Verdana</option>
                                <option value="Times New Roman" {{ old('font_style') == 'Times New Roman' ? 'selected' : '' }}>Times New Roman</option>
                                <option value="Courier New" {{ old('font_style') == 'Courier New' ? 'selected' : '' }}>Courier New</option>
                                <option value="Georgia" {{ old('font_style') == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                <option value="Tahoma" {{ old('font_style') == 'Tahoma' ? 'selected' : '' }}>Tahoma</option>
                                <option value="Trebuchet MS" {{ old('font_style') == 'Tebuchet MS' ? 'selected' : '' }}>Tebuchet MS</option>
                                <option value="Cosmic Sans MS" {{ old('font_style') == 'Cosmic Sans MS' ? 'selected' : '' }}>Cosmic Sans MS</option>
                            </select>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-success">Save</button>
                            <a href="{{ route('hackathons.list') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
