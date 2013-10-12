<?php

/*
 * This file is part of the Mremi\Dolist library.
 *
 * (c) Rémi Marseille <marseille.remi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mremi\Dolist\Authentication;

/**
 * Authentication token context class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class AuthenticationTokenContext
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
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Gets an array representation
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'AccountID' => $this->accountId,
            'Key'       => $this->key,
        );
    }
}
