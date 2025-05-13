@extends('layouts.app')

@section('content')
<h1>Edit Tugas</h1>

<form action="{{ route('tasks.update', $task) }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Judul Tugas</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $task->title) }}" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $task->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="assigned_at" class="form-label">Tanggal & Waktu Penugasan</label>
        <input type="datetime-local" class="form-control @error('assigned_at') is-invalid @enderror" id="assigned_at" name="assigned_at" value="{{ old('assigned_at', $task->assigned_at->format('Y-m-d\TH:i')) }}" required>
        @error('assigned_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
            <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>Dikerjakan</option>
            <option value="done" {{ old('status', $task->status) == 'done' ? 'selected' : '' }}>Selesai</option>
        </select>
        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection