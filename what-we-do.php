<!doctype html>

<html lang="en">

<?php
$_GLOBALS['file'] = basename(__FILE__);
?>

<head>
    <title>What we do - Arikitek - creators of OpsApp</title>

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
            <h1>What we do</h1>

            <?php
            include_once 'inc/compatibility.php';
            ?>

            <section class="skew">
              <div class="content">
                <p>Arikitek has over a decade's worth of telecommunications service experience and we offer:</p>
                <ul>
                  <li>OpsApp. Arikitek has developed a smartphone app for the end-user, that brings the Address Book to life.</li>
                  <li>Customised core network service development. Arikitek develops customised core network services for mobile operators. The modularity and flexibility of CCAS (Call Control Application Server) enables operators to deploy new, or redeploy existing, services in a cost-effective way.</li>
                  <li>Consultancy professional services. Our team has over 12 years experience in the mobile industry.</li>
                </ul>
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
