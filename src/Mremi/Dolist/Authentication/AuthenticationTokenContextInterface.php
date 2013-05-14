<?php

namespace Mremi\Dolist\Authentication;

/**
 * Authentication token context interface
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
interface AuthenticationTokenContextInterface
{
    /**
     * Gets the account identifier
     *
     * @return integer
     */
    function getAccountId();

    /**
     * Gets the authentication key
     *
     * @return string
     */
    function getKey();

    /**
     * Gets an array representation
     *
     * @return array
     */
    function toArray();
}