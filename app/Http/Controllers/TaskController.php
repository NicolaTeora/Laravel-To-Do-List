<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // Recupera tutte le risorse
    {
        $tasks = Task::all(); // paginazione Task::paginate(10)

        return view('tasks.index', compact('tasks')); // Ritorna la vista con i tasks
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create'); // Ritorna la vista del form per la creazione
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all(); // Recupero dati

        $validateData = $request->validate([ // Validazione Dati
            'title' => 'required|max:100',
            'description' => 'required',
        ]);

        $task = Task::create($validateData); // Creazione e salvataggio

        return redirect()->route('tasks.index')->with('success', 'Nuovo Task Creato!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id); // Trova la risorsa nel database

        return view('tasks.show', compact('task')); // Ritorna la vista con il task
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id); // Trova la risorsa nel database

        return view('tasks.edit', compact('task')); // Ritorna la vista con il form per modificare
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([ // Validazione Dati
            'title' => 'required|max:100',
            'description' => 'required',
        ]);

        $task = Task::findOrFail($id); // Trova la risorsa da aggiornare

        $task->update($validateData); // Aggiorna i dati del task

        return redirect()->route('tasks.show', $task->id)->with('success', 'Record aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id); // Trova la risorsa da eliminare

        $task->delete(); // Cancella il record

        return redirect()->route('tasks.index')->with('success', 'Task Eliminato!');
    }
}
