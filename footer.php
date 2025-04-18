<footer>
    <div class="container">
        <div class="footer-inner">
            <a href="http://localhost/puredelight"><img src="./assets/images/site-logo.svg"></a>
            <ul class="d-flex">
                <li><a href="#about">About Us</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="http://localhost/puredelight/menu">Menu</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </ul>
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
        </div>
        <div class="copyright">
            @Copyright<a href="http://localhost/puredelight/"><strong> Pure Delight.</strong></a> All Rights Reserved
        </div>
    </div>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js" type="text/javascript"></script>

<script>
   
    jQuery(document).on('click', '#tabs-nav li a', function(e) {
        
        headerHeight = jQuery('header').outerHeight();
        if (jQuery(this).hash !== "") {
         
            var hash = this.hash;
            jQuery('html').animate({
                scrollTop: jQuery(hash).offset().top - headerHeight
            }, 800);
            console.log(hash);
        }
        console.log(headerHeight);
    });
    jQuery(".title h3").matchHeight();
   
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    jQuery('.menu-carousel-sec .owl-carousel').owlCarousel({
        loop: false,
        nav: false,
        dots: true,
        autoPlay: false,
        responsive: {
            0: {
                items: 1
            },
            400: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    })
</script>



<script>
    // Show the first tab and hide the rest
    $('#tabs-nav li:first-child').addClass('active');
    $('.tab-content').hide();
    $('.tab-content:first').show();

    // Click function
    $('#tabs-nav li').click(function() {
        $('#tabs-nav li').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();

        var activeTab = $(this).find('a').attr('href');
        $(activeTab).fadeIn();
        
        return false;
    });
</script>

<script>
    jQuery(window).scroll(function() {
        var actual_top = jQuery(window).scrollTop();
        if (actual_top > 0) {
            jQuery("header").addClass("sticky");
        } else {
            jQuery("header").removeClass("sticky");
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('.menu-has-children > a').click(function(e) {
            e.preventDefault();
            var subMenu = $(this).next('.sub-menu');

            $('.sub-menu').not(subMenu).slideUp();
            subMenu.slideToggle();
        });
    });

    jQuery(document).ready(function() {
        jQuery('input[name="item_search"]').on('keyup', function() {
            var value = jQuery(this).val().toLowerCase();
            var found = false;

            jQuery(".dishes-wrapper .sn-dish").filter(function() {
                var match = jQuery(this).text().toLowerCase().indexOf(value) > -1;
                jQuery(this).toggle(match);
                if (match) {
                    found = true;
                }
            });

            if (!found) {
                // Show "No products found" message or perform related action
                jQuery('.no_product_found').show(); // Assuming a class 'no_product_found' for the message
            } else {
                // Hide the "No products found" message if products are found
                jQuery('.no_product_found').hide();
            }
        });
    });
</script>
<!-- <script>
        $(document).ready(function() {
            var counter = 0;
            var increment = 1; // Change this value to set the increment amount
            var intervalTime = 40; // Change this value to set the interval time in milliseconds
            var limit = $('div').attr('data-counter');

            function updateCounter() {
                $('.counter').text(counter);
            }

            setInterval(function() {
                if (counter != limit) {

                    counter += increment;
                    $('#range').css('width', counter + '%');
                    updateCounter();

                }
            }, intervalTime);
        });
</script> -->

<script>
    $(".circle_percent").each(function() {
        var $this = $(this),
            $dataV = $this.data("percent"),
            $dataDeg = $dataV * 3.6,
            $round = $this.find(".round_per");
        $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
        $this.append('<div class="circle_inbox"><span class="percent_text"></span></div>');
        $this.prop('Counter', 0).animate({
            Counter: $dataV
        }, {
            duration: 2000,
            easing: 'swing',
            step: function(now) {
                $this.find(".percent_text").text(Math.ceil(now) + "%");
            }
        });
        if ($dataV >= 51) {
            $round.css("transform", "rotate(" + 360 + "deg)");
            setTimeout(function() {
                $this.addClass("percent_more");
            }, 1500);
            setTimeout(function() {
                $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
            }, 1500);
        }
    });


    jQuery('.qty-count--add').click(function() {
        var th = jQuery(this).closest('.qty-input').find('.product-qty');
        if (th.val() != 10) th.val(+th.val() + 1);
        let parentElm = jQuery(this).parents('.item')
        let pID = parentElm.find('input[type="hidden"]').val();
        let qty = parentElm.find('input[type="product-qty"]').val() ? parentElm.find('input[type="product-qty"]').val() : 1;
        changeCart(pID, qty,action = "change_item_cart");

    });
    jQuery('.qty-count--minus').click(function() {
        var th = jQuery(this).closest('.qty-input').find('.product-qty');
        if (th.val() > 1) th.val(+th.val() - 1);
        let parentElm = jQuery(this).parents('.item')
        let pID = parentElm.find('input[type="hidden"]').val();
        let qty = th.val() ? th.val() : 1;
        changeCart(pID, qty, "change_item_cart");

    });


    jQuery(document).on('click', '.btn-warp a.add_to_cart', function(e) {
        e.preventDefault();
        let parentElm = jQuery(this).parent().parent();
        let pID = jQuery(this).parent().find('input').val();
        let qty = jQuery(".qty").val() ? jQuery(".qty").val() : 1;
        changeCart(pID, qty, "add_to_cart", true)
    });

    jQuery(document).on('click', '.remove-btn-cart a.remove_cart_item', function(e) {
        e.preventDefault();
        let pID = jQuery(this).parent().find('input').val();
        let qty = jQuery(".qty").val() ? jQuery(".qty").val() : 1;
        jQuery.ajax({
            type: "POST",
            url: "config.php",
            data: {
                action: "remove_cart_item",
                product: pID,
                quantity: qty
            },
            success: function(res) {
                window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>"
                jQuery('.cart_count span').text(res);
                // setTimeout(() => {
                // }, 2000);

            }
        })
    });

    function changeCart(pID, qty, action = "add_to_cart", ajax = false) {
        jQuery.ajax({
            type: "POST",
            url: "config.php",
            data: {
                action: action,
                product_id: pID,
                quantity: qty
            },
            success: function(res) {
                res = JSON.parse(res);
                jQuery('.cart_count span').text(res.total);
                if (!ajax) {
                    window.location.href = "<?php $_SERVER['PHP_SELF']; ?>"

                }


            }
        })
    }

    jQuery(document).on('click', '.btn-warp a.empty_cart', function(e) {
        e.preventDefault();
        jQuery.ajax({
            type: "POST",
            url: "config.php",
            data: {
                action: "empty_cart",

            },
            success: function(res) {
                res = JSON.parse(res)
                if (res.status) {
                    window.location.href = "/puredelight/menu";
                }

            }
        })
    });
    jQuery(document).on('change', '.delivery_info .payment .payment_info input[name="payment_method"]', function(e) {
        let paymentMethod = jQuery(this).val();
        if (paymentMethod.toLowerCase() == 'card') {
            jQuery('.card_info').slideDown();
            jQuery('.card_info input').attr('required', 'required');
        } else {
            jQuery('.card_info').slideUp();
            jQuery('.card_info input').removeAttr('required', 'required');
        }
    })
    jQuery('form#order_place').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("action", "order_placed");
        formData.append("total_amount", jQuery('input[name=total_price]').val());
        jQuery.ajax({
            url: "config.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                jQuery("form#order_place").css({
                    pointerEvents: "none",
                    opacity: 0.6
                })
            },
            success: function(res) {
                res = JSON.parse(res)
                if (res.status == true) {
                    console.log(res);
                    jQuery('.res_message').remove();
                    jQuery("form#order_place .btn-wrap").before("<p class='res_message' style='color:#fff'>" + res.message + "</p>");
                    window.location.href = "/puredelight/thankyou";
                } else {
                    jQuery('.res_message').remove();
                    jQuery("form#order_place .btn-wrap").before("<p class='res_message' style='color:#fff'>" + res.message + "</p>");
                }

            }
        });
    })

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
                success: function(res) {
                    res = JSON.parse(res)
                    console.log(res);
                    jQuery('.res_message').remove();
                    jQuery("form#signup_user .btn-wrap").before("<p class='res_message'>" + res.message + "</p>");

                    
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
                    res = JSON.parse(res)
                    if (res.status != true) {
                        jQuery('.res_message').remove();
                        jQuery("form#login_user .btn-wrap").before("<p class='res_message'>" + res.message + "</p>");
                    } else {
                        window.location.href = "/puredelight/user"
                    }
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
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        jQuery("form#login_admin").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("action", "admin_login");
            jQuery.ajax({
                url: "config.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    res = JSON.parse(res)
                    if (res.status != true) {
                        jQuery('.res_message').remove();
                        jQuery("form#login_admin .btn-wrap").before("<p class='res_message'>" + res.message + "</p>");
                    } else {
                        window.location.href = "/puredelight/admin";
                    }
                }
            });
        });
        jQuery(document).on('click', '.signup-btn a', function() {
            jQuery(".user-login-form .signup-btn").hide();
            jQuery(".user-login-form .login-btn ").show();
        })
        jQuery(document).on('click', '.login-btn a', function() {
            jQuery(".user-login-form .login-btn").hide();
            jQuery(".user-login-form .signup-btn ").show();
        })


    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("[data-fancybox]").fancybox();
    });
</script>
</body>

</html>