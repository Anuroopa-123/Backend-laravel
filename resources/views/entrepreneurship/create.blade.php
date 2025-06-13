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
                    <h4 class="mb-0">Add Entrepreneurship Event</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('entrepreneurship.add') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Course image *</label>
                            <input type="file" name="course_image" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Course title *</label>
                            <input name="course_title" value="{{ old('course_title') }}" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Course lab *</label>
                            <select name="course_lab" required class="form-control">
                                <option value="">Select Lab</option>
                                <option value="Innovative Manufacturing" {{ old('course_lab') == 'Innovative Manufacturing' ? 'selected' : '' }}>Innovative Manufacturing</option>
                                <option value="Product Innovation Center" {{ old('course_lab') == 'Product Innovation Center' ? 'selected' : '' }}>Product Innovation Center</option>
                                <option value="Predictive Engineering" {{ old('course_lab') == 'Predictive Engineering' ? 'selected' : '' }}>Predictive Engineering</option>
                                <option value="Smart Factory Center" {{ old('course_lab') == 'Smart Factory Center' ? 'selected' : '' }}>Smart Factory Center</option>
                                <option value="AR | VR | MR Research Centre" {{ old('course_lab') == 'AR | VR | MR Research Centre' ? 'selected' : '' }}>AR | VR | MR Research Centre</option>
                                <option value="Research Centre For PLM" {{ old('course_lab') == 'Research Centre For PLM' ? 'selected' : '' }}>Research Centre For PLM</option>
                                <option value="Research Centre For Asset Performance" {{ old('course_lab') == 'Research Centre For Asset Performance' ? 'selected' : '' }}>Research Centre For Asset Performance</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Start date *</label>
                            <input name="start_date" type="date" value="{{ old('start_date') }}" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">From time *</label>
                            <input name="from_time" type="time" value="{{ old('from_time') }}" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">To time *</label>
                            <input name="to_time" type="time" value="{{ old('to_time') }}" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Mode *</label>
                            <select name="mode" required class="form-control">
                                <option value="">Select Mode</option>
                                <option value="Offline" {{ old('mode') == 'Offline' ? 'selected' : '' }}>Offline</option>
                                <option value="Online" {{ old('mode') == 'Online' ? 'selected' : '' }}>Online</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Contact person *</label>
                            <input name="contact_person" value="{{ old('contact_person') }}" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Contact mail *</label>
                            <input name="contact_mail" type="email" value="{{ old('contact_mail') }}" required class="form-control">
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="is_published" value="1" id="is_published">
                            <label class="form-check-label" for="is_published">Published</label>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-success">Save</button>
                            <a href="{{ route('entrepreneurship.list') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
