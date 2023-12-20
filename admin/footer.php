</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
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
</script>

</html>