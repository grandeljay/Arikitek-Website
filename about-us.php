<!doctype html>

<html lang="en">

<?php
$_GLOBALS['file'] = basename(__FILE__);
?>

<head>
    <title>About us - Arikitek - creators of OpsApp</title>

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
              <h1>About us</h1>

              <?php
              include_once 'inc/compatibility.php';
              ?>

              <section class="skew">
                  <p>We are a small team of professionals with over 12 years experience in the telecommunications industry. We employ staff with ethical and value-oriented work principles and rise to meet the challenge of a diverse workforce. We partner with innovative networks and work jointly with project teams to maximize client benefits.</p>
                  <p>At the forefront of our business is the expectation that we are working for the greater good of the planet. We commit to giving financially to charities that specifically benefit the underprivileged.</p>
                  <p>Some of the charities we support are listed below:</p>
                  <ul>
                      <li>Have Faith Projects</li>
                      <li>HOSA South Africa</li>
                  </ul>
              </section>

              <section class="skew">
                  <h2>Imprint</h2>
                  <table>
                  <thead>
                  <tr>
                      <th>Arikitek UG (haftungsbeschränkt)</th>
                  </tr>
                  </head>
                  <tbody>
                  <tr>
                      <td>Friederike-Fliedner-Weg 94</td>
                  </tr>
                  <tr>
                      <td>40489 Düsseldorf</td>
                  </tr>
                  <tr>
                      <td><p><a class="electronicMessage fallbackUnlink" data-href="aW5mb0BhcmlraXRlay5jb20=">info<span class="at"></span>arikitek<span class="dot"></span>com</a></p></td>
                  </tr>
                  </tbody>
                  </table>

                  <p>Handelsregister Nr.: HRB 76414</p>
                  <p>Registergericht: Düsseldorf</p>
                  <p>Umsatzsteuer Nr.: DE 30 36 70 418</p>
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
