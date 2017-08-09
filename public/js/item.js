$('.items_table_row').find('.edit').on('click', function (event) {
   event.preventDefault();

   col_1_element = event.target.parentNode.parentNode.childNodes[1];
   col_3_element = event.target.parentNode.parentNode.childNodes[3];
   col_5_element = event.target.parentNode.parentNode.childNodes[5];
   col_7_element = event.target.parentNode.parentNode.childNodes[7];
   col_9_element = event.target.parentNode.parentNode.childNodes[9];
   col_11_element = event.target.parentNode.parentNode.childNodes[11];
   col_13_element = event.target.parentNode.parentNode.childNodes[13];
   col_l5_element = event.target.parentNode.parentNode.childNodes[15];

   col_1_content = col_1_element.textContent;
   col_3_content = col_3_element.textContent;
   col_5_content = col_5_element.textContent;
   col_7_content = col_7_element.textContent;
   col_9_content = col_9_element.textContent;
   col_11_content = col_11_element.textContent;
   col_13_content = col_13_element.textContent;
   col_15_content = col_l5_element.textContent;

   $('#edit_1').val(col_1_content);
   $('#edit_3').val(col_3_content);
   $('#edit_5').val(col_5_content);
   $('#edit_7').val(col_7_content);
   $('#edit_9').val(col_9_content);
   $('#edit_11').val(col_11_content);
   $('#edit_13').val(col_13_content);
   $('#edit_15').val(col_15_content);
   $('#edit-modal').modal();
});

$('#items-modal-save').on('click', function () {
   $.ajax({
      method: 'POST',
      url: urlEdit,
      data: {
         edit_item_id: $('#edit_1').val(),
         edit_item_type: $('#edit_3').val(),
         edit_item_name: $('#edit_5').val(),
         edit_item_desc: $('#edit_7').val(),
         edit_source_price: $('#edit_9').val(),
         edit_selling_price: $('#edit_11').val(),
         edit_shipped_qty: $('#edit_13').val(),
         edit_rem_qty: $('#edit_15').val(),
         _token: token
      }
   })
   .done(function (msg) {
      $(col_3_element).text(msg[0]['new_item_type']);
      $(col_5_element).text(msg[1]['new_item_name']);
      $(col_7_element).text(msg[2]['new_item_desc']);
      $(col_9_element).text(msg[3]['new_source_price']);
      $(col_11_element).text(msg[4]['new_selling_price']);
      $(col_13_element).text($.trim(msg[5]['new_shipped_qty']));
      $(col_l5_element).text(msg[6]['new_rem_qty']);
      $('#edit-modal').modal('hide');
   });
});
