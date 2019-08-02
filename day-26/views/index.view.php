<?php require'partials/head.php'; ?>

<?php foreach($users as $user) : ?>

    <li> <?= $user->name ?> </li>

<?php endforeach; ?>


   <h1>submit your name</h1>

    <form action="names" method="POST">
        <input type="text" name="name">
        <button type="submit">Submit</button>
    </form>


<?php require 'partials/footer.php'; ?>



 <!-- <ul>
 <?php //foreach($tasks as $task) : ?>
            <?php //if($task->completed) : ?>
                 <strike> <li><?php // echo $task->description; ?></li></strike> 
            <?php // else : ?>
                <li><?php //echo $task->description; ?></li> 
            <?php //endif; ?>
        <?php// endforeach; ?>    

    </ul> -->