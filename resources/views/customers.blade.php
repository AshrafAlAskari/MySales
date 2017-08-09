@extends('layouts.master')
@section('title')
   Customers
@endsection
@section('content')
   <div id="wrapper">
      <div id="page-content-wrapper">
         @include('includes.message-block')
         <section class="row new-post">
            <div class="col-md-8 col-md-offset-2">
               <header><h3>Add new customer</h3></header>
               <form action="{{ route('addCustomer') }}" method="post">
                  <div class="form-group col-md-6 {{ $errors->has('customer_name') ? 'has-error' : '' }}">
                     <input class="form-control" type="text" name="customer_name" id="customer_name" placeholder="Name" />
                  </div>
                  <div class="form-group col-md-6 {{ $errors->has('customer_location') ? 'has-error' : '' }}">
                     <input class="form-control" type="text" name="customer_location" id="customer_location" placeholder="Location" />
                  </div>
                  <div class="form-group col-md-12 {{ $errors->has('customer_address') ? 'has-error' : '' }}">
                     <textarea class="form-control" name="customer_address" id="customer_address" rows="2" placeholder="Customer address"></textarea>
                  </div>
                  <div class="form-group col-md-12 {{ $errors->has('customer_contact') ? 'has-error' : '' }}">
                     <textarea class="form-control" name="customer_contact" id="customer_contact" rows="2" placeholder="Customer contact"></textarea>
                  </div>
                  <center>
                     <button type="submit" class="btn btn-primary">Add customer</button>
                  </center>
                  <input type="hidden" value="{{ Session::token() }}" name="_token">
               </form>
            </div>
         </section>
         <hr />
         <div class="row">
            <table class="table table-hover">
               <tr class="active">
                  <td>ID</td>
                  <td>Name</td>
                  <td>Location</td>
                  <td>Address</td>
                  <td>Contact</td>
                  <td></td>
                  <td></td>
               </tr>
               @foreach ($customers as $customer)
                  <tr class="customers_table_row">
                     <td>{{ $customer->id }}</td>
                     <td>{{ $customer->customer_name }}</td>
                     <td>{{ $customer->customer_location }}</td>
                     <td>{{ $customer->customer_address }}</td>
                     <td>{{ $customer->customer_contact }}</td>
                     <td><a href="#" class="edit">Edit</a></td>
                     <td><a href="{{ route('deleteCustomer',['customer_id' => $customer->id]) }}">Delete</a></td>
                  </tr>
               @endforeach
            </table>
         </div>
      </div>

      <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Customer</h4>
               </div>
               <div class="modal-body">
                  <form>
                     <input type="hidden" id="edit_1"/>
                     <div class="form-group col-md-6 {{ $errors->has('edit_customer_name') ? 'has-error' : '' }}">
                        <label for="edit_customer_name">Name</label>
                        <input class="form-control" type="text" name="edit_customer_name" id="edit_3" placeholder="Name" />
                     </div>
                     <div class="form-group col-md-6 {{ $errors->has('edit_customer_location') ? 'has-error' : '' }}">
                        <label for="edit_customer_location">Location</label>
                        <input class="form-control" type="text" name="edit_customer_location" id="edit_5" placeholder="Location" />
                     </div>
                     <div class="form-group col-md-12 {{ $errors->has('edit_customer_address') ? 'has-error' : '' }}">
                        <label for="edit_customer_address">Address</label>
                        <textarea class="form-control" name="edit_customer_address" id="edit_7" rows="2" placeholder="Address"></textarea>
                     </div>
                     <div class="form-group col-md-12 {{ $errors->has('edit_customer_contact') ? 'has-error' : '' }}">
                        <label for="edit_customer_address">Address</label>
                        <textarea class="form-control" name="edit_customer_contact" id="edit_9" rows="2" placeholder="Contact"></textarea>
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="customers-modal-save">Save changes</button>
               </div>
            </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <script>
      var urlEdit = '{{ route('editCustomer') }}';
      </script>
   </div>
@endsection

@section('js')
   <script src="{{ URL::to('js/customer.js') }}"></script>
@endsection
