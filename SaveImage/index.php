<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        <li>
            <?php
                $animais = ["Gato", "Girafa", "Leão", "Elefante"];
                $animais[6] = "Cavalo";

                echo $animais[6];
            ?>
        </li>
    </ul>

</body>
</html>