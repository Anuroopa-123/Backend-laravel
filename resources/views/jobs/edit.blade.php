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
                    <h4 class="mb-0">Edit Job</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('jobs.edit', $job->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label class="form-label fw-bold">Role *</label>
                            <input name="role" value="{{ old('role', $job->role) }}" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description *</label>
                            <textarea name="description" rows="4" required class="form-control">{{ old('description', $job->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Posted On *</label>
                            <input name="posted_on" type="date" value="{{ old('posted_on', $job->posted_on) }}" required class="form-control">
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="is_published" value="1" id="is_published" {{ old('is_published', $job->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">Published</label>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Type *</label>
                            <select name="type" class="form-control" required>
                                <option value="">-----</option>
                                <option value="Full Stack Developer" {{ old('type', $job->type) == 'Full Stack Developer' ? 'selected' : '' }}>Full Stack Developer</option>
                                <option value="Front-end Developer" {{ old('type', $job->type) == 'Front-end Developer' ? 'selected' : '' }}>Front-end Developer</option>
                                <option value="Backend Developer" {{ old('type', $job->type) == 'Backend Developer' ? 'selected' : '' }}>Backend Developer</option>
                            </select>
                            </select>
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