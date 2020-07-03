<!doctype html>

<html lang="en">

<?php
$_GLOBALS['file'] = basename(__FILE__);
?>

<head>
    <title>Arikitek - creators of OpsApp</title>
    
    <?php
    include_once 'inc/head.php';
    ?>    
</head>

<body>
    <div id="backToTop" class="wrapper">
        <header class="noJS">
            <?php
            include_once 'inc/logo.php';
            ?>

            <nav>
                <?php
                include_once 'inc/nav.php';
                ?>
            </nav>
        </header>
        
        <div id="main">
          <main>
              <h1>Home</h1>
              
              <?php
              include_once 'inc/compatibility.php';
              ?>
               
              <section class="skew">
                  <h2>Arikitek</h2>
                  <p>Arikitek is a technology company headquartered in Düsseldorf, Germany.</p>
                  <p>Arikitek are the creators of OpsApp - an innovative approach to managing your smart phone Address Book.</p>                 
                  <p>
                    <a class="popup" href="img/opsapp-logo.png" data-caption="OpsApp" data-description="This is the logo for the OpsApp.">
                      <picture>
                        <source srcset="img/opsapp-logo.webp" type="image/webp">
                        <source srcset="img/opsapp-logo.png" type="image/png">
                        <img src="img/opsapp-logo.png" alt="OpsApp logo">
                      </picture>                  
                    </a>
                  </p>
              </section>
          </main>
          
          <?php
          include_once 'inc/popup.php';
          ?>
          
          <?php
          include_once 'inc/back-to-top.php';
          ?>                      
        </div>
        
        <footer>
            <?php
            include_once 'inc/footer.php';
            ?>
        </footer>
    </div>
</body>

</html> 
