<?php

namespace Mremi\Dolist\Authentication;

/**
 * Authentication request class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class AuthenticationRequest
{
    /**
     * @var integer
     */
    private $accountId;

    /**
     * @var string
     */
    private $authenticationKey;

    /**
     * Constructor
     *
     * @param integer $accountId         An account identifier
     * @param string  $authenticationKey An authentication key
     */
    public function __construct($accountId, $authenticationKey)
    {
        $this->accountId         = $accountId;
        $this->authenticationKey = $authenticationKey;
    }

    /**
     * Gets the account identifier
     *
     * @return integer
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * Gets the authentication key
     *
     * @return string
     */
    public function getAuthenticationKey()
    {
        return $this->authenticationKey;
    }

    /**
     * Gets an array representation
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'AccountID'         => $this->accountId,
            'AuthenticationKey' => $this->authenticationKey,
        );
    }
}