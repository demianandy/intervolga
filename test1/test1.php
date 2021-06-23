<?php
session_start(); 
require_once('data.php');
// Создаем сессию для 3 способа
$_SESSION['text'] = $a;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 1</title>
</head>
<body>



<h1 style="text-align: center">PHP И HTML</h1>
<a href="../index.php"><button>На главную</button></a>
<hr>
<h3>Полный текст новости:</h3>
<p id="full"><?=$a;?></p>
<form action="news.php" method="POST">
    <select name="article">
        <option value="0">Про ООН</option>
        <option value="1">Про Сирию</option>
        <option value="2">Про метро</option>
        <option value="3">Про Зеленского</option>
        <option value="4">Про Меркель</option>
    </select>
    <button name="button">Выбрать новость</button> 
</form>


<hr>

<h3>Краткий текст новости (способ 1 - с помощью обычной ссылки):</h3>
<p><?=$b;?><a href="link1.php" target="_blank"><?=$link;?></a></p>

<h3>Краткий текст новости (способ 2 - с помощью сессии):</h3>
<p><?=$b;?><a href="link2.php" target="_blank"><?=$link;?></a></p>

<h3>Краткий текст новости (способ 3 - с помощью GET-запроса):</h3>
<p><?=$b;?><a href="link3.php?link=<?=$a;?>" name="link" target="_blank"><?=$link;?></a></p>

<hr>

<h2>Возможные проблемы в решении этой задачи:</h2>
<p>При обрезании текста строго до 180 символов невозможно предусмотреть, чтобы последнее слово выводилось целиком. По той же причине последним элементом может быть пробел. Так же могут возникнуть проблемы, если текст новости будет меньше 180 символов (поэтому в идеале нужно применять условие на проверку количества символов новости).</p>
    
</body>
</html>

