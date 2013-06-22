<?php

namespace Mremi\Dolist\Contact;

/**
 * Saved contact info class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class SavedContactInfo
{
    /**
     * Possible returned codes
     */
    const CODE_PENDING                     = -1; // waiting for treatment
    const CODE_ERROR                       = 0;  // error during contact update
    const CODE_SUCCESS                     = 1;  // success
    const CODE_UNAUTHORIZED_EMAIL          = 2;  // email is not authorized
    const CODE_EMAIL_ALREADY_EXIST         = 4;  // new email already exists
    const CODE_UNAUTHORIZED_OPTOUT_EMAIL   = 5;  // update of optout email is not authorized
    const CODE_UNAUTHORIZED_OPTOUT_MOBILE  = 6;  // update of optout mobile is not authorized
    const CODE_ERROR_ON_INTEREST_TO_ADD    = 7;  // error during the addition of an interest
    const CODE_ERROR_ON_INTEREST_TO_DELETE = 8;  // error during the suppression of an interest

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
     * Gets the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Gets the email address
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Gets the member identifier
     *
     * @return integer
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * Gets the returned code
     *
     * @return integer
     */
    public function getReturnCode()
    {
        return $this->returnCode;
    }

    /**
     * Gets an array of handled codes
     *
     * @return array
     */
    public function getHandledCodes()
    {
        return array(
            self::CODE_PENDING                     => 'pending',
            self::CODE_ERROR                       => 'error',
            self::CODE_SUCCESS                     => 'success',
            self::CODE_UNAUTHORIZED_EMAIL          => 'unauthorized email',
            self::CODE_EMAIL_ALREADY_EXIST         => 'email already exist',
            self::CODE_UNAUTHORIZED_OPTOUT_EMAIL   => 'unauthorized optout email',
            self::CODE_UNAUTHORIZED_OPTOUT_MOBILE  => 'unauthorized optout mobile',
            self::CODE_ERROR_ON_INTEREST_TO_ADD    => 'error on interest to add',
            self::CODE_ERROR_ON_INTEREST_TO_DELETE => 'error on interest to delete',
        );
    }

    /**
     * Returns TRUE whether the returned code is handled
     *
     * @return boolean
     */
    public function isHandledCode()
    {
        return array_key_exists($this->returnCode, $this->getHandledCodes());
    }

    /**
     * Returns TRUE whether the returned code is success
     *
     * @return boolean
     */
    public function isOk()
    {
        return self::CODE_SUCCESS === $this->returnCode;
    }

    /**
     * Returns TRUE whether the returned code is pending
     *
     * @return boolean
     */
    public function isPending()
    {
        return self::CODE_PENDING === $this->returnCode;
    }
}
