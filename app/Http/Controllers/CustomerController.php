<?php
namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
   public function getCustomers()
   {
      $customers = Customer::orderBy('created_at', 'desc')->get();
      return view('customers', ['customers' => $customers]);
   }

   public function addCustomer(Request $request)
   {
      $this->validate($request, [
         'customer_name' => 'required|max:100',
         'customer_location' => 'required|max:100',
         'customer_address' => 'nullable|max:200',
         'customer_contact' => 'nullable|max:200'
      ]);
      $customer = new Customer();
      $customer->customer_name = $request['customer_name'];
      $customer->customer_location = $request['customer_location'];
      $customer->customer_address = $request['customer_address'];
      $customer->customer_contact = $request['customer_contact'];
      $message = 'There was an error';
      if ($customer->save()) {
         $message = 'Successfully added!';
      }
      return redirect()->route('customers')->with(['message' => $message]);
   }

   public function deleteCustomer($customer_id)
   {
      $customer = Customer::find($customer_id);
      $message = 'There was an error';
      if($customer->delete())
      $message = 'Successfully deleted!';
      return back()->with(['message' => $message]);
   }

   public function editCustomer(Request $request)
   {
      $this->validate($request, [
         'edit_customer_name' => 'required|max:100',
         'edit_customer_location' => 'required|max:100',
         'edit_customer_address' => 'nullable|max:200',
         'edit_customer_contact' => 'nullable|max:200'
      ]);
      $customer = Customer::find($request['edit_customer_id']);
      $customer->customer_name = $request['edit_customer_name'];
      $customer->customer_location = $request['edit_customer_location'];
      $customer->customer_address = $request['edit_customer_address'];
      $customer->customer_contact = $request['edit_customer_contact'];
      $customer->update();
      return response()->json([['new_customer_name' => $customer->customer_name],['new_customer_location' => $customer->customer_location],['new_customer_address' => $customer->customer_address],['new_customer_contact' => $customer->customer_contact]], 200);
   }
}
