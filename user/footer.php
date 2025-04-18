</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
     jQuery(window).scroll(function() {
        var actual_top = jQuery(window).scrollTop();
        if (actual_top > 0) {
            jQuery("header").addClass("sticky");
        } else {
            jQuery("header").removeClass("sticky");
        }
    });
    jQuery(document).ready(function() {
        jQuery("form#signup_user").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("action", "new_sign_up");
            jQuery.ajax({
                url: "config.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                }
            });
        });

        jQuery("form#login_user").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("action", "user_login");
            jQuery.ajax({
                url: "config.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    // if (res.status = true) {
                    //     window.location.href = './';
                    // }
                }
            });
        });
        jQuery(".logout_btn a.logout").click(function(e) {
            e.preventDefault();
            jQuery.ajax({
                url: "config.php",
                type: "POST",
                dataType: "json",
                data: {
                    action: "logout_user"
                },
                success: function(res) {
                    console.log(res);
                    if (res.status === true) {
                        window.location.href = '/puredelight/login';
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

    });
</script>

</html>