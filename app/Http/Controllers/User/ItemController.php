<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Store;
use App\ListModel;
use Auth;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:user');
    }

    public function index()
    {


      $lists = ListModel::where('user_id', Auth::id())->get();

      $items = [];


      //loop through lists
      foreach ($lists as $key => $list) {
        //loop through items in list
        foreach ($list->items as $key => $item) {
          array_push($items, $item);
        }
      }


      return view('user.items.index')->with([
        'items' => $items
      ]);
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
          'price' => 'required|numeric',
          'item_code' => 'required|max:20',
          'url' => 'required|max:400',
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

        return view('user.items.show')->with([
          'item' => $item
        ]);
    }

    public function edit($id)
    {
      $item = Item::findOrFail($id);
      $stores = Store::all();
      return view('user.items.edit')->with([
        'item' => $item,
        'stores' => $stores
      ]);
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
        $item = Item::findOrFail($id);

        $request->validate([
          'title' => 'required|max:191',
          'price' => 'required|numeric',
          'item_code' => 'required|max:20',
          'url' => 'required|max:400',
          'store_id' => 'required|',
        ]);

        $item->title = $request->input('title');
        $item->item_code = $request->input('item_code');
        $item->price = $request->input('price');
        $item->url = $request->input('url');
        $item->store_id = $request->input('store_id');

        $item->save();

        return redirect()->route('user.items.index');
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
        // $item->categories()->detach();
        $item->delete();
        return redirect()->route('user.items.index');
    }


    // public function destroy($list_id, $id)
    // {
    //     $item = Item::findOrFail($id);
    //     $item->lists()->detach($list_id);
    //     return redirect()->route('user.lists.show');
    // }
}
