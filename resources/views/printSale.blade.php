@extends('layouts.master')
@section('title')
   Print
@endsection
@section('content')
   <div id="wrapper">
      <div id="print">
         <center>
            <div class="row">
               <table width="100%">
                  <tr style="font-size: 30px;">
                     <td width="50%">
                        <div style="padding-bottom:10px;">
                           Al-Jeeran Trading Co.
                        </div>
                     </td>
                     <td width="50%" style="direction: rtl;">
                        <div style="padding-bottom:10px;">
                           شركة الجيران للتجارة
                        </div>
                     </td>
                  </tr>
                  <td>
                     <td style="direction: rtl;">
                        <b>ابو اشرف: 07901477647</b>
                     </td>
                  </td>
               </table>
               <br />
               <div style="background-color: rgb(245, 245, 245); font-size:20px; padding: 5px; margin: 10px;">
                  Delivery Note
               </div>
            </div>
            <div class="row">
               <table class="table-bordered" style="width: 95%; padding: 5px; margin: 5px">
                  <tr>
                     <td width="15%">
                        <div style="padding: 5px; margin: 5px;">
                           Customer Name
                        </div>
                     </td>
                     <td>
                        <div style="padding: 5px; margin: 5px;">
                           {{ $customer_name }}
                        </div>
                     </td>
                  </tr>
               </table>
            </div>
            <div class="row">
               <table class="table table-bordered" style="width: 95%; margin-top: 10px;text-align: center;">
                  <tr class="active">
                     <td width="55%">Description</td>
                     <td width="15%">Quantity</td>
                     <td width="15%">Price $</td>
                     <td width="15%">Total Price $</td>
                  </tr>
                  @foreach ($sales as $sale)
                     <tr>
                     <td>
                        {{ $sale->item_name }}
                     </td>
                     <td>
                        {{ $sale->qty }}
                     </td>
                     <td>
                        {{ $sale->price }} $
                     </td>
                     <td>
                        {{ $sale->total_price }} $
                     </td>

                  </tr>
                  @endforeach
               </table>
            </div>
            <div class="row">
               
            </div>
         </center>
      </div>
   @endsection
