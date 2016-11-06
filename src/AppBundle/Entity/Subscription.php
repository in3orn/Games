<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\SimpleEntity;

/**
 * Subscription
 * 
 * @author inb
 *
 */
class Subscription extends SimpleEntity
{
	
    /**
     * @var integer
     */
    private $vPlayUserId;

    /**
     * @var \AppBundle\Entity\User
     */
    private $user;

    /**
     * @var \AppBundle\Entity\Game
     */
    private $game;


    /**
     * Set vPlayUserId
     *
     * @param integer $vPlayUserId
     *
     * @return Subscription
     */
    public function setVPlayUserId($vPlayUserId)
    {
        $this->vPlayUserId = $vPlayUserId;

        return $this;
    }

    /**
     * Get vPlayUserId
     *
     * @return integer
     */
    public function getVPlayUserId()
    {
        return $this->vPlayUserId;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Subscription
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return Subscription
     */
    public function setGame(\AppBundle\Entity\Game $game = null)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \AppBundle\Entity\Game
     */
    public function getGame()
    {
        return $this->game;
    }
}
