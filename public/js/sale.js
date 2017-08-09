$('#item_type_sale').on('change', function () {
   $('#item_name_sale').empty();
   $('#item_name_sale').append('<option selected disabled hidden>Choose Item Name</option>');
   for (var i = 0; i < items.length; i++) {
      if(items[i].item_type == $('#item_type_sale :selected').val())
      $('#item_name_sale').append('<option value="' + items[i].id + '">' + items[i].item_name + '</option>');
   }
});

$('#item_name_sale').on('change', function () {
   for (var i = 0; i < items.length; i++) {
      if(items[i].id == $('#item_name_sale :selected').val())
      $('#selling_price').val(items[i].selling_price);
   }
});

$('#qty').on('change', function () {
   quantity = $('#qty').val();
   price = $('#selling_price').val();
   total_price = quantity * price;
   $('#total_price').val(total_price);
});
