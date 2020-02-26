<?php

use App\Store;
use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amazonUk = new Store();
        $amazonUk->name = "amazon";
        $amazonUk->region = "uk";
        $amazonUk->save();

        $amazonDe = new Store();
        $amazonDe->name = "amazon";
        $amazonDe->region = "de";
        $amazonDe->save();

        $amazonFr = new Store();
        $amazonFr->name = "amazon";
        $amazonFr->region = "fr";
        $amazonFr->save();

        $amazonEs = new Store();
        $amazonEs->name = "amazon";
        $amazonEs->region = "es";
        $amazonEs->save();

        $amazonIt = new Store();
        $amazonIt->name = "amazon";
        $amazonIt->region = "it";
        $amazonIt->save();

        $ebayUk = new Store();
        $ebayUk->name = "ebay";
        $ebayUk->region = "uk";
        $ebayUk->save();
    }
}
