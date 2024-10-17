@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')
    <div class="container">
        
        <a class="btn btn-primary" href="{{ route('tasks.create') }}" role="button">Add new Task</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if (!$tasks->isEmpty())
            
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Complited</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <th scope="row">{{ $task->id }}</th>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->is_completed }}</td>
                            {{-- cella comandi --}}
                            <td>
                                <a href="#">Dettagli</a>
                                <a href="#">Modifica</a>
                                <a href="#">X</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <h3 class="text-danger">Nessun Task presente!</h3>
        @endif
    </div>
@endsection