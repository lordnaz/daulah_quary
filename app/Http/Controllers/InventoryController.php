<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User as User;
use App\Models\Items;

class InventoryController extends Controller
{
    //display data dekat table
    public function insert(){

        $data = Items::orderBy('item_name', 'asc')->get();
        return view('insert-parts',['items'=>$data]
        );
    }

    //untuk create item baru
    public function addItems(Request $req){

        $data = $req->input();

        $user_id = auth()->User()->name;

        
        
        $currentdt = date('d-m-Y H:i:s');
        $exists = Items::where('item_name', $req->items)->exists();
        if(!$exists){
        // add data
        $additem = new Items;
        $value = $req->items;
        $upper = strtoupper($value);
        $additem->item_name = $upper;
        $additem->quantity = '0';
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
        
        $data = Items::where('table_id',$req->id)->get();
        $currentdt = date('d-m-Y H:i:s');

        $exists = Items::where('item_name', $req->items)->exists();
        if(!$exists){
            // save
        $upper = strtoupper($req->items);
        $update = Items::where('table_id', $req->id)
        ->update([
        'item_name' => $upper
        ]);
        
        return redirect()->route('insert-parts')->with('msgg', 'save');
                    }
    
        else{
            
             return redirect()->route('insert-parts')->with('msgg', 'exist');
            }
            
   }

   //delete data
   public function DeleteItem($id){

       $data = Items::find($id);
       $data->delete();
       return redirect()->route('insert-parts')->with('msgg', 'delete');

   }

}
