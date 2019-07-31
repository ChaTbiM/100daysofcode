<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Second Day php</title>
</head>
<body>

<h1>Second DAy Php</h1>

<h2>task for the day</h2>
<ul>
    <?php foreach($task as $key => $value) : ?>
        <li> <strong><?=ucwords($key) ?>:</strong> <?= $value ?> </li>
    <?php endforeach ; ?>

    <li> <strong> Status : </strong> <?= $task['completed'] ? 'complete' : 'Incomplete' ; ?> </li>

    <?php 
        if($task['completed']){
            echo 'complete';
        }else {
            echo 'incomplete';
        }
    ?>

    <?php if($task['completed']) : ?>)
        <div><span> &#9989 completed </span></div>
    <?php elseif(! $task['completed']) : ?>
        <div><span> incomplete......... </span></div>
    <?php endif ;?>
</ul>


</body>
</html>