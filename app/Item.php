<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function lists()
    {
        return $this->belongsToMany('App\ListModel', 'items_in_lists', 'item_id', 'list_id');
    }
}
