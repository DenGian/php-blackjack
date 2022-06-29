<?php
declare(strict_types=1);

class Dealer extends Player
{
    private int $stillNoGodHere = 15;

public function __construct(object $deck)
{
parent::__construct($deck);
}
public function hit($deck): void
{
    while ($this->getScore()<$this->stillNoGodHere)
    {
        parent::hit($deck); // TODO: Change the autogenerated stub
    }
}
}