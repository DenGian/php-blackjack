<?php

declare(strict_types=1);
session_start();

require 'phpClasses/Suit.php';
require 'phpClasses/Card.php';
require 'phpClasses/Deck.php';
require 'phpClasses/Player.php';
require 'phpClasses/Blackjack.php';

if (empty($_SESSION['blackjack'])){ // note: for some reason "!" doesnt work, dkw tho
$blackjack = new blackjack();
    $_SESSION['blackjack']=$blackjack;
}


$deck = new Deck();
$deck->shuffle();
foreach ($deck->getCards() as $card) {
    echo $card->getUnicodeCharacter(true);
    echo '<br>';
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blackjack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<button type="button" class="btn btn-success" name="hit" formmethod="post">Hit</button>
<button type="button" class="btn btn-warning" name="stand" formmethod="post">Stand</button>
<button type="button" class="btn btn-danger" name="surrender" formmethod="post">Surrender</button>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>