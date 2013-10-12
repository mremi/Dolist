<?php

/*
 * This file is part of the Mremi\Dolist library.
 *
 * (c) Rémi Marseille <marseille.remi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mremi\Dolist\Contact;

/**
 * Interest class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class Interest
{
    /**
     * @var InterestGroup
     */
    private $group;

    /**
     * @var \DateTime
     */
    private $interestDate;

    /**
     * @var InterestValue
     */
    private $value;

    /**
     * Sets the group
     *
     * @param InterestGroup $group
     */
    public function setGroup(InterestGroup $group)
    {
        $this->group = $group;
    }

    /**
     * Gets the group
     *
     * @return InterestGroup
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Sets the subscription date
     *
     * @param \DateTime $interestDate
     */
    public function setInterestDate(\DateTime $interestDate)
    {
        $this->interestDate = $interestDate;
    }

    /**
     * Gets the subscription date
     *
     * @return \DateTime
     */
    public function getInterestDate()
    {
        return $this->interestDate;
    }

    /**
     * Sets the interest
     *
     * @param InterestValue $value
     */
    public function setValue(InterestValue $value)
    {
        $this->value = $value;
    }

    /**
     * Gets the interest
     *
     * @return InterestValue
     */
    public function getValue()
    {
        return $this->value;
    }
}
