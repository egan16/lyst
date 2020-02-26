<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\ListModel;
use Validator;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        $lists = ListModel::all()->load('items')->load('user');

        return response()->json([
            "status" => "OK",
            "data" => $lists
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'is_public' => 'required|integer',
            'user_id' => 'required|integer|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "error",
                "errors" => $validator->errors()
            ], 422);
        }

        $list = new ListModel();
        $list->name = $request->input('name');
        $list->is_public = $request->input('is_public');
        $list->user_id = $request->input('user_id');
        $list->save();

        return response()->json([
            "status" => "OK",
            "data" => $list
        ]);
    }

    public function show($id)
    {
        $list = ListModel::find($id);

        if ($list !== null) {
            $list->load('items')->load('user');
            $status = "OK";
            $code = 200;
        } else {
            $status = "Not found";
            $code = 404;
        }

        return response()->json([
            "status" => $status,
            "data" => $list
        ], $code);
    }
}
