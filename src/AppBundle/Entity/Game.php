<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\SimpleEntity;

/**
 * Game
 * 
 * @author inb
 *
 */
class Game extends SimpleEntity
{
	
    /**
     * @var integer
     */
    private $vPlayId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subscriptions;
    
    /**
     * @var integer
     */
    private $subscriptionsCount;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subscriptions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set vPlayId
     *
     * @param integer $vPlayId
     *
     * @return Game
     */
    public function setVPlayId($vPlayId)
    {
        $this->vPlayId = $vPlayId;

        return $this;
    }

    /**
     * Get vPlayId
     *
     * @return integer
     */
    public function getVPlayId()
    {
        return $this->vPlayId;
    }

    /**
     * Add subscription
     *
     * @param \AppBundle\Entity\Subscription $subscription
     *
     * @return Game
     */
    public function addSubscription(\AppBundle\Entity\Subscription $subscription)
    {
        $this->subscriptions[] = $subscription;

        return $this;
    }

    /**
     * Remove subscription
     *
     * @param \AppBundle\Entity\Subscription $subscription
     */
    public function removeSubscription(\AppBundle\Entity\Subscription $subscription)
    {
        $this->subscriptions->removeElement($subscription);
    }

    /**
     * Get subscriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }
    
    /**
     * Set subscriptionsCount
     *
     * @param integer $subscriptionsCount
     *
     * @return Game
     */
    public function setSubscriptionsCount($subscriptionsCount)
    {
    	$this->subscriptionsCount = $subscriptionsCount;
    
    	return $this;
    }
    
    /**
     * Get subscriptionsCount
     *
     * @return integer
     */
    public function getSubscriptionsCount()
    {
    	return $this->subscriptionsCount;
    }
}
