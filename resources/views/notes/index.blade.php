@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Mis Notas</h2>
                </div>
                <div class="card-body">
                    @if($notes->isEmpty())
                        <div class="alert alert-info">
                            No hay notas disponibles. ¡Crea una nueva nota!
                        </div>
                    @else
                        <div class="row">
                            @foreach($notes as $note)
                                <div class="col-md-4">
                                    <div class="card mb-4 position-relative">
                                        <div class="card-header d-flex justify-content-between">
                                            <h5 class="card-title mb-0">{{ $note->title }}</h5>
                                            <span class="note-classification classification-{{ $note->classification }}">
                                                {{ $note->classification }}
                                            </span>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{{ \Illuminate\Support\Str::limit($note->body, 100) }}</p>
                                            <div class="text-muted small">
                                                <p class="mb-1"><i class="fas fa-user me-1"></i> {{ $note->author }}</p>
                                                <p class="mb-1"><i class="fas fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($note->date_time)->format('d/m/Y H:i') }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-3">
                                                <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i> Editar
                                                </a>
                                                <button type="button" class="btn btn-sm btn-outline-danger delete-note" 
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal" 
                                                        data-note-id="{{ $note->id }}" data-note-title="{{ $note->title }}">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación para eliminar -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar la nota "<span id="noteTitle"></span>"?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Configurar el modal de eliminación
        const deleteModal = document.getElementById('deleteModal');
        if (deleteModal) {
            deleteModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const noteId = button.getAttribute('data-note-id');
                const noteTitle = button.getAttribute('data-note-title');
                
                document.getElementById('noteTitle').textContent = noteTitle;
                document.getElementById('deleteForm').action = `{{ url('notes') }}/${noteId}`;
            });
        }
    });
</script>
@endsection