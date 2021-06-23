<?php
session_start(); 
// Формируем данные (полный текст, ссылка, краткий текст)
$a = $_SESSION['article'];
$b = mb_substr($a, 0, 180).'...'; 
$link = trim(strrchr($b,' ')); 
$b = stristr($b, $link, true);
?>