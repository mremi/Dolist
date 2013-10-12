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
 * ContactData class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class ContactData
{
    /**
     * @var array
     */
    private $customFields;

    /**
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $error;

    /**
     * @var array
     */
    private $interests;

    /**
     * @var integer
     */
    private $memberId;

    /**
     * @var integer
     */
    private $optoutEmail;

    /**
     * @var integer
     */
    private $optoutMobile;

    /**
     * @var boolean
     */
    private $readOnly;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $subscribeDate;

    /**
     * @var \DateTime
     */
    private $unsubscribeDate;

    /**
     * @var \DateTime
     */
    private $updateDate;

    /**
     * Adds the given custom field to the custom fields collection
     *
     * @param CustomField $customField
     */
    public function addCustomField(CustomField $customField)
    {
        $this->customFields[] = $customField;
    }

    /**
     * Gets the custom fields
     *
     * @return array
     */
    public function getCustomFields()
    {
        return $this->customFields;
    }

    /**
     * Gets the email address
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Sets the email address
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the count of errors
     *
     * @param integer $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * Gets the count of errors
     *
     * @return integer
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Adds the given interest to the interests collection
     *
     * @param Interest $interest
     */
    public function addInterest(Interest $interest)
    {
        $this->interests[] = $interest;
    }

    /**
     * Gets the interests
     *
     * @return array
     */
    public function getInterests()
    {
        return $this->interests;
    }

    /**
     * Sets the contact identifier
     *
     * @param integer $memberId
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;
    }

    /**
     * Gets the contact identifier
     *
     * @return integer
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * Sets the optout email
     *
     * @param integer $optoutEmail
     */
    public function setOptoutEmail($optoutEmail)
    {
        $this->optoutEmail = $optoutEmail;
    }

    /**
     * Gets the optout email
     *
     * @return integer
     */
    public function getOptoutEmail()
    {
        return $this->optoutEmail;
    }

    /**
     * Sets the optout mobile
     *
     * @param integer $optoutMobile
     */
    public function setOptoutMobile($optoutMobile)
    {
        $this->optoutMobile = $optoutMobile;
    }

    /**
     * Gets the optout mobile
     *
     * @return integer
     */
    public function getOptoutMobile()
    {
        return $this->optoutMobile;
    }

    /**
     * Sets the readonly flag
     *
     * @param boolean $readOnly
     */
    public function setReadOnly($readOnly)
    {
        $this->readOnly = (boolean) $readOnly;
    }

    /**
     * Gets the readonly flag which indicates if the optout is updatable and if the deletion is allowed
     *
     * @return boolean
     */
    public function getReadOnly()
    {
        return $this->readOnly;
    }

    /**
     * Sets the contact status
     *
     * @param integer $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Gets the contact status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the subscription date
     *
     * @param \DateTime $subscribeDate
     */
    public function setSubscribeDate(\DateTime $subscribeDate)
    {
        $this->subscribeDate = $subscribeDate;
    }

    /**
     * Gets the subscription date
     *
     * @return \DateTime
     */
    public function getSubscribeDate()
    {
        return $this->subscribeDate;
    }

    /**
     * Sets the unsubscription date
     *
     * @param \DateTime $unsubscribeDate
     */
    public function setUnsubscribeDate(\DateTime $unsubscribeDate)
    {
        $this->unsubscribeDate = $unsubscribeDate;
    }

    /**
     * Gets the unsubscription date
     *
     * @return \DateTime
     */
    public function getUnsubscribeDate()
    {
        return $this->unsubscribeDate;
    }

    /**
     * Sets the update date
     *
     * @param \DateTime $updateDate
     */
    public function setUpdateDate(\DateTime $updateDate)
    {
        $this->updateDate = $updateDate;
    }

    /**
     * Gets the update date
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }
}
