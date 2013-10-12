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

use Mremi\Dolist\Authentication\AuthenticationTokenContext;

/**
 * Tests AuthenticationTokenContext class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class AuthenticationTokenContextTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests the toArray method
     */
    public function testToArray()
    {
        $token = new AuthenticationTokenContext(1, 'fake_key');

        $expected = array(
            'AccountID' => 1,
            'Key'       => 'fake_key',
        );

        $this->assertEquals($expected, $token->toArray());
    }
}
