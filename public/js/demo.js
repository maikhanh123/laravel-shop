
$(document).ready(function () {
    $("#product").on("click", ".js-delete", function () {
        var button = $(this)
        bootbox.confirm("Are you sure?", function (result) {
            if (result) {
                $.ajax({
                    url: "index.php?view=delete&deleteid=" + button.attr("data-product-id"),
                    method: "POST",
                    success: function () {
                        button.parents("tr").remove();
                    }
                })
            }
        })
    });

    // if($("#showPass").is(':checked'))
    //     $('#key').attr('type', 'text');  // checked
    // else
    //     $('#key').attr('type', 'password');  // unchecked
    // $("#showPass").click(function() {
    //     console.log("abc");
    //     if($("#showPass:checked")) {
    //         $('#key').attr('type', 'text');
    //     } else {
    //         $('#key').attr('type', 'password'); 
    //     }
    // })

    $(".showPass").on("click", function() {
        var key_attr = $('#key').attr('type');
        
        if(key_attr != 'text') {
            
            // $('.checkbox').addClass('show');
            $('#key').attr('type', 'text');
            
        } else {
            
            // $('.checkbox').removeClass('show');
            $('#key').attr('type', 'password');
            
        }
    });
    
    // $("#datepicker").datepicker();

    

});





