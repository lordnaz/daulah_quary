<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User as User;
use App\Models\Items;


class InventoryController extends Controller
{
    //display data dekat table
    public function insert(){

        $data = Items::orderBy('type','asc')->paginate(8);
        $total = Items::all();
        
        return view('insert-parts')->with('items', $data)->with('totals', $total)
        ;
    }

     //display data dekat table category plant sparepart
     public function PlantSpare(){

        $data = Items::Where('type', "Plant sparepart")->orderBy('item_name', 'asc')->paginate(8);
        $total = Items::Where('type', "Plant sparepart")->get();
        
        return view('PlantSpare')->with('items', $data)->with('totals', $total)
        ;
    }

       //display data dekat table category machinery sparepart
       public function Machinery(){

        $data = Items::Where('type', "Machinery sparepart")->orderBy('item_name', 'asc')->paginate(8);
        $total = Items::Where('type', "Machinery sparepart")->get();
        
        return view('machinery')->with('items', $data)->with('totals', $total)
        ;
    }

       //display data dekat table category tool and equipment
       public function Tool(){

        $data = Items::Where('type', "Tool and equipment")->orderBy('item_name', 'asc')->paginate(8);
        $total = Items::Where('type', "Tool and equipment")->get();
        
        return view('Tool')->with('items', $data)->with('totals', $total)
        ;
    }

       //display data dekat table category Consumeable
       public function Consumeable(){

        $data = Items::Where('type', "Consumeable")->orderBy('item_name', 'asc')->paginate(8);
        $total = Items::Where('type', "Consumeable")->get();
        
        return view('Consumeable')->with('items', $data)->with('totals', $total)
        ;
    }


    //untuk create item baru
    public function addItems(Request $req){

       
        $data = $req->input();    
        $user_id = auth()->User()->name;
        $image = "N/A";
        $serial = $req->number;
        
        
        $currentdt = date('d-m-Y H:i:s');
        $exists = Items::where('item_name', $req->items)->exists();
        if(!$exists){
        // add data
        if($req->hasFile('img')){
            $name = $req->file('img')->getClientOriginalName();
            $image = uniqid('').$name;
        $req->file('img')->storeAs('public/image/', $image);
        }
        $additem = new Items;
        $value = $req->items;
        $upper = strtoupper($value);
        $additem->item_name = $upper;
        $additem->quantity = '0';
        $additem->image = $image;
        $additem->SerialNum = $serial;
        $additem->type = $req->type;
        $additem->subtype = $req->subtype;
        $additem->created_by = $user_id;
        $additem->save();
        return redirect()->route('insert-parts')->with('msgg', 'success');
        }

        else{
            return redirect()->route('insert-parts')->with('msgg', 'exist');
        }
        

    }

    //display data dekat edit item
    public function EditItem($id){

        
        $calculate = Items::find($id);
        
        return view('edit-parts')->with('items', $calculate)
        ;
    }

    //edit save change item
    public function saveItems(Request $req){
        
        $data = Items::where('table_id',$req->id)->first();
        $currentdt = date('d-m-Y H:i:s');
        

        $exists = Items::where('item_name', $req->items)->exists();
        if(!$exists || $data->subtype != $req->subtype || $data->SerialNum != $req->number || $req->hasFile('image') ){
            if($req->hasFile('image')){

                $name = $req->file('image')->getClientOriginalName();
                $image = uniqid('').$name;
                $req->file('image')->storeAs('public/image/', $image);
            $path = public_path().'/storage/image/'.$data->image;
                unlink($path);
            // save
            $upper = strtoupper($req->items);
            $update = Items::where('table_id', $req->id)
                ->update([
                    'item_name' => $upper,
                    'SerialNum' => $req->number,
                    'subtype' => $req->subtype,
                    'image' => $image
                ]);
            }
            else{
            $upper = strtoupper($req->items);
            $update = Items::where('table_id', $req->id)
                ->update([
                    'item_name' => $upper,
                    'SerialNum' => $req->number,
                    'subtype' => $req->subtype,
                    
                ]);

            }
            
        
        return redirect()->route('insert-parts')->with('msgg', 'save');
                    }
    
        else{
            
             return redirect()->route('insert-parts')->with('msgg', 'exist');
            }
            
   }

   //delete data
   public function DeleteItem($id){

       
       $data = Items::find($id);
       if($data->image != "N/A"){
       $path = public_path().'/storage/image/'.$data->image;
       unlink($path);
       }
       $data->delete();
       return redirect()->route('insert-parts')->with('msgg', 'delete');

   }

   //Plus quantity

   public function Plus($id){

    $data = Items::find($id);
    $total = $data->quantity + 1;

    $update = Items::where('table_id', $data->table_id)->update
    ([
    'quantity' => $total
    ]);

    return redirect()->route('insert-parts')->with('msgg', 'plus');

}

//Minus quantity

public function Minus($id){

    $data = Items::find($id);
    $total = $data->quantity - 1;

    $update = Items::where('table_id', $data->table_id)->update
    ([
    'quantity' => $total
    ]);
    return redirect()->route('insert-parts')->with('msgg', 'minus');

}

 //Plus1 quantity

 public function Plus1($id){

    $data = Items::find($id);
    $total = $data->quantity + 1;

    $update = Items::where('table_id', $data->table_id)->update
    ([
    'quantity' => $total
    ]);

    return redirect()->route('PlantSpare')->with('msgg', 'plus');

}

//Minus1 quantity

public function Minus1($id){

    $data = Items::find($id);
    $total = $data->quantity - 1;

    $update = Items::where('table_id', $data->table_id)->update
    ([
    'quantity' => $total
    ]);
    return redirect()->route('PlantSpare')->with('msgg', 'minus');

}

//Plus2 quantity

public function Plus2($id){

    $data = Items::find($id);
    $total = $data->quantity + 1;

    $update = Items::where('table_id', $data->table_id)->update
    ([
    'quantity' => $total
    ]);

    return redirect()->route('machinery')->with('msgg', 'plus');

}

//Minus2 quantity

public function Minus2($id){

    $data = Items::find($id);
    $total = $data->quantity - 1;

    $update = Items::where('table_id', $data->table_id)->update
    ([
    'quantity' => $total
    ]);
    return redirect()->route('machinery')->with('msgg', 'minus');

}

//Plus3 quantity

public function Plus3($id){

    $data = Items::find($id);
    $total = $data->quantity + 1;

    $update = Items::where('table_id', $data->table_id)->update
    ([
    'quantity' => $total
    ]);

    return redirect()->route('Tool')->with('msgg', 'plus');

}

//Minus3 quantity

public function Minus3($id){

    $data = Items::find($id);
    $total = $data->quantity - 1;

    $update = Items::where('table_id', $data->table_id)->update
    ([
    'quantity' => $total
    ]);
    return redirect()->route('Tool')->with('msgg', 'minus');

}

//Plus4 quantity

public function Plus4($id){

    $data = Items::find($id);
    $total = $data->quantity + 1;

    $update = Items::where('table_id', $data->table_id)->update
    ([
    'quantity' => $total
    ]);

    return redirect()->route('Consumeable')->with('msgg', 'plus');

}

//Minus4 quantity

public function Minus4($id){

    $data = Items::find($id);
    $total = $data->quantity - 1;

    $update = Items::where('table_id', $data->table_id)->update
    ([
    'quantity' => $total
    ]);
    return redirect()->route('Consumeable')->with('msgg', 'minus');

}

}

//image



