<?php

namespace Mremi\Dolist\Api\Authentication;

/**
 * Authentication token response interface
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
interface AuthenticationTokenResponseInterface
{
    /**
     * Gets the end date of validity
     *
     * @return \DateTime
     */
    function getDeprecatedDate();

    /**
     * Gets the token key
     *
     * @return string
     */
    function getKey();

    /**
     * Returns TRUE whether this token is deprecated
     *
     * @return boolean
     */
    function isDeprecated();
}