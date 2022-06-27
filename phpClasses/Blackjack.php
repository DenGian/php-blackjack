<?php
declare(strict_types=1);

require 'Player.php';
class Blackjack
{
private object $player;
private object $dealer;
private object $deck;

public function __construct()
{
$this->deck = new deck();
$this->deck->shuffle();
$this->player= new player();
$this->dealer= new player();
}
public function getPlayer(): object
{

}
public function getDealer(): object
{

}
public function getDeck(): object
{

}
}