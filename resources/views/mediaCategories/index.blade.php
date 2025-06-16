@extends('layouts.app')

@section('content')
<div class="container">
    <div class="top-section d-flex justify-content-between pt-3 pb-3">
        <h2>Media Categories</h2>
        <a href="{{ route('mediaCategories.create') }}" class="btn btn-primary mb-3">Add New</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Media Categories</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($mediaCategories as $mediaCategory)
            <tr>
                <td class="flex justify-between">
                    <a href="{{ route('mediaCategories.editForm', $mediaCategory->id) }}" class="link-underline-opacity-100"><b>{{ $mediaCategory->name }}</b></a>
                    <button class="delete-btn" data-id="{{ $mediaCategory->id }}">
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
            fetch(`/mediaCategories/delete/${this.dataset.id}`, {
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