
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Setup Php in html</title>
    <style>
        header{
            background-color:#ccc;
            padding:4rem;
        }
    </style>
</head>
<body>

    <header>
        
        <!-- <ul>
            <?php 
            
                // foreach($names as $name){
                //     echo "<li class=\"list__item\"> $name </li>";
                // }
            
            ?>
            <hr>
            <?php //foreach($names as $name) : ?>
                <li><?php //echo $name ?></li>
            <?php //endforeach; ?>
        <ul> -->

        <ul>
                    <?php foreach($me as 
                    $key => $value) : ?>
                    <li> <strong><?=$key; ?> :</strong> <?= $value ?></li>
                <?php endforeach; ?>
        </ul>
    </header>
</body>
</html>