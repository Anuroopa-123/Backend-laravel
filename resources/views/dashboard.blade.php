@extends('layouts.app')

@section('content')

<div class="timeline">
    @foreach ($timelines as $timeline)
        <section>
            <div class="container">
                <div class="main-timeline-5">
                    <div class="timeline-5 right-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <h5>{{ array_key_exists("course_title", $timeline) ? $timeline["course_title"] : $timeline["title"] }}</h5>
                                <span class="small text-muted"><i class="fas fa-clock me-1"></i>{{ array_key_exists("start_date", $timeline) ? $timeline["start_date"] : $timeline["date"] }}</span>
                                <p class="mt-2 mb-0">
                                    {{ array_key_exists("course_title", $timeline) ? $timeline["course_title"] : $timeline["description"] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
</div>

@endsection

@section('styles')

<style>
    /* The actual timeline (the vertical ruler) */
.main-timeline-5 {
  position: relative;
  max-width: 50%;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.main-timeline-5::after {
  content: "";
  position: absolute;
  width: 3px;
  background-color: rgb(0, 0, 0);
  top: 0;
  bottom: 0;
  left: auto;
  margin-left: -3px;
}

/* Container around content */
.timeline-5 {
  position: relative;
  background-color: inherit;
  width: 100%;
}

/* The circles on the timeline */
.timeline-5::after {
  content: "";
  position: absolute;
  width: 17px;
  height: 17px;
  right: 1px;
  background-color: rgb(0, 0, 0);
  top: 18px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the right */
.right-5 {
  padding: 0px 0px 20px 40px;
  left: auto;
}

/* Add arrows to the right container (pointing left) */
.right-5::before {
  content: " ";
  position: absolute;
  top: 18px;
  z-index: 1;
  left: 30px;
  border: medium solid rgb(0,0,0);
  border-width: 10px 10px 10px 0;
  border-color: transparent rgb(0, 0, 0) transparent transparent;
}

/* Fix the circle for containers on the right side */
.right-5::after {
  left: -10px;
}

@media (max-width: 991px) {
  .main-timeline-5 {
    max-width: 100%;
  }
}
.gradient-custom-5 {
  /* fallback for old browsers */
  background: #ebbba7;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(
    to right,
    rgba(235, 187, 167, 1),
    rgba(207, 199, 248, 1)
  );

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(
    to right,
    rgba(235, 187, 167, 1),
    rgba(207, 199, 248, 1)
  );
}
</style>

@endsection