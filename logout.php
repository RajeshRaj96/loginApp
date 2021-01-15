<?php

setcookie("current", "", time() - 3600);
header("Location: index.php");
die();

?>