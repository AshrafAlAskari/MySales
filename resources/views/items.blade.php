@extends('layouts.master')
@section('title')
   Items
@endsection
@section('content')
   @include('includes.message-block')
   <section class="row new-post">
      <div class="col-md-8 col-md-offset-2">
         <header><h3>Add new item</h3></header>
         <form action="{{ route('addItem') }}" method="post">
            {{csrf_field()}}
            <div class="form-group col-md-6 {{ $errors->has('item_type') ? 'has-error' : '' }}">
               <input class="form-control" type="text" name="item_type" id="item_type" placeholder="Type" value="{{old('item_type')}}" />
            </div>
            <div class="form-group col-md-6 {{ $errors->has('item_name') ? 'has-error' : '' }}">
               <input class="form-control" type="text" name="item_name" id="item_name" placeholder="Name" value="{{old('item_name')}}" />
            </div>
            <div class="form-group col-md-12 {{ $errors->has('item_desc') ? 'has-error' : '' }}">
               <textarea class="form-control" name="item_desc" id="item_desc" rows="2" placeholder="Item Description" value="{{old('item_desc')}}"></textarea>
            </div>
            <div class="form-group col-md-3 {{ $errors->has('source_price') ? 'has-error' : '' }}">
               <div class="input-group">
                  <input class="form-control" type="text" name="source_price" id="source_price" placeholder="Source Price" value="{{old('source_price')}}" /><span class="input-group-addon">$</span>
               </div>
            </div>
            <div class="form-group col-md-3 {{ $errors->has('selling_price') ? 'has-error' : '' }}">
               <div class="input-group">
                  <input class="form-control" type="text" name="selling_price" id="selling_price" placeholder="Selling Price" value="{{old('selling_price')}}" /><span class="input-group-addon">$</span>
               </div>
            </div>
            <div class="form-group col-md-3 {{ $errors->has('rem_qty') ? 'has-error' : '' }}">
               <input class="form-control" type="text" name="rem_qty" id="rem_qty" placeholder="Remaining Quantity" value="{{old('rem_qty')}}" />
            </div>
            <button type="submit" class="btn btn-primary pull-right form-submit">Add item</button>
         </form>
      </div>
   </section>
   <br />
   <section class="row">
      <table class="table table-hover">
         <thead>
            <th>ID</th>
            <th>Type</th>
            <th>Name</th>
            <th>Description</th>
            <th>Source price $</th>
            <th>Selling Price $</th>
            <th>Remaining Quantity</th>
            <th></th>
            <th></th>
         </thead>
         <tbody>
            @foreach ($items as $item)
               <tr class="items_table_row">
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->item_type }}</td>
                  <td>{{ $item->item_name }}</td>
                  <td>{{ $item->item_desc }}</td>
                  <td>{{ $item->source_price }}</td>
                  <td>{{ $item->selling_price }}</td>
                  <td>{{ $item->rem_qty }}</td>
                  <td><a href="#" class="edit">Edit</a></td>
                  <td><a href="{{ route('deleteItem',['item_id' => $item->id]) }}">Delete</a></td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </section>

   <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">Edit Item</h4>
            </div>
            <div class="modal-body">
               <form>
                  <input type="hidden" id="edit_1"/>
                  <div class="form-group col-md-6 {{ $errors->has('edit_item_type') ? 'has-error' : '' }}">
                     <label for="edit_item_type">Type</label>
                     <input class="form-control" type="text" name="edit_item_type" id="edit_3" placeholder="Type" />
                  </div>
                  <div class="form-group col-md-6 {{ $errors->has('edit_item_name') ? 'has-error' : '' }}">
                     <label for="edit_item_name">Name</label>
                     <input class="form-control" type="text" name="edit_item_name" id="edit_5" placeholder="Name" />
                  </div>
                  <div class="form-group col-md-12 {{ $errors->has('edit_item_desc') ? 'has-error' : '' }}">
                     <label for="edit_item_desc">Description</label>
                     <textarea class="form-control" name="edit_item_desc" id="edit_7" rows="2" placeholder="Item Description"></textarea>
                  </div>
                  <div class="form-group col-md-4 {{ $errors->has('edit_source_price') ? 'has-error' : '' }}">
                     <label for="edit_source_price">Source Price</label>
                     <div class="input-group">
                        <input class="form-control" type="text" name="edit_source_price" id="edit_9" placeholder="Source Price" /><span class="input-group-addon">$</span>
                     </div>
                  </div>
                  <div class="form-group col-md-4 {{ $errors->has('edit_selling_price') ? 'has-error' : '' }}">
                     <label for="edit_selling_price">Selling Price</label>
                     <div class="input-group">
                        <input class="form-control" type="text" name="edit_selling_price" id="edit_11" placeholder="Selling Price" /><span class="input-group-addon">$</span>
                     </div>
                  </div>
                  <div class="form-group col-md-4 {{ $errors->has('edit_rem_qty') ? 'has-error' : '' }}">
                     <label for="edit_rem_qty">Remaining Qty</label>
                     <input class="form-control" type="text" name="edit_rem_qty" id="edit_13" placeholder="Remaining Quantity" />
                  </div>
               </form>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary" id="items-modal-save">Save changes</button>
            </div>
         </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

   <script>
   var urlEdit = '{{ route('editItem') }}';
   </script>
@endsection

@section('js')
   <script src="{{ URL::to('js/item.js') }}"></script>
@endsection
