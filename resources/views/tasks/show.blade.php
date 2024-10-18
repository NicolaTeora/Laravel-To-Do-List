@extends('layouts.app')

@section('title', 'Dettaglio')

@section('content')
{{-- Messaggio di operazione avvenuta con successo --}}
@if (session('success'))
<div class="alert alert-success mt-2">
    {{ session('success') }}
</div>
@endif

<h3>Task {{ $task->id }}</h3>
<ul>
    <li>{{ $task->title }}</li>
    <li>{{ $task->description }}</li>
</ul>

<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Modifica</a>
    
@endsection