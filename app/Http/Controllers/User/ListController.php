<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ListModel;
use Auth;
use App\Product;

class ListController extends Controller
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
        $listModels = ListModel::where('user_id', Auth::id())->get();


        return view('user.lists.index')->with([
          'listModels' => $listModels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.lists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
          'name' => 'required|max:191',
          'is_public' => 'required|boolean',
        ]);

        $listModel = new ListModel();
        $listModel->name = $request->input('name');
        $listModel->is_public = $request->input('is_public');
        $listModel->user_id = Auth::id();

        $listModel->save();

        return redirect()->route('user.lists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $list = ListModel::findOrFail($id);

      // dd($list->items);

      // dd($list);

      return view('user.lists.show')->with([
        'list' => $list
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
      $listModel = ListModel::findOrFail($id);
      return view('user.lists.edit')->with([
        'listModel' => $listModel
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
        $listModel = ListModel::findOrFail($id);

        $request->validate([
          'name' => 'required|max:191',
          'is_public' => 'required',
        ]);

        $listModel->name = $request->input('name');
        $listModel->is_public = $request->input('is_public');
        $listModel->user_id = Auth::id();

        $listModel->save();

        return redirect()->route('user.lists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listModel = ListModel::findOrFail($id);
        $listModel->items()->detach();
        $listModel->delete();
        return redirect()->route('user.lists.index');
    }
}
