<?php

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