<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.tiny.cloud/1/8oa4m7mv0j99hot2icz9qjvwrz9ew1ojp9t2d2utcjldeiq1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@2/dist/tinymce-jquery.min.js"></script>
<script src="./assets/js/script.js"></script>
<script>
    jQuery('input[name="term_name"]').on('keyup', function(e) {
        let termSlug = jQuery('input[name="term_name"]').val();
        let termSlugElm = convertToSlug(termSlug);
        jQuery('input[name="term_slug"]').val(termSlugElm);
    });

    function convertToSlug(Text) {
        return Text.toLowerCase()
            .replace(/ /g, "-")
            .replace(/[^\w-]+/g, "");
    }
    jQuery("form#add_item_to_menu").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("action", "add_products");
        formData.set('item_description', jQuery('textarea').val());
        // console.log();
        // console.log(formData)
        jQuery.ajax({
            url: "config.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                jQuery("form#add_item_to_menu")[0].reset();
                jQuery("form#add_item_to_menu img").hide()
            }
        });
    });
    jQuery("form#add_new_category").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("action", "add_term_category");
        jQuery.ajax({
            url: "config.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                jQuery('form#add_new_category').css({
                    pointerEvents: 'none',
                    opacity: 0.4
                })
            },
            success: function(data) {
                console.log(data);
                let redirectUrl = '<?php echo $_SERVER['PHP_SELF']; ?>';
                setTimeout(function() {
                    window.location.href = redirectUrl;
                }, 2000)
            }
        });
    });
    jQuery(document).on("click", 'button.delete-item', function() {
        let productID = jQuery(this).attr('data-item_id');
        jQuery.ajax({
            url: "config.php",
            type: "POST",
            data: {
                action: "delete_product",
                product_id: productID
            },
            beforeSend: function() {
                jQuery('.add-item-wrapper').css({
                    pointerEvents: 'none',
                    opacity: 0.6
                })
            },
            success: function(data) {
                let redirectUrl = '<?php echo $_SERVER['PHP_SELF']; ?>';
                setTimeout(function() {
                    window.location.href = redirectUrl;
                }, 2000)
            }
        });

    })



    jQuery('textarea').tinymce({
        height: 500,
        width: 800,
        menubar: false,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'fullscreen',
            'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
        ],
        toolbar: 'code undo redo | blocks | bold italic backcolor | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | removeformat | help'
    });
    jQuery('input[name="item_image"]').change(function(e) {
        imgURL = URL.createObjectURL(e.target.files[0]);
        jQuery("#imgPreview").show();
        jQuery("#imgPreview").attr("src", imgURL);
    })



    // jQuery(document).on('keyup', 'textarea[name="item_description"]', function() {

    // })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("[data-fancybox]").fancybox();
    });
</script>
</body>

</html>