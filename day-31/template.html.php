
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
</head>
<body>
    <h1> MEssage -_- </h1>
    <p>
        <?php if (isset($error)) { ?>
            <p> <?php echo $error; ?> </p>
        <?php } else { ?>
            <?php foreach ($jokes as $joke) { ?>
                <h2> <?php echo $joke; ?> </h2>
            <?php } ?>
        <?php } ?>
        
        <?php if (isset($error)) { ?>
                <?php echo $error; ?>
            <?php  } else { ?>
                <?php echo 'work'; ?>
        <?php } ?>
    
    </p>
</body>
</html>