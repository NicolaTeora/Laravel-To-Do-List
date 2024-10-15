@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    <h3>Form Nuovo Task</h3>

    <form action="{{ route('tasks.store') }}" method="get">
        <div class="mb-3">
            <label for="title" class="from-label">Title Task</label>
            <input type="text" class="form-control" id="title" placeholder="Add Title new task">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" placeholder="Add Description Task" rows="3"></textarea>
        </div>
    </form>
@endsection