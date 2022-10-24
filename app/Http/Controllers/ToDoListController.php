<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoList\CreateToDoListRequest;
use App\Http\Requests\ToDoList\UpdateToDoListRequest;
use App\Models\ToDolist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    public function __construct() {
//        $this->middleware('auth');
    }

    public function index(): JsonResponse
    {
        $ToDoList = ToDolist::all();
        $completed = ToDolist::where("status",1)->count();
        $Remaining = ToDolist::where("status",0)->count();
        return response()->json(["massage"=>"data Retrieved successfully ","data"=>$ToDoList,"completed"=>$completed,"Remaining"=>$Remaining],200);
    }


    public function store(CreateToDoListRequest $request)
    {
        $data = $request->validated();

        $ToDoList = ToDolist::create($data);

        return response()->json(["massage"=>"data Retrieved successfully ","data"=>$ToDoList],200);
    }

    public function show( $id)
    {
        $ToDoList = ToDolist::find($id);

        return response()->json(["massage"=>"data Retrieved successfully ","data"=>$ToDoList],200);
    }

    public function update(UpdateToDoListRequest $request, $id)
    {
        $data = $request->validated();

        $ToDoList = ToDolist::find($id);
        $ToDoList->update($data);

        return response()->json(["massage"=>"data Retrieved successfully ","data"=>$ToDoList],200);
    }

    public function destroy($id)
    {
        try {
            $ToDoList = ToDolist::find($id);

            if (!$ToDoList){
                return  response()->json(["massage"=>"no element "],403);
            }
            $ToDoList->delete();

            return response()->json(["massage"=>"data Retrieved successfully "],200);
        }catch (\Exception $exception){
            return  response()->json(["massage"=>$exception->getMessage()],401);
        }
    }
}
