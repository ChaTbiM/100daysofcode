<?php

function totalJokes($pdo)
{
    $sql = 'SELECT COUNT(*) FROM `jokes`';

    return query($pdo, $sql)->fetch()[0];
}

function getJoke($pdo, $id)
{
    $sql = 'SELECT `joketext` from `jokes` WHERE `id` = :id ';
    $parameters = [':id' => $id];

    return query($pdo, $sql, $parameters)->fetch()[0];
}

function query($pdo, $sql, $parameters = [])
{
    $query = $pdo->prepare($sql);
    $query->execute($parameters);

    return $query;
}

// SQL QUERY

function insertJoke($pdo, $joketext, $author_id)
{
    $query = 'INSERT INTO `jokes` (`joketext`,`jokedate`,`author_id`) VALUES(:joketext, CURDATE(),:author_id)';
    $parameters = [
        ':joketext' => $joketext,
        ':author_id' => $author_id,
    ];

    query($pdo, $query, $parameters);
}

function updateJoke($pdo, $jokeId, $joketext, $author_id)
{
    $sql = 'UPDATE `jokes` SET `joketext`=:joketext, `author_id`=:author_id WHERE `id`=:id';

    $parameters = [
        ':id' => $jokeId,
        ':joketext' => $joketext,
        ':author_id' => $author_id,
    ];

    query($pdo, $sql, $parameters);
}

function deleteJoke($pdo, $id)
{
    $sql = 'DELETE FROM `jokes` WHERE `id`=:id ';

    $parameters = [':id' => $id];
    query($pdo, $sql, $parameters);
}

function allJokes($pdo)
{
    $sql = 'SELECT * FROM `jokes`';

    return  query($pdo, $sql)->fetchAll();
}
