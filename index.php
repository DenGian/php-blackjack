<?php

declare(strict_types=1);

require 'phpClasses/Suit.php';
require 'phpClasses/Card.php';
require 'phpClasses/Deck.php';
require 'phpClasses/Player.php';
require 'phpClasses/Blackjack.php';

$deck = new Deck();
$deck->shuffle();
foreach ($deck->getCards() as $card) {
    echo $card->getUnicodeCharacter(true);
    echo '<br>';
}