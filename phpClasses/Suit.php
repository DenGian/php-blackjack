<?php
declare(strict_types=1);

class Suit
// properties
{
    const TYPE_SPADE = 'Spade';
    const TYPE_HEART = 'Heart';
    const TYPE_DIAMOND = 'Diamond';
    const TYPE_CLUB = 'Club';

    private const CHAR_SPADE = 127136;
    private const CHAR_HEART = 127152;
    private const CHAR_DIAMOND = 127168;
    private const CHAR_CLUB = 127184;

    private string $name;
/// Methods
// constructor
    private function __construct(string $name) {
        $this->name = $name;
    }
// static function
    static function SPADE() : Suit {
        return new Suit(self::TYPE_SPADE);
    }
    // static function
    static function HEART() : Suit  {
        return new Suit(self::TYPE_HEART);
    }
    // static function
    static function DIAMOND() : Suit  {
        return new Suit(self::TYPE_DIAMOND);
    }
    // static function
    static function CLUB() : Suit  {
        return new Suit(self::TYPE_CLUB);
    }
// getter for the name
    public function getName(): string
    {
        return $this->name;
    }
// getter for the color
    public function getColor() : string
    {
        return in_array($this->name, [self::TYPE_HEART, self::TYPE_DIAMOND]) ? 'red' : 'black';
    }
// getter for the start value
    public function getStartValue() : int
    {
        switch($this->name) {
            case self::TYPE_SPADE;
                return self::CHAR_SPADE;
            case self::TYPE_CLUB;
                return self::CHAR_CLUB;
            case self::TYPE_DIAMOND;
                return self::CHAR_DIAMOND;
            case self::TYPE_HEART;
                return self::CHAR_HEART;
            default:
                throw new DomainException('Invalid suit type');
        }
    }
}