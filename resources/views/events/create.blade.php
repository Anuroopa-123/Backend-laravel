@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add Event</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('events.add') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Title *</label>
                            <input name="title" value="{{ old('title') }}" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description *</label>
                            <textarea name="description" rows="4" required class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Date *</label>
                            <input name="date" type="date" value="{{ old('date') }}" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Image *</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Category *</label>
                            <select name="category" class="form-select" required>
                                <option value="">Select category</option>
                                <option value="MoU" {{ old('category') == 'MoU' ? 'selected' : '' }}>MoU</option>
                                <option value="Official" {{ old('category') == 'Official' ? 'selected' : '' }}>Official</option>
                                <option value="Industrial Visit" {{ old('category') == 'Industrial Visit' ? 'selected' : '' }}>Industrial Visit</option>
                                <option value="Naan Mudhalvan" {{ old('category') == 'Naan Mudhalvan' ? 'selected' : '' }}>Naan Mudhalvan</option>
                            </select>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="published" value="1" id="published" {{ old('published') ? 'checked' : '' }}>
                            <label class="form-check-label" for="published">Published</label>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-success">Save</button>
                            <a href="{{ route('events.list') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection