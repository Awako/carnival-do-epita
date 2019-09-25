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
      // if ($this->result->getLastChoiceFor($this->opponentSide) == parent::rockChoice())
      //   return parent::scissorsChoice();
      // else if ($this->result->getLastChoiceFor($this->opponentSide) == parent::paperChoice())
      //   return parent::rockChoice();
      // else
      //   return parent::paperChoice();
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
        return parent::scissorsChoice();
      else if ($this->paper >= $this->scissors && $this->paper >= $this->rock)
        return parent::rockChoice();
      else
        return parent::paperChoice();




        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
       // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------           
  }
};
