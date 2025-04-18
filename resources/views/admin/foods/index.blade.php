@extends('components.app')

@section('title', 'Food List')
@section('content')
<div class="container mt-4">

    @if(session('success'))

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success shadow">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="successModalLabel">✅ Berhasil</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body text-center">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-danger">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus <strong id="foodName"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-4 text-success fw-bold">Master Food</h1>
            <p class="lead text-muted">Kelola data makanan</p>
        </div>
    </div>
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h4 class="mb-0">
                <i class="fas fa-utensils me-2 text-primary"></i>Food Management
            </h4>
            <a href="{{ route('admin.foods.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Add Food
            </a>
        </div>

        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3 px-4" width="8%">ID</th>
                            <th class="py-3 px-4">Food Name</th>
                            <th class="py-3 px-4">Category</th>
                            <th class="py-3 px-4 text-end" width="15%">Price</th>
                            <th class="py-3 px-4 text-center" width="20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($foods as $food)
                        <tr>
                            <td class="px-4">{{ $food->id }}</td>
                            <td class="px-4">
                                <div class="d-flex align-items-center">
                                    @if($food->image)
                                    <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}"
                                        class="rounded me-3" width="40" height="40">
                                    @else
                                    <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center"
                                        style="width:40px;height:40px;">
                                        <i class="fas fa-utensils text-muted"></i>
                                    </div>
                                    @endif
                                    <span>{{ $food->name }}</span>
                                </div>
                            </td>
                            <td class="px-4">
                                <span class="badge bg-primary bg-opacity-10 text-primary py-2 px-3">
                                    {{ $food->category->name }}
                                </span>
                            </td>
                            <td class="px-4 text-end fw-semibold">
                                ${{ number_format($food->price, 2) }}
                            </td>
                            <td class="px-4 text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.foods.edit', $food->id) }}"
                                        class="btn btn-sm btn-outline-primary rounded-3 px-3"
                                        title="Edit">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.foods.destroy', $food->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="btn btn-sm btn-outline-danger rounded-3 px-3 btn-delete"
                                            data-id="{{ $food->id }}"
                                            data-name="{{ $food->name }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal">
                                            <i class="fas fa-trash-alt me-1"></i> Delete
                                        </button>

                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fas fa-info-circle fa-2x mb-3"></i>
                                <h5>No food items found</h5>
                                <p class="mb-0">Add your first food item using the button above</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($foods->hasPages())
            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination">

                        @if ($foods->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">&laquo;</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $foods->previousPageUrl() }}" rel="prev">&laquo;</a>
                        </li>
                        @endif

                        @foreach ($foods->links()->elements[0] as $page => $url)
                        <li class="page-item {{ $page == $foods->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @endforeach

                        @if ($foods->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $foods->nextPageUrl() }}" rel="next">&raquo;</a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <span class="page-link">&raquo;</span>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('scripts')
@if(session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = new bootstrap.Modal(document.getElementById('successModal'));
        modal.show();
    });
</script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        const foodNameSpan = document.getElementById('foodName');
        const deleteForm = document.getElementById('deleteForm');

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const foodId = button.getAttribute('data-id');
                const foodName = button.getAttribute('data-name');

                foodNameSpan.textContent = foodName;

                deleteForm.action = `/admin/foods/${foodId}`;
            });
        });
    });
</script>
@endsection