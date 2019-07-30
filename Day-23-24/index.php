
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
        <h1>
            <?= "hi ". htmlspecialchars($_GET['name']);?>
        </h1>
    </header>
</body>
</html>