<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Store;
use App\ListModel;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $stores = Store::all();

        return view('user.items.create')->with([
          'listId' => $id,
          'stores' => $stores
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $list_id)
    {
        //VALIDATE FOR PRODUCT
        $request->validate([
          'title' => 'required|max:191',
          'price' => 'required|',
          'item_code' => 'required|',
          'url' => 'required|',
          'store_id' => 'required|',
        ]);

        $list = ListModel::findOrFail($list_id);

        //PRODUCTS FIELDS
        $item = new Item();
        $item->title = $request->input('title');
        $item->item_code = $request->input('item_code');
        $item->price = $request->input('price');
        $item->url = $request->input('url');
        $item->store_id = $request->input('store_id');

        //$product->list_id = $list_id;

        $item->save();

        // $listModel = ListModel::findOrFail($list_id);

        $item->lists()->attach($list);

        // $listModel = new ListModel();
        // $listModel->list_id = $list_id;
        //
        // $listModel->save();



        // $product_list = new Product_list();
        // $product_list->list_id = $list_id;
        //
        // $product_list->save();


        return redirect()->route('user.lists.show', [$list_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);

        return view('user.items.show')->with([
          'item' => $item
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->lists()->detach();
        $item->categories()->detach();
        $item->delete();
        return redirect()->route('user.lists.show');
    }


    // public function destroy($list_id, $id)
    // {
    //     $product = Product::findOrFail($id);
    //     $product->lists()->detach($list_id);
    //     return redirect()->route('user.lists.show');
    // }
}
