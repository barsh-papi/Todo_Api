<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoretodoRequest;
use App\Http\Requests\UpdatetodoRequest;
use App\Models\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('todo');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'date'=>'required',
            'status'=>'required',
        ]);
        $todo = todo::create([
            'title'=> $validated['title'],
            'description'=> $validated['description'],
            'date'=> $validated['date'],
            'status'=> $validated['status'],
            
        ]);
        $token = $todo->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'todo' => $todo,
            
        ],status: 200);

        // Auth::attempt($request->only('email', 'password'));
        // // auth()->attempt($request->only('email', 'password'));
        // dd(auth()->user());
    }

    /**
     * Display the specified resource.
     */
    public function show(todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetodoRequest $request, todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(todo $todo)
    {
        //
    }
}
