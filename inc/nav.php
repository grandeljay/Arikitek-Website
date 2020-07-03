<?php
$href = array(
  'index.php',
  array(
      'what-we-do.php',
      'opsapp.php',
  ),
  'about-us.php',
  'contact-us.php',
);

$class = array(
  'icon home',
  array(
      'icon whatwedo',
      'icon opsapp',
  ),
  'icon aboutus',
  'icon contactus',
);

$innerHTML = array(
  'Home',
  array(
      'What we do',
      'OpsApp',
  ),
  'About us',
  'Contact us',
);

echo '<ul id="menuMain">';

for($i = 0; $i < count($href); $i++) {
    if(is_array($href[$i])) {        
        if($_GLOBALS['file'] == $href[$i][0]) {
            $class[$i][0] .= ' active';
        }
        elseif(in_array($_GLOBALS['file'], $href[$i])) {
            $class[$i][0] .= ' parent';
        }

        echo '<li class="' . $class[$i][0] .'"><a href="' . $href[$i][0] . '">' . $innerHTML[$i][0] . '</a>';
        
            echo '<ul>';
            
            for($ii = 1; $ii < count($href[$i]); $ii++) {
                if($_GLOBALS['file'] == $href[$i][$ii]) {
                    $class[$i][$ii] .= ' active';
                }
                    
                echo '<li class="' . $class[$i][$ii] .'"><a href="' . $href[$i][$ii] . '">' . $innerHTML[$i][$ii] . '</a></li>';
            }
            
            echo '</ul>';
        
        echo '</li>';
    }
    else {
        if($_GLOBALS['file'] == $href[$i]) {
            $class[$i] .= ' active';
        }

        echo '<li class="' . $class[$i] .'"><a href="' . $href[$i] . '">' . $innerHTML[$i] . '</a></li>';
    }
}

echo '</ul>';
?>
