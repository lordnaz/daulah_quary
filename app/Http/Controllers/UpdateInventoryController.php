<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User as User;
use App\Models\Items;

class UpdateInventoryController extends Controller
{
    //update stock

    public function update(){

        $data = Items::orderBy('item_name', 'asc')->get();
        return view ('UpQuantity',['items'=>$data]);
    }

    public function Quantity(Request $req){

        $update = Items::where('item_name', $req->items)
        ->update([
        'quantity' => $req->quantity
        ]);
        
        return redirect()->route('UpQuantity')->with('msgg', 'quantity');

    }


}
