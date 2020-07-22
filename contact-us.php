<!doctype html>

<html lang="en">

<?php
$_GLOBALS['file'] = basename(__FILE__);
$_GLOBALS['isSpam'] = null;

if(isset($_POST['message'])) {
  $to = 'info@arikitek.com';
  $subject = 'Arikitek new message';
  $message = $_POST['company'] . PHP_EOL . PHP_EOL . $_POST['message'];
  $additional_headers = array(
    'from' => $_POST['name'] . '<' . $_POST['email'] . '>',
  );
  $_GLOBALS['isSpam'] = isset($_POST['additional']) && strlen($_POST['additional']) > 0 ? true : false;

  if($_GLOBALS['isSpam'] === true) {

  }
  elseif($_GLOBALS['isSpam'] === false) {
    mail($to, $subject, $message, $additional_headers);
  }
}
?>

<head>
    <title>Contact us - Arikitek - creators of OpsApp</title>

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
              <h1>Contact us</h1>

              <?php
              include_once 'inc/compatibility.php';
              ?>

              <?php
              if($_GLOBALS['isSpam'] === true) {
              ?>
              <section id="spamProtection" class="skew message warning">
                  <h2>Something went wrong</h2>
                  <p>Our spam protection has triggered against your request. If you are not a robot please contact us directly via email.</p>
              </section>
              <?php
              }
              elseif($_GLOBALS['isSpam'] === false) {
              ?>
              <section class="skew message success">
                  <h2>Success</h2>
                  <p>Your request is being processed. Thank you for contacting us!</p>
                  <p>We will try to get back to you as soon as possible.</p>
              </section>
              <?php
              }
              ?>

              <section class="skew">
                  <h2>General enquiries</h2>
                  <p><a class="electronicMessage fallbackUnlink" data-href="aW5mb0BhcmlraXRlay5jb20=" tabindex="0">info<span class="at"></span>arikitek<span class="dot"></span>com</a></p>
              </section>

              <section class="skew">
                  <h2>Contact form</h2>

                  <!--
                  < In terms of accessibility the div containers need to be removed
                  < but grid will break then
                  -->
                  <form method="post">
                    <fieldset>
                      <div>
                        <legend>Please enter the company you work for.</legend>
                        <label for="company">Company</label>
                        <input id="company" name="company" type="text">
                      </div>
                    </fieldset>

                    <fieldset>
                      <div>
                       <legend>Please enter your name.</legend>
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" required>
                      </div>
                    </fieldset>

                    <fieldset>
                      <div>
                        <legend>Please enter your email address.</legend>
                        <label for="email">Email address</label>
                        <input id="email" name="email" type="email" required>
                      </div>
                    </fieldset>

                    <fieldset>
                      <div>
                        <legend>Please enter a message.</legend>
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required></textarea>
                      </div>
                    </fieldset>

                    <fieldset>
                      <div>
                        <legend>Do you agree to the terms mentioned?</legend>
                        <label for="consent">Consent</label>
                        <p>
                          <label>
                            <input id="consent" name="consent" type="checkbox" required>
                            I agree that the information provided in the form will be used for purpose of contacting arikitek.
                          </label>
                        </p>
                      </div>
                    </fieldset>

                    <fieldset class="additional" hidden aria-hidden="true">
                      <textarea id="additional" name="additional" autocomplete="false"></textarea>
                    </fieldset>

                    <fieldset>
                      <div>
                        <legend>Submit the form in order to contact us.</legend>
                        <label for="submit">Finish</label>
                        <button id="submit" type="submit">Send</button>
                      </div>
                    </fieldset>
                  </form>
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
