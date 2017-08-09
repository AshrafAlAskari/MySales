$('.customers_table_row').find('.edit').on('click', function (event) {
   event.preventDefault();

   col_1_element = event.target.parentNode.parentNode.childNodes[1];
   col_3_element = event.target.parentNode.parentNode.childNodes[3];
   col_5_element = event.target.parentNode.parentNode.childNodes[5];
   col_7_element = event.target.parentNode.parentNode.childNodes[7];
   col_9_element = event.target.parentNode.parentNode.childNodes[9];

   col_1_content = col_1_element.textContent;
   col_3_content = col_3_element.textContent;
   col_5_content = col_5_element.textContent;
   col_7_content = col_7_element.textContent;
   col_9_content = col_9_element.textContent;

   $('#edit_1').val(col_1_content);
   $('#edit_3').val(col_3_content);
   $('#edit_5').val(col_5_content);
   $('#edit_7').val(col_7_content);
   $('#edit_9').val(col_9_content);

   $('#edit-modal').modal();
});

$('#customers-modal-save').on('click', function () {
   $.ajax({
      method: 'POST',
      url: urlEdit,
      data: {
         edit_customer_id : $('#edit_1').val(),
         edit_customer_name : $('#edit_3').val(),
         edit_customer_location : $('#edit_5').val(),
         edit_customer_address : $('#edit_7').val(),
         edit_customer_contact : $('#edit_9').val(),
         _token: token
      }
   })
   .done(function (msg) {
      $(col_3_element).text(msg[0]['new_customer_name']);
      $(col_5_element).text(msg[1]['new_customer_location']);
      $(col_7_element).text($.trim(msg[2]['new_customer_address']));
      $(col_9_element).text($.trim(msg[3]['new_customer_contact']));
      $('#edit-modal').modal('hide');
   });
});
