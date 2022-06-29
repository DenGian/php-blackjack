<?php
declare(strict_types=1);

class Blackjack
{
private object $player;
private object $dealer;
private object $deck;

public function __construct()
{
$this->start();
}
public function getPlayer(): object
{
return $this->player;
}
public function getDealer(): object
{
    return $this->dealer;
}
public function getDeck(): object
{
return $this->deck;
}
public function start(): void
{
    $this->deck = new deck();
    $this->deck->shuffle();
    $this->player= new player($this->deck);
    $this->dealer= new dealer($this->deck);
}
}