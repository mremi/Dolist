<?php

namespace Mremi\Dolist\Authentication;

/**
 * Authentication request interface
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
interface AuthenticationRequestInterface
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
    function getAuthenticationKey();

    /**
     * Gets an array representation
     *
     * @return array
     */
    function toArray();
}