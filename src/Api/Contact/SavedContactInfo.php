<?php

namespace Mremi\Dolist\Api\Contact;

/**
 * Saved contact info class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class SavedContactInfo implements SavedContactInfoInterface
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $memberId;

    /**
     * @var integer
     */
    private $returnCode;

    /**
     * Constructor
     *
     * @param string  $description A description
     * @param string  $email       An email address
     * @param integer $memberId    A member identifier
     * @param integer $returnCode  The returned code
     */
    public function __construct($description, $email, $memberId, $returnCode)
    {
        $this->description = $description;
        $this->email       = $email;
        $this->memberId    = $memberId;
        $this->returnCode  = $returnCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * {@inheritdoc}
     */
    public function getReturnCode()
    {
        return $this->returnCode;
    }

    /**
     * {@inheritdoc}
     */
    public function isOk()
    {
        return self::CODE_SUCCESS === $this->returnCode;
    }

    /**
     * {@inheritdoc}
     */
    public function isPending()
    {
        return self::CODE_PENDING === $this->returnCode;
    }
}