<?php require_once('array.php');?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 4</title>
</head>
<body>
    <h1 style="text-align: center">МАССИВЫ</h1>
    <a href="../index.php"><button>На главную</button></a>
    <hr>
    <h3>Задан следующий массив:</h3>
    <?php
    // Выводим заданный массив
    for ($i = 0; $i < count($arr); $i++){
        if ($i == count($arr)-1){
            echo $arr[$i];
            break;
        }
        echo $arr[$i].', ';
    }
    $count_arr = count($arr)
    ?>
    <p>Количество элементов массива: <?=$count_arr;?></p>
    <h3>Определяем количество последовательных пар:</h3>
    <?php
    $count = 0;

    for ($i = 0; $i < count($arr); $i++){
        // Записываем первую пару элементов в переменные
        $a = $arr[$i]; 
        $b = $arr[$i+1];
        $color = 'black';
        $array = $arr[$i];
        // При их совпадении пропускаем следующий элемент массива и увеличиваем счетчик
        if ($a === $b){
            $count++;
            $i++;
            $color = 'red'; //Для подсветки совпадений
            $array = $arr[$i].', '.$arr[$i];
        }
        // Выводим массив с подсветкой
        if ($i == count($arr)-1){
            echo "<span style='color: $color'>$array</span>";
            break;
        }
        echo "<span style='color: $color'>$array, </span>";
    }
    ?>
    <p>Общее количество последовательных пар: <?=$count;?></p>
    <input type="button" value="Обновить массив" onClick="window.location.reload( true );">
</body>
</html>