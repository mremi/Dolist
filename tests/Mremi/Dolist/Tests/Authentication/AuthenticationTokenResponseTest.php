<?php

/*
 * This file is part of the Mremi\Dolist library.
 *
 * (c) Rémi Marseille <marseille.remi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mremi\Dolist\Tests\Authentication;

use Mremi\Dolist\Authentication\AuthenticationTokenResponse;

/**
 * Tests AuthenticationTokenResponse class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class AuthenticationTokenResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests the isDeprecated method
     */
    public function testIsDeprecated()
    {
        $token = new AuthenticationTokenResponse(new \DateTime('-1 day'), 'fake_key');
        $this->assertTrue($token->isDeprecated());

        $token = new AuthenticationTokenResponse(new \DateTime('+1 day'), 'fake_key');
        $this->assertFalse($token->isDeprecated());
    }
}
