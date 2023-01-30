<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Traits\HttpResponse;
use Auth;
use App\Http\Resources\TodoResource;
class TodoController extends Controller
{
  use HttpResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try {
          return TodoResource::collection(
          Todo::where('user_id',Auth::user()->id)->get()
          );
      } catch (\Throwable $e) {
        return $this->internalError($e->getMessage());
      }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
         $data = Todo::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description
            ]);
            return new TodoResource($data);
        } catch (\Throwable $e) {
          return $this->internalError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        try {
          
          return $this->notAuthorized($todo) ? $this->notAuthorized($todo) : new TodoResource($todo);
          
        } catch (\Throwable $e) {
          return $this->internalError($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {  
      try {
      if(Auth::user()->id !== $todo->user_id)
      {
        return $this->error('','dont have access to other posts');
      }
         $todo->update($request->all());
         return new TodoResource($todo);
      } catch (\Throwable $e) {
        return $this->internalError($e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        try {
          
        } catch (\Throwable $e) {
          return $this->internalError($e->getMessage());
        }
    }
    
    private function notAuthorized($todo)
    {
      if(Auth::user()->id !== $todo->user_id)
      {
        return $this->error('','dont have access to other posts');
      }
    }
}
