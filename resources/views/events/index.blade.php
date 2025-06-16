@extends('layouts.app')

@section('content')
<div class="container">
    <div class="top-section d-flex justify-content-between pt-3 pb-3">
        <h2>Events</h2>
        <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Add New</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Events</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($events as $event)
            <tr>
                <td class="flex justify-between">
                    <a href="{{ route('events.editForm', $event->id) }}"><b>Event - {{ $event->id }}</b></a>
                    <button class="delete-btn" data-id="{{ $event->id }}">
                        <i class="bi bi-trash3-fill text-red-500 mr-2"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')

<script>
document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        if(confirm('Are you sure you want to delete?')) {
            fetch(`/events/delete/${this.dataset.id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    location.reload();
                } else {
                    alert('Delete failed');
                }
            });
        }
    });
});
</script>

@endsection