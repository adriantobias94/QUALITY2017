<?php

/* @var $this yii\web\View */

$this->title = 'Weather.ph';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome!</h1>

        <p class="lead">You have reached the Asset Management of Weather.ph</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
               <h2>Admin</h2>

                <p>Are you an Admin? Log in Here: </p>

                <p><a class="btn btn-default" href="http://localhost/advance/backend/web/index.php">Admin Login &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>About</h2>

                <p>As one with the Weather.ph company, we aim to provide the people in the Philippines the information that
                they need. This information is about the weather in different locations all over the region</p>

                <p><a class="btn btn-default" href="index.php?r=site/about">About &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Contact</h2>

                <p>Do you have any questions about our company? Please click the button below to redirect yourself to the
                contact page for any question. We are glad to receive your questions and feedback and you will be answered as 
                soon as we receive your inquiry</p>

                <p><a class="btn btn-default" href="index.php?r=site/contact">Contact Us &raquo;</a></p>
            </div>
        </div>

    </div>
    <html>
<!--  Carousel - consult the Twitter Bootstrap docs at 
      http://twitter.github.com/bootstrap/javascript.html#carousel -->
<div id="this-carousel-id" class="carousel slide"><!-- class of slide for animation -->
  <div class="carousel-inner">
    <div class="item active"><!-- class of active since it's the first item -->
      <img src="http://i64.tinypic.com/jqteuo.jpg" />
      <div class="carousel-caption">
        <p>Caption text here</p>
      </div>
    </div>
    <div class="item">
      <img src="http://i68.tinypic.com/wwde6w.jpg" />
      <div class="carousel-caption">
        <p>Caption text here</p>
      </div>
    </div>
    <div class="item">
      <img src="http://i63.tinypic.com/20jpjly.jpg" alt="" />
      <div class="carousel-caption">
        <p>Caption text here</p>
      </div>
    </div>
    <div class="item">
      <img src="http://i68.tinypic.com/2sajak8.jpg" alt="" />
      <div class="carousel-caption">
        <p>Caption text here</p>
      </div>
    </div>
  </div><!-- /.carousel-inner -->
  <!--  Next and Previous controls below
        href values must reference the id for this carousel -->
    <a class="carousel-control left" href="#this-carousel-id" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#this-carousel-id" data-slide="next">&rsaquo;</a>
</div><!-- /.carousel -->



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>


<script>
  $(document).ready(function(){
    $('.carousel').carousel();
  });
</script>

</html>
</div>
