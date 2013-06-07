<?php

namespace Mremi\Dolist\Authentication;

/**
 * Authentication manager interface
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
interface AuthenticationManagerInterface
{
    /**
     * Gets the authentication token context
     *
     * @return AuthenticationTokenContext
     *
     * @throws \SoapFault
     */
    function getAuthenticationTokenContext();
}