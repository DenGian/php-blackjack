<?php
declare(strict_types=1);

class Player
{
    private array $cards/*=[]*/; // if empty array is necessary
    private bool $lost = false;
    private int $noGodHere = 21;

/// Methods
// constructor
    public function __construct(object $deck)
    {
        $this->cards[] = $deck->drawCard();
        $this->cards[] = $deck->drawCard();
    }

    public function hit($deck): void
    {
$this->cards[]+= $deck->drawCard();
if ($this->getScore()>$this->noGodHere){
    $this->surrender();
}
    }

    public function surrender(): void
    {
    $this->lost=true;
    }

    public function getScore(): int
    {
        for ($i = 0; $i <= count($this->cards); $i++) {
            $score += $this->cards[$i]->getRawValue();
        }
        return $score;
    }

    public function hasLost(): bool
    {
        // "this" refers to the object made by the class
return $this->lost;
    }
}