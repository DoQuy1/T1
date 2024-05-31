   <script src="assets/js/jquery-3.7.1.min.js"></script>
   <script src="assets/js/bootstrap.bundle.min.js"></script>
   <script src="assets/js/myjs.js"></script>
   <script src="assets/js/owl.carousel.min.js"></script>

   <!-- Alertify JS -->
   <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

   <script>
      alertify.set('notifier', 'position', 'top-right');
      <?php
      if (isset($_SESSION['message'])) {
      ?>
         alertify.success('<?= $_SESSION['message']; ?>');
      <?php

         unset($_SESSION['message']);
      }
      ?>
   </script>
 <!-- Owl Carousel JS -->
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    });
</script>
   </body>

   </html>