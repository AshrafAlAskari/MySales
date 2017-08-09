<script>
var items = {!! json_encode($items); !!};
</script>
@extends('layouts.master')
@section('title')
   Add New Sale
@endsection
@section('content')
   <div id="wrapper">
      <div id="page-content-wrapper">
         @include('includes.message-block')
         <section class="row new-post">
            <div class="col-md-10 col-md-offset-1">
               <header><h3>Add new sale</h3></header>
               <h4>for <b>{{ $customer_name }}</b></h4>
               <form action="{{ route('addSalePost',['sale_note_id' => $sale_note_id]) }}" method="post">
                  <br />
                  <h4>Add items</h4>
                  <div class="row">
                     <table class="table table-hover">
                        <tr class="active">
                           <td width="20%">Type</td>
                           <td>Name</td>
                           <td width="10%">Quantity</td>
                           <td width="10%">Price $</td>
                           <td width="15%">Total Price $</td>
                           <td></td>
                        </tr>
                        @foreach ($sales as $sale)
                           <tr class="add_sales_table_row">
                              <td>
                                 {{ $sale->item_type }}
                              </td>
                              <td>
                                 {{ $sale->item_name }}
                              </td>
                              <td>
                                 {{ $sale->qty }}
                              </td>
                              <td>
                                 {{ $sale->price }}
                              </td>
                              <td>
                                 {{ $sale->total_price }}
                              </td>
                              <td>
                                 <a href="{{ route('deleteSale',['sale_id' => $sale->id]) }}">Delete</a>
                              </td>
                           </tr>
                        @endforeach

                        <tr class="add_sales_table_row">
                           <td>
                              <div class="form-group {{ $errors->has('item_type') ? 'has-error' : '' }}">
                                 <select class="form-control" name='item_type' id="item_type_sale">
                                    <option selected disabled hidden>Choose Item Type</option>
                                    @foreach ($items_type as $item_type)
                                       <option value="{{ $item_type->item_type }}">{{ $item_type->item_type }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </td>
                           <td>
                              <div class="form-group {{ $errors->has('item_id') ? 'has-error' : '' }}">
                                 <select class="form-control" name="item_id" id="item_name_sale">
                                    <option selected disabled hidden>Choose Item Name</option>
                                 </select>
                              </div>
                           </td>
                           <td>
                              <div class="form-group{{ $errors->has('qty') ? 'has-error' : '' }}">
                                 <input class="form-control" type="text" name="qty" id="qty" />
                              </div>
                           </td>
                           <td>
                              <div class="form-group{{ $errors->has('selling_price') ? 'has-error' : '' }}">
                                 <input class="form-control" type="text" name="selling_price" id="selling_price" />
                              </div>
                           </td>
                           <td>
                              <div class="form-group{{ $errors->has('total_price') ? 'has-error' : '' }}">
                                 <input class="form-control" type="text" name="total_price" id="total_price" />
                              </div>
                           </td>
                           <td>
                              <button type="submit" class="btn btn-primary">Add item</button>
                           </td>
                        </tr>
                     </table>
                  </div>
                  <input type="hidden" value="{{ Session::token() }}" name="_token">
               </form>
               <center>
                  <a href="{{ route('printSale', ['sale_note_id' => $sale_note_id]) }}"><button class="btn btn-primary">Print</button></a>
               </center>
            </div>
         </section>
      </div>
   @endsection

   @section('js')
      <script src="{{ URL::to('js/sale.js') }}"></script>
   @endsection
