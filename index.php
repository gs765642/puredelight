<?php
include('config.php');
include('./header.php');

?>
<section class="hero-sec">
  <div class="container">

    <div class="hero-content" style="background-image:url(./assets/images/top-hero.jpg);">
      <div class="hero-inner-wrapper">
        <h5>The Real Taste</h5>
        <h1>A genuine fine-dining experience awaits</h1>
        <p>Hey! Our Delicious food is waiting for you, we are always near to you with fresh item of food.</p>
        <a href="/puredelight/menu" class="hero-btn">Discover Menu<img src="./assets/images/menu.png"></a>
      </div>
    </div>
  </div>
</section>

<section class="about-sec" id="about">
  <div class="container">
    <div class="about-inner d-flex">
      <div class="about-img">
        <img src="./assets/images/about-img.jpg">
        <div class="counter-box">
          <h3>Our core services</h3>
          <div class="sn-counter-box d-flex">
            <div class="circle_percent" data-percent="99">
              <div class="circle_inner">
                <div class="round_per"></div>
              </div>
            </div>
            <h4>Happy Customers</h4>
          </div>
          <div class="sn-counter-box d-flex">
            <div class="circle_percent" data-percent="95">
              <div class="circle_inner">
                <div class="round_per"></div>
              </div>
            </div>
            <h4>Great Quality</h4>
          </div>
          <div class="sn-counter-box d-flex">
            <div class="circle_percent" data-percent="98">
              <div class="circle_inner">
                <div class="round_per"></div>
              </div>
            </div>
            <h4>Fine Dining</h4>
          </div>
        </div>
      </div>
      <div class="about-content">
        <h5>About us</h5>
        <h2>Discover Our Delicious World of Taste Food</h2>
        <h3>We Ensure Best Taste</h3>
        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
        <h3>Our Values</h3>
        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage</p>
      </div>
    </div>
  </div>
</section>

<section class="service-sec" id="services">
  <div class="container">
    <h5>Servives</h5>
    <!-- <h2>We provide various kind of services</h2> -->
    <h2>Why we are the best</h2>
    <div class="service-inner">
      <div class="service-box d-flex">
        <div class="service-img">
          <a href="#"><img src="./assets/images/time-80.png"></a>
        </div>
        <div class="service-content">
          <h3>Fast Serve On Table</h3>
          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature</p>
        </div>
      </div>
      <div class="service-box d-flex">
        <div class="service-img">
          <a href="#"><img src="./assets/images/discount-80.png"></a>
        </div>
        <div class="service-content">
          <h3>Discount Voucher</h3>
          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature</p>
        </div>
      </div>
      <div class="service-box d-flex">
        <div class="service-img">
          <a href="#"><img src="./assets/images/healthy-food-80.png"></a>
        </div>
        <div class="service-content">
          <h3>Fresh & Healthy Food</h3>
          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature</p>
        </div>
      </div>
      <div class="service-box d-flex">
        <div class="service-img">
          <a href="#"><img src="./assets/images/easy-80.png"></a>
        </div>
        <div class="service-content">
          <h3>Easy To Order</h3>
          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature</p>
        </div>
      </div>
      <div class="service-box d-flex">
        <div class="service-img">
          <a href="#"><img src="./assets/images/fast-delivery-80.png"></a>
        </div>
        <div class="service-content">
          <h3>Fast Delievery</h3>
          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature</p>
        </div>
      </div>
      <div class="service-box d-flex">
        <div class="service-img">
          <a href="#"><img src="./assets/images/buffet-breakfast-80.png"></a>
        </div>
        <div class="service-content">
          <h3>Buffet Service</h3>
          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="menu-sec" style="background-image:url(./assets/images/menu-bg.jpg)">
  <div class="container">
    <div class="menu-inner d-flex">
      <div class="menu-content">
        <h5>Our Menu</h5>
        <h2>Here is some food varieties</h2>
        <p>Fusce iaculis bibendum purus at placerat. Phasellus et pulvinar ex. Donec iaculis magna pretium luctus ultricies. Vestibulum vestibulum quis enim a varius. Quisque fermentum nulla vitae sapien aliquam, et egestas sem volutpat. Sed ullamcorper rutrum purus quis tempus.</p>
        <div class="btn-warp">
          <a href="/puredelight/menu">View menu</a>
        </div>
      </div>
      <div class="menu-img">
        <img src="./assets/images/right-menu-img.jpg">
      </div>
    </div>
  </div>
</section>

