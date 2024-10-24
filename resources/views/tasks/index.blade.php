@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')

        {{-- Bottone di creazione nuovo record --}}
        <a class="btn btn-primary" href="{{ route('tasks.create') }}" role="button">Add new Task</a>

        {{-- Messaggio di operazione avvenuta con successo --}}
        @if (session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif
        
        @if (!$tasks->isEmpty())
            
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Complited</th>
                    <th scope="col">Opr</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>
                                <b>{{ $task->title }}</b>
                            </td>
                            <td>{{ $task->description }}</td>
                            <!-- Switch per completare il task -->
                            <td>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input toggle-complete" id="task-{{ $task->id }}"
                                           data-task-id="{{ $task->id }}"
                                           {{ $task->is_completed ? 'checked' : '' }}>
                                    <label class="form-check-label status-text badge text-bg-danger text-wrap" for="task-{{ $task->id }}">
                                        {{ $task->is_completed ? 'Completato' : 'Non Completato' }}
                                    </label>
                                </div>
                            </td>
                            {{-- cella comandi --}}
                            <td>
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-primary mb-1"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning mb-1"><i class="bi bi-vector-pen"></i></a>
                                {{-- cancellazione record --}}
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger mb-1"><i class="bi bi-trash"></i></button>                     
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <h3 class="text-danger">Nessun Task presente!</h3>
        @endif
@endsection