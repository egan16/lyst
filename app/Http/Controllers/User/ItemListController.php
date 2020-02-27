<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Store;
use App\ListModel;

class ItemListController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $stores = Store::all();

        return view('user.lists.items.create')->with([
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

      $item->save();

      $item->lists()->attach($list);


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

      return view('user.lists.items.show')->with([
        'item' => $item
      ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($list_id, $id)
     {
         $item = Item::findOrFail($id);
         $item->lists()->detach($list_id);
         return redirect()->route('user.lists.show');
     }
}