<section class="selected-work" id="gallery">
  <div class="container">
    <div class="selected-content">
      <h5>Gallery</h5>
      <h2>We have something special for you</h2>
      <p>If a picture says a thousand words, then you can imagine how long it would take to describe all our mouthwatering selections.</p>
    </div>
    <ul id="tabs-nav">
      <li><a href="#tab1">All</a></li>
      <li><a href="#tab2">Dessert</a></li>
      <li><a href="#tab3">Pasta</a></li>
      <li><a href="#tab4">Pizza</a></li>
      <li><a href="#tab5">Burger</a></li>
    </ul>
    <div class="selected-work-inner">
      <div id="tabs-content">
        <div id="tab1" class="tab-content all-photos" style="display: none;">
          <div class="grid-image">
            <div class="grid-image-inner">
              <div class="sn-img-content">
                <a href="./assets/images/image-1.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-1.jpg" alt="">
                </a>
              </div>
              <div class="sn-img-content">
                <a href="./assets/images/image-13.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-13.jpg" alt="">
                </a>
              </div>
            </div>
            <div class="grid-image-inner">
              <div class="sn-img-content">
                <a href="./assets/images/image-4.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-4.jpg" alt="">
                </a>
              </div>
              <div class="sn-img-content">
                <a href="./assets/images/image-5.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-5.jpg" alt="">
                </a>
              </div>
            </div>
            <div class="grid-image-inner">
              <div class="sn-img-content">
                <a href="./assets/images/image-10.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-10.jpg" alt="">
                </a>
              </div>
              <div class="sn-img-content">
                <a href="./assets/images/image-3.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-3.jpg" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="tab2" class="tab-content dessert" style="display: none;">
          <div class="grid-image">
            <div class="grid-image-inner">
              <div class="sn-img-content">
                <a href="./assets/images/image-5.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-5.jpg" alt="">
                </a>
              </div>
            </div>
            <div class="grid-image-inner">
              <div class="sn-img-content">
                <a href="./assets/images/image-6.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-6.jpg" alt="">
                </a>
              </div>
            </div>
            <div class="grid-image-inner">
              <div class="sn-img-content">
                <a href="./assets/images/image-7.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-7.jpg" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="tab3" class="tab-content pasta" style="display: none;">
          <div class="grid-image">
            <div class="grid-image-inner">
              <div class="sn-img-content">
                <a href="./assets/images/image-10.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-10.jpg" alt="">
                </a>
              </div>
            </div>
            <div class="grid-image-inner">
              <div class="sn-img-content">
                <a href="./assets/images/image-11.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-11.jpg" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="tab4" class="tab-content pizza" style="display: block;">
          <div class="grid-image">
            <div class="grid-image-inner">
              <div class="sn-img-content">
                <a href="./assets/images/image-1.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-1.jpg" alt="">
                </a>
              </div>
            </div>
            <div class="grid-image-inner">
              <div class="sn-img-content">
                <a href="./assets/images/image-8.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-8.jpg" alt="">
                </a>
              </div>
            </div>
            <div class="grid-image-inner">
              <div class="sn-img-content">
                <a href="./assets/images/image-9.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-9.jpg" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="tab5" class="tab-content burger" style="display: block;">
          <div class="grid-image">
            <div class="grid-image-inner">
              <div class="sn-img-content">
                <a href="./assets/images/image-14.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-14.jpg" alt="">
                </a>
              </div>
            </div>
            <div class="grid-image-inner">
              <div class="sn-img-content">
                <a href="./assets/images/image-15.jpg" data-fancybox="group" data-caption="joony">
                  <img src="./assets/images/image-15.jpg" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="contact-sec" id="contact" style="background-image:url(./assets/images/ban2.png)">
  <div class="container">
    <h5>Contact Us</h5>
    <h2>How to get in touch?</h2>
    <div class="cont-form-box" id="contact-form-container">
      <div class="contact-inner d-flex">
        <div class="con-left">
          <h6>Address</h6>
          <p>123 Lorem ipsum Lorem ipsum, LDH 10161</p>
          <h6>Phone Number</h6>
          <p>+01346789</p>
          <h6>Email Address</h6>
          <p>@puredelight.com</p>
          <h6>Follow Us</h6>
          <ul class="d-flex">
            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
          </ul>
        </div>
        <div class="con-form">
          <input type="text" class="form-field" placeholder="Name">
          <input type="text" class="form-field" placeholder="Email">
          <textarea type="message" rows="6" placeholder="Message"></textarea>
          <button type="submit">Send</button>
        </div>

      </div>
      <div class="thank-you-message-box"  id="thank-you-message">
        <div class="thank-you-message">
          <h2>Thank you for your message!</h2>
          <p>We will get back to you as soon as possible.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include('./footer.php'); ?>