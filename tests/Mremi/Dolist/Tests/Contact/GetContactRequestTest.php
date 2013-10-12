<?php

/*
 * This file is part of the Mremi\Dolist library.
 *
 * (c) Rémi Marseille <marseille.remi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mremi\Dolist\Tests\Contact;

use Mremi\Dolist\Contact\GetContactRequest;
use Mremi\Dolist\Contact\RequestFilter;

/**
 * Tests GetContactRequest class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class GetContactRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests the toArray method
     */
    public function testToArray()
    {
        $request = new GetContactRequest;
        $request->setRequestFilter(new RequestFilter('marseille.remi@gmail.com'));

        $expected = array(
            'AllFields'        => true,
            'Interest'         => true,
            'LastModifiedOnly' => false,
            'Offset'           => 0,
            'RequestFilter'    => array('Email' => 'marseille.remi@gmail.com', 'MemberID' => null),
            'ReturnFields'     => array(),
        );

        $this->assertEquals($expected, $request->toArray());
    }
}
