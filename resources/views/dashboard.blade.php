@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-9">
      <h1>Workshop Poster</h1>
      <img src="{{ url('/').'/'.$workshopPoster->image }}" alt="Workshop Poster">
    </div>
    <div class="col-md-3 d-flex flex-column align-items-end">
      <div class="timeline-container w-100">
        <div class="main-timeline-5 overflow-auto">
          @foreach ($timelines as $timeline)
            <div class="timeline-5 right-5 mb-4">
              <div class="card">
                <div class="card-body p-3">
                  <h5 class="mb-1">{{ array_key_exists("course_title", $timeline) ? $timeline["course_title"] : $timeline["title"] }}</h5>
                  <span class="small text-muted">
                    <i class="fas fa-clock me-1"></i>
                    {{ array_key_exists("start_date", $timeline) ? $timeline["start_date"] : $timeline["date"] }}
                  </span>
                  <p class="mt-2 mb-0">
                    {{ array_key_exists("course_title", $timeline) ? $timeline["course_title"] : $timeline["description"] }}
                  </p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('styles')

<style>

.timeline-container {
  font-size: 0.95rem;
  padding: 0.5rem;
  background: #f8f9fa;
  border-radius: 8px;
  min-width: 220px;
  max-width: 320px;
  width: 100%;
  box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.main-timeline-5 {
  position: relative;
  margin: 0;
  padding: 0 0 0 20px;
}

.main-timeline-5::after {
  content: "";
  position: absolute;
  width: 3px;
  background-color: #000;
  top: 0;
  bottom: 0;
  left: 10px;
}

.timeline-5 {
  position: relative;
  background-color: inherit;
  width: 100%;
}

.timeline-5::after {
  content: "";
  position: absolute;
  width: 14px;
  height: 14px;
  left: 3px;
  background-color: #000;
  top: 22px;
  border-radius: 50%;
  z-index: 1;
}

.timeline-5 .card {
  margin-left: 30px;
  min-width: 0;
  max-width: 100%;
}

.timeline-5.right-5::before {
  content: "";
  position: absolute;
  top: 28px;
  left: 24px;
  border: solid transparent;
  border-width: 8px 8px 8px 0;
  border-right-color: #fff;
  z-index: 2;
}

@media (max-width: 991px) {
  .timeline-container {
    max-width: 100%;
    min-width: 0;
  }
  .main-timeline-5 {
    padding-left: 10px;
  }
  .timeline-5 .card {
    margin-left: 20px;
  }
}
</style>

@endsection