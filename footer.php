

<footer>
  <div class="container">
    <div class="footer-inner">
    <a href="http://localhost/puredelight"><img src="./assets/images/site-logo.svg"></a>
    <ul class="d-flex">
        <li><a href="#about">About Us</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="http://localhost/puredelight/menu.php">Menu</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#contact">Contact Us</a></li>
    </ul>
    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
    </div>
    <div class="copyright">
		@Copyright<a href="#"><strong> Pure Delight.</strong></a> All Rights Reserved
		</div>
     </div>
</footer>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js" type="text/javascript"></script>
        <script>
            jQuery(".title h3").matchHeight();
        </script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $('.menu-carousel-sec .owl-carousel').owlCarousel({
            loop: false,
            nav: false,
            dots: true,
            autoPlay:false,
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
  // Show the first tab and hide the rest
$('#tabs-nav li:first-child').addClass('active');
$('.tab-content').hide();
$('.tab-content:first').show();

// Click function
$('#tabs-nav li').click(function(){
$('#tabs-nav li').removeClass('active');
$(this).addClass('active');
$('.tab-content').hide();

var activeTab = $(this).find('a').attr('href');
$(activeTab).fadeIn();
return false;
});
</script>

<script>
    jQuery(window).scroll(function () {
        var actual_top = jQuery(window).scrollTop();
        if (actual_top > 0) {
            jQuery("header").addClass("sticky");
        } else {
            jQuery("header").removeClass("sticky");
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.menu-has-children > a').click(function (e) {
                e.preventDefault();
                var subMenu = $(this).next('.sub-menu');

                $('.sub-menu').not(subMenu).slideUp();
                subMenu.slideToggle();
            });
        });

    </script>
   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    
</body>
</html>