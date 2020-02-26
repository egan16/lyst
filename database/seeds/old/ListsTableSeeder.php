<?php

use App\ListModel;
use App\User;
use Illuminate\Database\Seeder;

class ListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(2);

        $firstList = new ListModel();
        $firstList->name = "Black Friday";
        $firstList->user_id = $user->id;
        $firstList->save();

        $secondList = new ListModel();
        $secondList->name = "Gifts for her";
        $secondList->user_id = $user->id;
        $secondList->save();

        $thirdList = new ListModel();
        $thirdList->name = "Noah's Birthday";
        $thirdList->user_id = $user->id;
        $thirdList->save();
    }
}
