<?php

use App\Item;
use App\Store;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amazonUk = Store::where('name', 'amazon')->where('region', 'UK')->first();
        $amazonDe = Store::where('name', 'amazon')->where('region', 'DE')->first();
        $amazonFr = Store::where('name', 'amazon')->where('region', 'FR')->first();
        $amazonEs = Store::where('name', 'amazon')->where('region', 'ES')->first();
        $amazonIt = Store::where('name', 'amazon')->where('region', 'IT')->first();

        // amazon uk
        $firstItem = new Item();
        $firstItem->title = "Quick Charge 3.0 Car Charger, RAVPower 40W 3A Dual Car Adapter Fast Charger for iPhone XS/XR/XS Max/8/8 Plus, Galaxy S8 S7 Note8 and More Smartphones - Black";
        $firstItem->image = "https://images-na.ssl-images-amazon.com/images/I/61SdZYehCjL._AC_SX679_.jpg";
        $firstItem->price = 8.06;
        $firstItem->item_code = "B076H1Z3SH";
        $firstItem->url = "https://www.amazon.co.uk/Charge-Charger-RAVPower-Adapter-Smartphones-Black/dp/B076H1Z3SH?ref_=Oct_DLandingS_D_b13d4c31_63&smid=A296JJ7EW4ORVE";
        $firstItem->store_id = $amazonUk->id;
        $firstItem->save();

        // amazon de
        $secondItem = new Item();
        $secondItem->title = "Razer Kraken Gaming Headset 2019: Lightweight Aluminum Frame - Retractable Noise Cancelling Mic - for PC, Xbox, PS4, Nintendo Switch - Blue/Black";
        $secondItem->image = "https://images-na.ssl-images-amazon.com/images/I/71wTWDFWWXL._AC_SX679_.jpg";
        $secondItem->price = 55.92;
        $secondItem->item_code = "B07QNZC9V5";
        $secondItem->url = "https://www.amazon.de/Razer-Kraken-Gaming-Headset-2019/dp/B07QNZC9V5?ref_=Oct_DLandingS_D_8b5bd748_62&smid=A3OJWAJQNSBARP";
        $secondItem->store_id = $amazonDe->id;
        $secondItem->save();

        // amazon fr
        $thirdItem = new Item();
        $thirdItem->title = "Casio Montre Femme Digitale – LA670WGA-1DF";
        $thirdItem->image = "https://images-na.ssl-images-amazon.com/images/I/61AmKThyUrL._UX679_.jpg";
        $thirdItem->price = 43.77;
        $thirdItem->item_code = "B003BJFQW4";
        $thirdItem->url = "https://www.amazon.fr/Casio-Montre-Femme-Digitale-LA670WGA-1DF/dp/B003BJFQW4?pf_rd_p=45a848a4-62b6-47d9-aa2c-847ff06de33c&pd_rd_wg=tsPjv&pf_rd_r=PP23D60P3ANJKS8R3FKR&ref_=pd_gw_cr_simh&pd_rd_w=8Lrx6&pd_rd_r=524f6a17-c567-4b7b-b43b-e38a3ca168d3";
        $thirdItem->store_id = $amazonFr->id;
        $thirdItem->save();

        // amazon es
        $fourthItem = new Item();
        $fourthItem->title = "Auriculares Bluetooth con Micrófonos, HOMSCAM Impermeable Auriculares Inalámbricos Bluetooth 5.0 QCY HiFi Mini Twins Estéreo In-Ear Bluetooth con Caja de Carga Portátil para iPhone y Android";
        $fourthItem->image = "https://images-na.ssl-images-amazon.com/images/I/5102kV36-qL._SX569_.jpg";
        $fourthItem->price = 22.66;
        $fourthItem->item_code = "B07Q79C2D8";
        $fourthItem->url = "https://www.amazon.es/Auriculares-Micr%C3%B3fonos-HOMSCAM-Impermeable-Inal%C3%A1mbricos/dp/B07Q79C2D8";
        $fourthItem->store_id = $amazonEs->id;
        $fourthItem->save();

        // amazon it
        $fifthItem = new Item();
        $fifthItem->title = "Shure MV5 Microfono Digitale a Condensatore, USB e Cavo Lightning, Grigio";
        $fifthItem->image = "https://images-na.ssl-images-amazon.com/images/I/81cgz%2BaLU-L._AC_SY879_.jpg";
        $fifthItem->price = 119.00;
        $fifthItem->item_code = "B010W6W9EQ";
        $fifthItem->url = "https://www.amazon.it/Shure-MV5-Microfono-Condensatore-Lightning/dp/B010W6W9EQ?pf_rd_p=d5cee89e-fde5-4ef8-99bd-ef5024df8a9a&pd_rd_wg=C0iBE&pf_rd_r=TNB73DG0T8VM534QC508&ref_=pd_gw_unk&pd_rd_w=J4VD1&pd_rd_r=66d2a1a9-0b04-43af-880d-6bd3a05292e6";
        $fifthItem->store_id = $amazonIt->id;
        $fifthItem->save();
    }
}
