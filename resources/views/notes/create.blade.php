@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h2>Crear nueva nota</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('notes.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Título <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="author" class="form-label">Autor <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}" required>
                        @error('author')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="date_time" class="form-label">Fecha y hora <span class="text-danger">*</span></label>
                        <input type="datetime-local" class="form-control @error('date_time') is-invalid @enderror" id="date_time" name="date_time" value="{{ old('date_time', now()->format('Y-m-d\TH:i')) }}" required>
                        @error('date_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="classification" class="form-label">Clasificación <span class="text-danger">*</span></label>
                        <select class="form-select @error('classification') is-invalid @enderror" id="classification" name="classification" required>
                            <option value="" disabled selected>Seleccione una clasificación</option>
                            <option value="Personal" {{ old('classification') == 'Personal' ? 'selected' : '' }}>Personal</option>
                            <option value="Trabajo" {{ old('classification') == 'Trabajo' ? 'selected' : '' }}>Trabajo</option>
                            <option value="Estudio" {{ old('classification') == 'Estudio' ? 'selected' : '' }}>Estudio</option>
                            <option value="Otros" {{ old('classification') == 'Otros' ? 'selected' : '' }}>Otros</option>
                        </select>
                        @error('classification')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="body" class="form-label">Contenido <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="5" required>{{ old('body') }}</textarea>
                        @error('body')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('notes.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Volver
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Guardar Nota
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection