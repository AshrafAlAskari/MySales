@extends('layouts.master')
@section('title')
   Sale Notes
@endsection
@section('content')
   @include('includes.message-block')
   <section class="row new-post">
      <div class="col-md-8 col-md-offset-2">
         <header><h3>Add new sale note</h3></header>
         <form action="{{ route('addSaleNote') }}" method="post">
            {{csrf_field()}}
            <div class="form-group{{ $errors->has('customer_id') ? 'has-error' : '' }}">
               <select class="form-control" name="customer_id">
                  <option selected disabled hidden>Choose customer</option>
                  @foreach ($customers as $customer)
                     <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                  @endforeach
               </select>
            </div>
            <label for="sale_date">Date</label>
            <div id="datepicker" class="input-group date {{ $errors->has('sale_date') ? 'has-error' : '' }}">
               <input type="text" class="form-control" name="sale_date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
            <br />
            <center>
               <button type="submit" class="btn btn-primary">Add sale note</button>
            </center>
         </form>
      </div>
   </section>
   <section class="row new-post">
      <div class="col-md-8 col-md-offset-2">
         <header><h3>Sale Notes</h3></header>
         <table class="table table-hover">
            <thead>
               <th>ID</th>
               <th>Customer Name</th>
               <th>Sale Date</th>
               <th></th>
            </thead>
            <tbody>
               @foreach ($saleNotes as $saleNote)
                  <tr class="sale_notes_table_row">
                     <td>{{ $saleNote->id }}</td>
                     <td><a href="{{ route('addSaleGet',['sale_note_id' => $saleNote->id]) }}">{{ $saleNote->customer_name }}</a></td>
                     <td>{{ $saleNote->date }}</td>
                     <td><a href="{{ route('deleteSaleNote',['sale_note_id' => $saleNote->id]) }}">Delete</a></td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </section>
@endsection
