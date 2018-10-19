<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title?></title>

    <link rel="shortcut icon" href="<?=base_url('assets/images/logo-uin2.png')?>">

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/css/one-page-wonder.min.css')?>" rel="stylesheet">

  </head>

  <body>

    <?php
      $this->load->view('header');
    ?>

    <?php
      include("$content");
    ?>

    <?php
      $this->load->view('footer');
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="<?=base_url('assets/plugin/jquery/jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?=base_url('assets/plugin/jquery/jquery.smoothscroll.min.js')?>"></script>
    <script>
    $('.smooth').on('click', function() {
        $.smoothScroll({
            scrollElement: $('body'),
            scrollTarget: '#' + this.id
        });
        
        return false;
    });
    </script>
    <script>
    $(document).ready(function(){
      // Add smooth scrolling to all links
      $("a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){
       
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
    });

    function makeEnable(value){
        document.getElementById("dari").readOnly = value!="YES";
        document.getElementById("fileRekom").readOnly = value!="YES";
    }
    </script>

  </body>

</html>
