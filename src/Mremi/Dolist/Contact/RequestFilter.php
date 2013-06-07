<?php

namespace Mremi\Dolist\Contact;

/**
 * RequestFilter class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class RequestFilter
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $memberId;

    /**
     * Constructor
     *
     * @param string  $email    The contact email
     * @param integer $memberId The contact identifier
     */
    public function __construct($email = '', $memberId = null)
    {
        $this->email    = $email;
        $this->memberId = $memberId;
    }

    /**
     * Sets the contact email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Gets the contact email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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
     * Gets an array representation
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'Email'    => $this->email,
            'MemberID' => $this->memberId,
        );
    }
}