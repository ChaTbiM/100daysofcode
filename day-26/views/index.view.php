<?php require'partials/head.php'; ?>

    <ul>
        <?php foreach($tasks as $task) : ?>
            <?php if($task->completed) : ?>
                <strike> <li><?= $task->description; ?></li></strike>
            <?php else : ?>
                <li><?= $task->description; ?></li>
            <?php endif; ?>
        <?php endforeach; ?>    

    </ul>

<?php require 'partials/footer.php'; ?>
