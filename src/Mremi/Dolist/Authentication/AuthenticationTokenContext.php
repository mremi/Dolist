<?php

namespace Mremi\Dolist\Authentication;

/**
 * Authentication token context class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class AuthenticationTokenContext implements AuthenticationTokenContextInterface
{
    /**
     * @var integer
     */
    private $accountId;

    /**
     * @var string
     */
    private $key;

    /**
     * Constructor
     *
     * @param integer $accountId An account identifier
     * @param string  $key       An authentication key
     */
    public function __construct($accountId, $key)
    {
        $this->accountId = $accountId;
        $this->key       = $key;
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
    public function getKey()
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return array(
            'AccountID' => $this->accountId,
            'Key'       => $this->key,
        );
    }
}