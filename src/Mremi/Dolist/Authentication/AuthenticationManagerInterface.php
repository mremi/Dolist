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
    public function getAuthenticationTokenContext();
}
