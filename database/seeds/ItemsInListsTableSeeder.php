<?php

use App\Item;
use App\ListModel;
use Illuminate\Database\Seeder;

class ItemsInListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // attach first list to first item
        $firstItem = Item::find(1);
        $firstItem->lists()->attach(ListModel::where('id', 1)->first());

        // attach second list to second item
        $secondItem = Item::find(2);
        $secondItem->lists()->attach(ListModel::where('id', 2)->first());

        // attach third list to third item
        $thirdItem = Item::find(3);
        $thirdItem->lists()->attach(ListModel::where('id', 3)->first());
    }
}
