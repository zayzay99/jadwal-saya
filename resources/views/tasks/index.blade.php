@extends('layouts.app')

@section('content')
<h1 class="mb-4">Daftar Tugas</h1>

@if($tasks->isEmpty())
    <p>Tidak ada tugas.</p>
@else
<table class="table table-striped">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal & Waktu Penugasan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ \Illuminate\Support\Str::limit($task->description, 50) }}</td>
            {{-- <td>{{ $task->assigned_at->format('d-m-Y H:i') }}</td> --}}
            {{ Carbon\Carbon::parse($task->expired_at)->format('Y-m-d') }}
            <td>
                @if($task->status == 'pending')
                    <span class="badge bg-secondary">Pending</span>
                @elseif($task->status == 'in_progress')
                    <span class="badge bg-warning text-dark">Dikerjakan</span>
                @else
                    <span class="badge bg-success">Selesai</span>
                @endif
            </td>
            <td>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus tugas ini?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection