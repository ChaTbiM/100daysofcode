<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classes class</title>
</head>
<body>
    
    <ul>
        <?php foreach($tasks as $task) : ?>
            <?php if($task->isComplete()) : ?>
                <strike> <li><?= $task->description; ?></li></strike>
            <?php else : ?>
                <li><?= $task->description; ?></li>
            <?php endif; ?>
        <?php endforeach; ?>    

    </ul>

</body>
</html>