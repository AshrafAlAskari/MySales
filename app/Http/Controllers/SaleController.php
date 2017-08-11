<?php
namespace App\Http\Controllers;

use App\SaleNote;
use App\Sale;
use App\Customer;
use App\Item;
use Illuminate\Http\Request;
use Validator;

class SaleController extends Controller
{
   public function getSaleNotes()
   {
      $saleNotes = SaleNote::orderBy('created_at', 'desc')->get();
      $customers = Customer::orderBy('created_at', 'desc')->get();
      return view('saleNotes', compact('saleNotes', 'customers'));
   }

   public function addSaleNote(Request $request)
   {
      $validator = Validator::make($request->all(),[
         'customer_id' => 'required',
         'sale_date' => 'required|date_format:Y-m-d|max:50'
      ]);
      if($validator->fails())
      return back()->WithErrors($validator->errors()->all())->withInput();

      $saleNote = new SaleNote;
      $saleNote->customer_id = $request->customer_id;
      $saleNote->customer_name = Customer::find($request->customer_id)->customer_name;
      $saleNote->date = $request->sale_date;
      $message = 'There was an error';
      if ($saleNote->save()) {
         $message = 'Sale Note added successfully!';
      }
      return redirect()->route('saleNotes')->with(['message' => $message]);
   }

   public function deleteSaleNote($sale_note_id)
   {
      $saleNote = SaleNote::find($sale_note_id);
      $message = 'There was an error';
      if(Sale::where('sale_note_id', $sale_note_id)->get()->isEmpty()) {
         if($saleNote->delete())
         $message = 'Successfully deleted!';
      }
      else {
         $message = 'Sale Note is not empty, Cannot be deleted!';
      }
      return back()->with(['message' => $message]);
   }

   public function addSaleGet($sale_note_id)
   {
      $sales = Sale::where('sale_note_id', $sale_note_id)->get();
      $customer_name = SaleNote::find($sale_note_id)->customer_name;
      $items_type = Item::select('item_type')->distinct()->get();
      $items = Item::orderBy('created_at', 'desc')->select('id', 'item_type', 'item_name', 'selling_price')->get();
      return view('addSaleGet', compact('sales', 'sale_note_id', 'customer_name', 'items_type', 'items'));

   }

   public function addSalePost(Request $request)
   {
      $sale_note_id = $request->sale_note_id;
      $validator = Validator::make($request->all(),[
         'item_type' => 'required',
         'item_id' => 'required',
         'qty' => 'required|max:20',
         'selling_price' => 'required|max:20',
         'total_price' => 'required|max:20'
      ]);
      if($validator->fails())
      return back()->WithErrors($validator->errors()->all())->withInput();

      $sale = new Sale;
      $sale->sale_note_id = $sale_note_id;
      $sale->item_id = $request->item_id;
      $sale->qty = $request->qty;
      $sale->price = $request->selling_price;
      $sale->total_price = $request->total_price;
      $item = Item::find($request->item_id);
      $sale->item_type = $item->item_type;
      $sale->item_name = $item->item_name;
      $message = 'There was an error';
      if ((($item->rem_qty)-($request->qty)) > 0) {
         $item->rem_qty -= $request->qty;
         if($sale->save() && $item->update())
         $message = 'Item added successfully!';
      } else {
         $message = 'Quantity Exceeded';
      }
      return redirect()->route('addSaleGet', ['sale_note_id' => $sale_note_id])->with(['message' => $message]);
   }

   public function deleteSale($sale_id)
   {
      $sale = Sale::find($sale_id);
      $item = Item::find($sale->item_id);
      $item->rem_qty += $sale->qty;
      $message = 'There was an error';
      if($sale->delete() && $item->update())
      $message = 'Successfully deleted!';
      return back()->with(['message' => $message]);
   }

   public function printSale($sale_note_id)
   {
      $customer_name = SaleNote::find($sale_note_id)->customer_name;
      $sales = Sale::where('sale_note_id', $sale_note_id)->get();
      return view('printSale', compact('customer_name', 'sales'));
   }
}
