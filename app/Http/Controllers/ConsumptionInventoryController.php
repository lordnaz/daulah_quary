<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User as User;
use App\Models\Items;
use App\Models\itemOut;

class ConsumptionInventoryController extends Controller
{
    //
    public function consumptionmain(){
        $username = User::where('role', 'user')->orderBy('name','asc')->get();
        $data = Items::orderBy('item_name', 'asc')->get();
        $user_name = auth()->User()->name;

        $showadmin = itemOut::orderBy('created_at','desc')->paginate(4);
        $totaladmin = itemOut::all();
        $showuser = itemOut::where('name', $user_name,)->orderBy('created_at','desc')->paginate(4);
        $totaluser = itemOut::where('name', $user_name)->get();

       
        return view('consumption')->with('users', $username)->with('item', $data)->with('showadmin', $showadmin)->with('showuser', $showuser)
        ->with('totaladmin', $totaladmin)->with('totaluser', $totaluser)
        ;
    }

    public function userConsumption(Request $req){

        $item = Items::where('item_name', $req->items)->first();
        $user = User::where('name', $req->user)->first();
        $currentdt = date('d-m-Y H:i:s');
        
        $kira =$item->quantity;
        if($req->quantity <= $kira){
        $Quantity = new itemOut;
        $Quantity->quantityout = $req->quantity;
        $Quantity->table_id = $item->table_id;
        $Quantity->item = $req->items;
        $Quantity->user_id = $user->id;
        $Quantity->name = $user->name;
        $Quantity->created_at = $currentdt;
        $Quantity->save();
        $total = $item->quantity - $req->quantity;

        $update = Items::where('item_name', $req->items)->update
        ([
        'quantity' => $total
        ]);

        return redirect()->route('consumption')->with('msgg', 'success');
    }
    else{

        return redirect()->route('consumption')->with('msgg', 'limit');
    }

    }

    public function adminConsumption(Request $req){

        $item = Items::where('item_name', $req->items)->first();
        $user = User::where('name', $req->name)->first();
        $currentdt = date('d-m-Y H:i:s');

        $kira =$item->quantity;
        if($req->quantity <= $kira){
        $Quantity = new itemOut;
        $Quantity->quantityout = $req->quantity;
        $Quantity->table_id = $item->table_id;
        $Quantity->item = $req->items;
        $Quantity->user_id = $user->id;
        $Quantity->name = $user->name;
        $Quantity->created_at = $currentdt;
        $Quantity->save();
        $total = $item->quantity - $req->quantity;

        $update = Items::where('item_name', $req->items)->update
        ([
        'quantity' => $total
        ]);
        return redirect()->route('consumption')->with('msgg', 'success');
    }
    else{

        return redirect()->route('consumption')->with('msgg', 'limit');
    }



    }

    public function userkeluar(Request $req){

        $item = Items::where('item_name', $req->items)->first();
        $user = User::where('name', $req->user)->first();
        $currentdt = date('d-m-Y H:i:s');
        $kira =$item->quantity;
        if($req->quantity <= $kira){
        $Quantity = new itemOut;
        $Quantity->quantityout = $req->quantity;
        $Quantity->table_id = $item->table_id;
        $Quantity->item = $req->items;
        $Quantity->user_id = $user->id;
        $Quantity->name = $user->name;
        $Quantity->created_at = $currentdt;
        $Quantity->save();
        $total = $item->quantity - $req->quantity;

        $update = Items::where('item_name', $req->items)->update
        ([
        'quantity' => $total
        ]);
        return redirect()->route('consumption')->with('msgg', 'success');
    }
    else{

        return redirect()->route('consumption')->with('msgg', 'limit');
    }

    }

    public function return($id){

        
        $out = itemOut::where('itemout_id', $id)->first();
        $in = Items::where('table_id', $out->table_id)->first();
        $calculation = $in->quantity + $out->quantityout;

        $update = Items::where('table_id', $out->table_id)->update
        ([
        'quantity' => $calculation
        ]);
        
        $data = ItemOut::find($id);
        $data->delete();
        return redirect()->route('consumption');
        ;
    }

    
}
