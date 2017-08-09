<?php
namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
   public function getItems()
   {
      $items = Item::orderBy('created_at', 'desc')->get();
      return view('items', ['items' => $items]);
   }

   public function addItem(Request $request)
   {
      $this->validate($request, [
         'item_type' => 'required|max:100',
         'item_name' => 'required|max:100',
         'item_desc' => 'required|max:200',
         'source_price' => 'required|numeric|max:100',
         'selling_price' => 'required|numeric|max:100',
         'shipped_qty' => 'nullable|numeric|max:100',
         'rem_qty' => 'required|numeric|max:100'
      ]);
      $item = new Item();
      $item->item_type = $request['item_type'];
      $item->item_name = $request['item_name'];
      $item->item_desc = $request['item_desc'];
      $item->source_price = $request['source_price'];
      $item->selling_price = $request['selling_price'];
      $item->shipped_qty = $request['shipped_qty'];
      $item->rem_qty = $request['rem_qty'];
      $message = 'There was an error';
      if ($item->save()) {
         $message = 'Successfully added!';
      }
      return redirect()->route('items')->with(['message' => $message]);
   }

   public function deleteItem($item_id)
   {
      $item = Item::find($item_id);
      $message = 'There was an error';
      if($item->delete())
      $message = 'Successfully deleted!';
      return back()->with(['message' => $message]);
   }

   public function editItem(Request $request)
   {
      $this->validate($request, [
         'edit_item_type' => 'required|max:100',
         'edit_item_name' => 'required|max:100',
         'edit_item_desc' => 'required|max:200',
         'edit_source_price' => 'required|max:100',
         'edit_selling_price' => 'required|max:100',
         'edit_shipped_qty' => 'nullable|numeric|max:100',
         'edit_rem_qty' => 'nullable|numeric|max:100'
      ]);
      $item = Item::find($request['edit_item_id']);
      $item->item_type = $request['edit_item_type'];
      $item->item_name = $request['edit_item_name'];
      $item->item_desc = $request['edit_item_desc'];
      $item->source_price = $request['edit_source_price'];
      $item->selling_price = $request['edit_selling_price'];
      $item->shipped_qty = $request['edit_shipped_qty'];
      $item->rem_qty = $request['edit_rem_qty'];
      $item->update();
      return response()->json([['new_item_type' => $item->item_type],['new_item_name' => $item->item_name],['new_item_desc' => $item->item_desc],['new_source_price' => $item->source_price],['new_selling_price' => $item->selling_price],['new_shipped_qty' => $item->shipped_qty],['new_rem_qty' => $item->rem_qty]], 200);
   }
}
