$(document).ready(function () {
    $('#view').click(function(e) {
        e.preventDefault();
        $.ajax({    
            type: "GET",
            url: "order_details.php",
            // data: $('#table-container').serialize(),             
            dataType: "html",                  
            success: function(data){                    
                $("#table-container").html(data); 
         
            }
        });
    })
});