<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>ROCKPUKAT.ID</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets_user/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets_user/css/font-awesome.css">

    <link rel="stylesheet" href="assets_user/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets_user/css/owl-carousel.css">

    <link rel="stylesheet" href="assets_user/css/lightbox.css">

    <link rel="stylesheet" href="assets_user/css/custom.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    @include('user.layouts.header')
    <!-- ***** Header Area End ***** -->
@yield('content')

    <!-- ***** Men Area Starts ***** -->

    <!-- ***** Women Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <footer style="padding: 5px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <p style="margin:0; font-size:13px;">
                        Copyright © 2026 Naila Khaerunisa 20231050010
                    </p>
                </div>
            </div>
        </div>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="assets_user/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets_user/js/popper.js"></script>
    <script src="assets_user/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets_user/js/owl-carousel.js"></script>
    <script src="assets_user/js/accordions.js"></script>
    <script src="assets_user/js/datepicker.js"></script>
    <script src="assets_user/js/scrollreveal.min.js"></script>
    <script src="assets_user/js/waypoints.min.js"></script>
    <script src="assets_user/js/jquery.counterup.min.js"></script>
    <script src="assets_user/js/imgfix.min.js"></script>
    <script src="assets_user/js/slick.js"></script>
    <script src="assets_user/js/lightbox.js"></script>
    <script src="assets_user/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets_user/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);

            });
        });

    </script>

  </body>
</html>
