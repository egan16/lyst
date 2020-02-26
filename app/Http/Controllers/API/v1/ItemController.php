<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Item;
use Validator;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all()->load('lists')->load('store');

        return response()->json([
            "status" => "OK",
            "data" => $items
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'image' => 'required|string',
            'item_code' => 'required|string',
            'price' => 'nullable|numeric',
            'url' => 'required|string',
            'store_id' => 'required|integer|exists:stores,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "error",
                "errors" => $validator->errors()
            ], 422);
        }

        $item = new Item();
        $item->title = $request->input('title');
        $item->image = $request->input('image');
        $item->item_code = $request->input('item_code');
        $item->price = $request->input('price');
        $item->url = $request->input('url');
        $item->store_id = $request->input('store_id');
        $item->save();

        return response()->json([
            "status" => "OK",
            "data" => $item
        ]);
    }

    public function show($id)
    {
        $item = Item::find($id);

        if ($item !== null) {
            $item->load('lists')->load('store');
            $status = "OK";
            $code = 200;
        } else {
            $status = "Not found";
            $code = 404;
        }

        return response()->json([
            "status" => $status,
            "data" => $item
        ], $code);
    }
}
