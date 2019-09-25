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
      if (!$this->result->getLastChoiceFor($this->mySide)) {
        return parent::scissorsChoice();
      }
      if ($this->result->getLastChoiceFor($this->opponentSide) == parent::rockChoice())
        $this->rock++;
      else if ($this->result->getLastChoiceFor($this->opponentSide) == parent::paperChoice())
        $this->paper++;
      else
        $this->scissors++;

      if ($this->rock >= $this->scissors && $this->rock >= $this->paper)
        return parent::rockChoice();
      else if ($this->paper >= $this->scissors && $this->paper >= $this->rock)
        return parent::paperChoice();
      else
        return parent::scissorsChoice();       
  }
};
