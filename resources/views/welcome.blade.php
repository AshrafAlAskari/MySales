@extends('layouts.master')
@section('title')
   Home
@endsection
@section('content')
   <div id="wrapper">
      <div id="page-content-wrapper">
         <div class="row">
            <center>
               <a href="{{ route('items') }}"><button class="btn btn-primary homebtn">Items</button></a>
               <a href="{{ route('customers') }}"><button class="btn btn-primary homebtn">Customers</button></a>
               <a href="{{ route('saleNotes') }}"><button class="btn btn-primary homebtn">Sale Notes</button></a>
            </center>
         </div>
      </div>
      <script>
      var urlEdit = '#';
      </script>
   </div>
@endsection
