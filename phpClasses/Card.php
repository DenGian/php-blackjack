<?php
declare(strict_types=1);

class Card
{
    // properties (private)
    private const ACE_VALUE = 11;
    private const FACE_VALUE = 10;

    private Suit $suit; // type declaration 'Suit'?
    private int $value;
/// Methods
    // constructor
    public function __construct(Suit $suit, int $value)
    {
        $this->suit = $suit;
        $this->value = $value;
    }
// getter for suit
    public function getSuit(): Suit
    {
        return $this->suit;
    }
// getter for the value
    public function getValue(): int
    {
        if($this->value === 1) {
            return self::ACE_VALUE;
        }
        if($this->value >= 10) {
            return self::FACE_VALUE;
        }

        return $this->value;
    }
// getter for values of non-special cards
    private function getRawValue(): int
    {
        return $this->value;
    }

    public function getUnicodeCharacter(bool $includeColor=false): string {
        $value = '&#'. ($this->suit->getStartValue() + $this->getRawValue()) .';';

        if($includeColor) {
            $value = sprintf('<span style="color: %s;">%s</span>',
                $this->suit->getColor(),
                $value
            );
        }

        return $value;
    }
}
