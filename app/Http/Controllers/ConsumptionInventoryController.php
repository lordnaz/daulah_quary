<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User as User;
use App\Models\Items;
use App\Models\itemOut;
use App\Models\History;

class ConsumptionInventoryController extends Controller
{
    //
    public function consumptionmain(){
        $user_id = auth()->User()->id;
        $username = User::where('role', 'user')->orderBy('name','asc')->get();
        $data = Items::orderBy('item_name', 'asc')->get();
        $user_name = auth()->User()->name;

        $showadmin = itemOut::where('type',"Tool and equipment")->orwhere('type', "Consumeable")->orderBy('created_at','desc')->paginate(4);
        $totaladmin = itemOut::all();
        $showuser = itemOut::where('user_id', $user_id,)->orwhere('type', "Consumeable")->where('type', "Tool and equipment")->orderBy('created_at','desc')->paginate(4);
        $totaluser = itemOut::where('name', $user_id)->get();

       
        return view('consumption')->with('users', $username)->with('item', $data)->with('showadmin', $showadmin)->with('showuser', $showuser)
        ->with('totaladmin', $totaladmin)->with('totaluser', $totaluser)
        ;
    }

    public function userConsumption(Request $req){

        $item = Items::where('item_name', $req->items)->first();
        $user = User::where('id', $req->user)->first();
        $currentdt = date('d-m-Y H:i:s');
        
        $kira =$item->quantity;
        if($req->quantity <= $kira){
        $history = new History;
        $history->item_name = $req->items;
        $history->name = $user->name;
        $history->SerialNumber = $item->SerialNum;
        $history->Sub = $item->subtype;
        $history->quantity = $req->quantity;
        $history->user_id = $user->id;
        $history->type = $item->type;
        $history->created_at = $currentdt;
        $history->save();
        if($item->type == "Tool and equipment" || $item->type == "Consumeable" ){
        $Quantity = new itemOut;
        $Quantity->quantityout = $req->quantity;
        $Quantity->table_id = $item->table_id;
        $Quantity->type = $item->type;
        $Quantity->item = $req->items;
        $Quantity->user_id = $user->id;
        $Quantity->name = $user->name;
        $Quantity->created_at = $currentdt;
        $Quantity->save();
        }
        else{}
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
        $user_id = auth()->User()->id;
        $currentdt = date('d-m-Y H:i:s');

        $kira =$item->quantity;
        if($req->quantity <= $kira){
        $history = new History;
        $history->item_name = $req->items;
            $history->name = $user->name;
            $history->SerialNumber = $item->SerialNum;
            $history->Sub = $item->subtype;
            $history->quantity = $req->quantity;
            $history->user_id = $user_id;
            $history->type = $item->type;
        $history->created_at = $currentdt;
        $history->save();
        if($item->type == "Tool and equipment" || $item->type == "Consumeable" ){
        $Quantity = new itemOut;
        $Quantity->quantityout = $req->quantity;
        $Quantity->table_id = $item->table_id;
        $Quantity->item = $req->items;
        $Quantity->type = $item->type;
        $Quantity->user_id = $user_id;
        $Quantity->name = $user->name;
        $Quantity->created_at = $currentdt;
        $Quantity->save();
        }
        else{}
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
        $user_id = auth()->User()->id;
        $user = User::where('name', $req->user)->first();
        $currentdt = date('d-m-Y H:i:s');
        $kira =$item->quantity;
        if($req->quantity <= $kira){
            $history = new History;
            $history->item_name = $req->items;
            $history->name = $user->name;
            $history->SerialNumber = $item->SerialNum;
            $history->Sub = $item->subtype;
            $history->quantity = $req->quantity;
            $history->user_id = $user_id;
            $history->type = $item->type;
            $history->created_at = $currentdt;
            $history->save();
        if($item->type == "Tool and equipment" || $item->type == "Consumeable" ){
        $Quantity = new itemOut;
        $Quantity->quantityout = $req->quantity;
        $Quantity->table_id = $item->table_id;
        $Quantity->item = $req->items;
        $Quantity->type = $item->type;
        $Quantity->user_id = $user_id;
        $Quantity->name = $user->name;
        $Quantity->created_at = $currentdt;
        $Quantity->save();
        }
        else{}
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

    public function History(){

        $user_id = auth()->User()->id;
        $data = History::orderBy('created_at','desc')->paginate(10);
        $total = History::all();
        $userdata = History::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(10);
        $usercount = History::where('user_id', $user_id);

        return view('History')->with('admin', $data)->with('usershow', $userdata)->with('usercount', $usercount)->with('total', $total);

    }
    
}
