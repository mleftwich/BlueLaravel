<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos=Todo::all();
        return $todos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Simple validation to prevent empty entries */
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'is_complete' => 'required',
        ]);

        if ($validator->fails())
        {
            return 'All fields required';
        }

        Todo::create([
            'name'=>$request->get('name'),
            'description'=>$request->get('description'),
            'due_date'=>$request->get('due_date')
        ]);
        $todos=Todo::all();
        return $todos;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        return $todo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Todo::find($id)->update([
            'name'=>$request->get('name'),
            'description'=>$request->get('description'),
            'due_date'=>$request->get('due_date'),
            'is_complete'=>$request->get('is_complete')
        ]);
        $todo = Todo::find($id);
        return $todo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::destroy($id);
        $todos = Todo::all();
        return $todos;
    }
}
