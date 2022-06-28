<?php

declare(strict_types=1);
session_start();

require 'phpClasses/Suit.php';
require 'phpClasses/Card.php';
require 'phpClasses/Deck.php';
require 'phpClasses/Player.php';
require 'phpClasses/Blackjack.php';
require 'phpClasses/Dealer.php';

if (!isset($_SESSION['blackjack'])) {
    $blackjack = new blackjack();
    $_SESSION['blackjack'] = $blackjack;
} else {
    $blackjack = $_SESSION['blackjack'];
}

// hit button
if (isset($_POST['hit'])) {
    echo 'Dont like this one';
}

// stand button
if (isset($_POST['stand'])) {
    // nested if statement
    if ($blackjack->getDealer()->hasLost() === false) {
        $blackjack->getDealer()->hit($blackjack->getDeck());
    }
    else {
        unset($_SESSION['blackjack']);
        $blackjack = new blackjack();
        $_SESSION['blackjack'] = $blackjack;
    }
}

// surrender button
if (isset($_POST['surrender'])) // [] key
{
    $_SESSION['blackjack']->getPlayer()->surrender();
    unset($_SESSION['blackjack']);
    $blackjack = new blackjack();
    $_SESSION['blackjack'] = $blackjack;
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blackjack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form method="post">
    <button type="submit" class="btn btn-warning" name="hit">Hit</button>
    <button type="submit" class="btn btn-success" name="stand">Stand</button>
    <button type="submit" class="btn btn-danger" name="surrender">Surrender</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>