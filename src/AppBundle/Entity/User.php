<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 * 
 * @author inb
 *
 */
class User extends BaseUser
{
	const ROLE_EDITOR = 'ROLE_EDITOR';
	const ROLE_ADMIN = 'ROLE_ADMIN';
    
	
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subscriptions;

    /**
     * @var \
     */
    private $code;

    /**
     * Add subscription
     *
     * @param \AppBundle\Entity\Subscription $subscription
     *
     * @return User
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
     * Set code
     *
     * @param  $code
     *
     * @return User
     */
    public function setCode($code = null)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return 
     */
    public function getCode()
    {
        return $this->code;
    }
}
