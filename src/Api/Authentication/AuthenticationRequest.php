<?php

namespace Mremi\Dolist\Api\Authentication;

/**
 * Authentication request class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class AuthenticationRequest implements AuthenticationRequestInterface
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
     * {@inheritdoc}
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthenticationKey()
    {
        return $this->authenticationKey;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return array(
            'AccountID'         => $this->accountId,
            'AuthenticationKey' => $this->authenticationKey,
        );
    }
}