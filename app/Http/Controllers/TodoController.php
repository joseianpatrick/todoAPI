<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\TodoResource;
use App\Http\Requests\TodoRequest;
use App\Todo;



class TodoController extends Controller
{
    //
    public function get(Request $request)
    {
        $todos = Todo::all();

        return TodoResource::collection($todos);
    }

    public function create(TodoRequest $request)
    {
        $todo = Todo::create($request->all());
        return new TodoResource($todo);
    }

    public function update(Request $request,int $id)
    {
        $todo = Todo::find($id);
        $todo->update($request->all());
        return new TodoResource($todo);
    }

    public function massDelete(Request $request)
    {
        $todo = Todo::whereIn('id',$request)->delete();
        return response()->json(['message' => 'Successfully Deleted.']);
    }

}
