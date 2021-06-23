<?php
session_start();
$a = $_SESSION['text'];
?>

<h3>Полный текст новости:</h3>
<p><?=$a;?></p>