@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <h3>Form Nuovo Task</h3>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="from-label">Title Task</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $task->title) }}" placeholder="Edit Title task">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Edit description task" rows="3">{{ old('description', $task->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Salva Modifica</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
@endsection