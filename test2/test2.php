<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 2</title>
</head>
<body>
<h1 style="text-align: center">ВЕБ-РАЗРАБОТКА</h1>
    <a href="../index.php"><button>На главную</button></a>
    <hr>
    <?php
        $img = 'image.png';
        $img2 = 'image2.png';
        $size = getimagesize($img);
    ?>
        <p>Размер исходного изображения: <span style='text-decoration: underline'><?=$size[3];?></span>.</p>
       
       
    <?php
        function resize($img, $img2, $width_finish = false, $height_finish = false) {
            // Проверяем корректность передаенных данных
            if (($width_finish < 0) || ($height_finish < 0)) {
              echo "Некорректные входные параметры";
              return false;
            }
            // Получаем данные о текущем изображении
            list($width_start, $height_start, $type) = getimagesize($img);
            // Получаем тип
            $types = array("", "gif", "jpeg", "png");
            $ext = $types[$type];

            if ($ext) {
                $func = 'imagecreatefrom'.$ext; // Создаем имя функции для создания нового изображения
                $img_start = $func($img); //Применяем эту функцию для старого изображения
            } else {
                echo 'Некорректное изображение'; // Выводим ошибку, если формат изображения недопустимый
            return false;
            } 

            // Если передан только один параметр, второй высчитываем автоматически (чтобы был пропорционален)
            if (!$height_finish) $height_finish = $width_finish / ($width_start / $height_start);
            if (!$width_finish) $width_finish = $height_finish / ($height_start / $width_start);

            $img_finish = imagecreatetruecolor($width_finish, $height_finish);
            imagecopyresampled($img_finish, $img_start, 0, 0, 0, 0, $width_finish, $height_finish, $width_start, $height_start);
            $func = 'image'.$ext;
            // Записываем изображение в файл image2.png
            $func($img_finish, $img2);

        } ?>

           
    <form action="test2.php" method="POST">
        <button type="submit" name="button">Создать баннер</button>
        <p></p>
    </form>




    <?php
    // Запускаем процесс сжатия картинки, передаем путь и желаемые размеры
    if(isset($_POST['button'])){
        resize("image.png", "image2.png", 200, 100);
        $size = getimagesize($img2);
        echo "
        <p style='font-weight:bold'>Баннер создан: $img2 (проверьте корневую папку).</p>
        <img src='image2.png' alt=''>
        <p>Размер конечного изображения: <span style='text-decoration: underline'>$size[3]</span>.</p>";
    }
    ?>

    
</body>
</html>