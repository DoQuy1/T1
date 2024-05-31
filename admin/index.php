<?php 
   
   include('../middleware/adminMiddleware.php'); 
   include('includes/header.php'); 
  
?>


<!-- Alertify JS -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
    <?php
        if (isset($_SESSION['message'])) 
    {
        ?>

        alertify.set('notifier', 'position', 'top-right');
        alertify.success('<?= $_SESSION['message']; ?>');
        
        <?php

        unset($_SESSION['message']);
    }
    ?>
</script>
