<?php

namespace Mremi\Dolist\Tests\Contact;

use Mremi\Dolist\Contact\Contact;
use Mremi\Dolist\Contact\Field;

/**
 * Tests Contact class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class ContactTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests the toArray method
     */
    public function testToArray()
    {
        $contact = new Contact;
        $contact->setEmail('marseille.remi@gmail.com');
        $contact->addField(new Field('firstname', 'Rémi'));
        $contact->addField(new Field('lastname', 'Marseille'));
        $contact->setInterestsToAdd(array(1, 2));
        $contact->setInterestsToDelete(array(3, 4));
        $contact->setOptoutEmail(1);
        $contact->setOptoutMobile(1);

        $expected = array(
            'Email'             => 'marseille.remi@gmail.com',
            'Fields'            => array(
                array('Name' => 'firstname', 'Value' => 'Rémi'),
                array('Name' => 'lastname',  'Value' => 'Marseille')
            ),
            'InterestsToAdd'    => array(1, 2),
            'InterestsToDelete' => array(3, 4),
            'OptoutEmail'       => 1,
            'OptoutMobile'      => 1,
        );

        $this->assertEquals($expected, $contact->toArray());
    }
}