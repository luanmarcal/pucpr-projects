<?php

if (!isset($_SESSION)) {
    session_start();
}

echo "<a href=../views/perfil.php class=hovertext data-hover=configurações >";
echo "<img src=../../public/images/user-icon.png alt=user class=user>";
echo "</a>";
echo "<p>$_SESSION[nome]</p>";

?>