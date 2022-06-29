<?php

declare(strict_types=1);

require 'phpClasses/Suit.php';
require 'phpClasses/Card.php';
require 'phpClasses/Deck.php';
require 'phpClasses/Player.php';
require 'phpClasses/Blackjack.php';
require 'phpClasses/Dealer.php';

session_start();

if (!isset($_SESSION['blackjack'])) {
    $blackjack = new blackjack();
    $_SESSION['blackjack'] = $blackjack;
} else {
    $blackjack = $_SESSION['blackjack'];
}

// hit button
if (isset($_POST['hit'])) {
    if ($blackjack->getPlayer()->hasLost() === false) {
        $blackjack->getPlayer()->hit($blackjack->getDeck());
    }
}

// stand button
if (isset($_POST['stand'])) {

} // nested if statement
elseif ($blackjack->getDealer()->hasLost() === false) {
    $blackjack->getDealer()->hit($blackjack->getDeck());
} else {
    $blackjack->start();
//        unset($_SESSION['blackjack']);
//        $blackjack = new blackjack();
//        $_SESSION['blackjack'] = $blackjack;
}

// surrender button
if (isset($_POST['surrender'])) // [] key
{
    $_SESSION['blackjack']->getPlayer()->surrender();
//    unset($_SESSION['blackjack']);
//    $blackjack = new blackjack();
//    $_SESSION['blackjack'] = $blackjack;
}
if (isset($_POST['restart'])) {
    $blackjack->start();
}

if ($blackjack->getPlayer()->hasLost() === true) {
    echo '<div class="alert alert-danger" role = "alert" >';
    echo 'You scrub';
    echo '</div >';
} else if ($blackjack->getDealer()->hasLost() === true) {
    echo '<div class="alert alert-success" role="alert">';
    echo 'Average';
    echo '</div>';

} else if ($blackjack->getPlayer()->getScore() < $blackjack->getDealer()->getScore()) {
    echo '<div class="alert alert-danger" role = "alert" >';
    echo 'You scrub';
    echo '</div >';
} else {
    echo '<div class="alert alert-success" role="alert">';
    echo 'Average';
    echo '</div>';
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
<div class="container">
<div class="row">
    <div class="col-lg-1">
        <p>
            Player
        </p>
        <?php
        echo $blackjack->getPlayer()->getScore();
        ?>
    </div>
    <?php
    foreach ($blackjack->getPlayer()->getCards() as $card): ?>
        <div style="text-align:center; font-size:100px;" class=" card col-lg-2">
            <?= $card->getUnicodeCharacter(true); ?>
        </div>
    <?php endforeach; ?>
</div>
<div class="row">
    <div class="col-lg-1">
        <p>
            Dealer
        </p>
        <?php
        echo $blackjack->getDealer()->getScore();
        ?>
    </div>
    <?php foreach ($blackjack->getDealer()->getCards() as $card): ?>
        <div style="text-align:center; font-size:100px;" class=" card col-lg-2">
            <?= $card->getUnicodeCharacter(true); ?>
        </div>
    <?php endforeach; ?>
</div>
</div>
<form method="post">
    <button type="submit" class="btn btn-warning" name="hit">Hit</button>
    <button type="submit" class="btn btn-success" name="stand">Stand</button>
    <button type="submit" class="btn btn-danger" name="surrender">Surrender</button>
    <button type="submit" class="btn btn-danger" name="restart">Restart</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>