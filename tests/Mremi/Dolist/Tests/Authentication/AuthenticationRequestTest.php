<?php

namespace Mremi\Dolist\Tests\Authentication;

use Mremi\Dolist\Authentication\AuthenticationRequest;

/**
 * Tests AuthenticationRequest class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class AuthenticationRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests the toArray method
     */
    public function testToArray()
    {
        $request = new AuthenticationRequest(1, 'fake_key');

        $expected = array(
            'AccountID'         => 1,
            'AuthenticationKey' => 'fake_key',
        );

        $this->assertEquals($expected, $request->toArray());
    }
}