<?php
declare(strict_types=1);

class Deck
// properties (private)
{
    private const CARDS_PER_SUIT = 14;//including the knight card.
    private const KNIGHT_CARD = 12;//In italian & spanish decks there is a knight card, but we don't need it

    /** @var Card[]  */
    private $cards = [];
/// Methods
// constructor
    public function __construct() {
        $suits = [
            Suit::SPADE(),
            Suit::HEART(),
            Suit::CLUB(),
            Suit::DIAMOND(),
        ];
// foreach function
        foreach ($suits AS $suit) {
            foreach(range(1, self::CARDS_PER_SUIT) AS $i) {
                if($i === self::KNIGHT_CARD) continue;

                $this->cards[] = new Card($suit, $i);
            }
        }
    }
// function to shuffle cards
    public function shuffle() : void {
        shuffle($this->cards);
    }
// getter for the cards
    /** @return Card[] */
    public function getCards() : array
    {
        return $this->cards;
    }
// function to draw cards
    public function drawCard() :? Card
    {
        return array_shift($this->cards);
    }
}