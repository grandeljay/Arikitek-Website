<!doctype html>

<html lang="en">

<?php
$_GLOBALS['file'] = basename(__FILE__);
?>

<head>
    <title>OpsApp - Arikitek - creators of OpsApp</title>

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
              <h1>OpsApp</h1>

              <?php
              include_once 'inc/compatibility.php';
              ?>

              <section class="skew">
                <div class="content">
                  <p>It's somewhat ironic that the most underutilised feature of a smart phone is the user’s address book. The address book can store a lot of useful information about a contact, including social networks, profile pictures, supported messaging profiles, … just to name a few. So why don’t we utilise this information? Because it is up to the smartphone owner to populate and maintain all of this information.</p>
                  <p>
                    <a class="popup" href="img/opsapp-logo.png" data-caption="OpsApp" data-description="This is the logo for the OpsApp.">
                      <picture>
                        <source srcset="img/opsapp-logo.webp" type="image/webp">
                        <source srcset="img/opsapp-logo.png" type="image/png">
                        <img src="img/opsapp-logo.png" alt="OpsApp logo">
                      </picture>
                    </a>
                  </p>

                  <p>OpsApp fixes all of this by changing ownership of the address book, and allows you to manage your details in the address book of your friends and colleagues. So if you add a social network, change your phone number or email address, add a married name, … (you get the picture) – simply update your OpsApp profile and these details will automatically be updated in the address book of your contacts.</p>
                  <p>So when you meet someone new all you have to do is give them your OpsApp nickname and their address book will automatically fill with all the details you want to share with them.</p>
                  <p>Smart. Simple. Savvy.</p>
                </div>
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
