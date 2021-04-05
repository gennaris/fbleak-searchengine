function fill(Value) {
   $('#search').val(Value);
   $('#display').hide();
}

function ajax_submit() {
           var name = $('#search').val();
           if (name == "") {
               $("#display").html("");
           }
           else {
                   $.ajax({
                       type: "POST",
                       url: "ajax.php",
                       data: {
                           search: name
                       },
                       success: function(html) {
                           $("#display").html(html).show();
                       }
                   });
           }
       }
