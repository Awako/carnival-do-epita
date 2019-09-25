<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class AwakoPlayer
 * @package Hackathon\PlayerIA
 * @author Robin
 *
 */
class AwakoPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;
    protected $rock = 0;
    protected $paper = 0;
    protected $scissors = 0;

    public function getChoice()
    {
      // Return default choice based on psychological stats to win for the first round, because there is no history
      if (!$this->result->getLastChoiceFor($this->mySide)) {
        $arr = array('a'=>parent::paperChoice(), 'b'=>parent::rockChoice(), 'c'=>parent::scissorsChoice());
        shuffle($arr);
        return $arr[0];
        // return parent::scissorsChoice();
      }
      // add last choices to make an history in order to make statistics
      if ($this->result->getLastChoiceFor($this->opponentSide) == parent::rockChoice())
        $this->rock++;
      else if ($this->result->getLastChoiceFor($this->opponentSide) == parent::paperChoice())
        $this->paper++;
      else
        $this->scissors++;

      // choose the equal move to max move of opponent history. if rocks appears more, for example, I play rocks. Rock'n'Roll baby ! ;)
      if ($this->rock >= $this->scissors && $this->rock >= $this->paper)
        return parent::rockChoice();
      else if ($this->paper >= $this->scissors && $this->paper >= $this->rock)
        return parent::paperChoice();
      else
        return parent::scissorsChoice();     
    }
};
