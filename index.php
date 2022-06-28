<?php

declare(strict_types=1);
session_start();

require 'phpClasses/Suit.php';
require 'phpClasses/Card.php';
require 'phpClasses/Deck.php';
require 'phpClasses/Player.php';
require 'phpClasses/Blackjack.php';

if (!$_SESSION["blackjack"]){
$blackjack = new blackjack();
    $_SESSION["blackjack"]=$blackjack;
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
</head>
<body>
<button></button>
<button></button>
<button></button>
</body>
</html>