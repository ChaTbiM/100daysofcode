<?php

        $host = 'localhost';
        $dbname = 'joker';
        $username = 'root';
        $password = '';

        $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $username, $password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
