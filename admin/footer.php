</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="./assets/js/script.js"></script>
<script>
    // jQuery(document).on('submit', 'form#add_item_to_menu', function(e) {
    //     e.preventDefault();

    //     // Retrieve values from form inputs
    //     var item_name = jQuery('form#add_item_to_menu input[name="item_name"]').val();
    //     var item_price = jQuery('form#add_item_to_menu input[name="item_price"]').val();
    //     var item_image = jQuery('form#add_item_to_menu input[name="item_image"]').val();
    //     var item_description = jQuery('form#add_item_to_menu input[name="item_description"]').val();
    //     var item_category = jQuery('form#add_item_to_menu input[name="item_category"]').val();
    //     var item_status = jQuery('form#add_item_to_menu select[name="item_status"]').val();
    //     var formData = new FormData(this);
    //     formData.append('action', 'add_item_to_menu');
    //     formData.append('item_name', item_name);
    //     formData.append('item_price', item_price);
    //     formData.append('item_description', item_description);
    //     formData.append('item_category', item_category);
    //     formData.append('item_status', item_status);
    //     // formData.append('item_image', ); // Get the first uploaded file
    //     var image = $('form#add_item_to_menu input[name="item_image"]')[0].files[0];
    //     console.log(formData);
    //     jQuery.ajax({
    //         type: "POST",
    //         url: "function.php",
    //         data: image,
    //         processData: false, // Don't process data as traditional form key/value pairs
    //         contentType: false, // Set content type to undefined to allow FormData handling
    //         success: function(res) {
    //             // ...
    //         },
    //         error: function(err) {
    //             // ...
    //         }
    //     });

    //     // jQuery.ajax({
    //     //     type: "POST",
    //     //     url: "function.php",
    //     //     data: {
    //     //         action: "add_menu_item",
    //     //         item_name: item_name,
    //     //         item_price: item_price,
    //     //         item_image: item_image,
    //     //         item_description: item_description,
    //     //         item_category: item_category,
    //     //         item_status: item_status
    //     //     },
    //     //     success: function(res) {
    //     //         console.log(res);
    //     //     },
    //     //     error: function(err) {
    //     //         console.log(err);
    //     //     }
    //     // });
    // });
    jQuery("form#add_item_to_menu").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("action", "add_menu_item");

        console.log(formData)
        jQuery.ajax({
            url: "function.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {}
        });
    });
    jQuery("form#add_new_category").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("action", "add_term_category");
        jQuery.ajax({
            url: "function.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
            }
        });
    });
</script>

</html>