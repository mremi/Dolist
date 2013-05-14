<?php

namespace Mremi\Dolist\Tests\Contact;

use Mremi\Dolist\Contact\SavedContactInfo;

/**
 * Tests SavedContactInfo class
 *
 * @author Rémi Marseille <marseille.remi@gmail.com>
 */
class SavedContactInfoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests returned codes
     */
    public function testReturnedCodes()
    {
        $saved = new SavedContactInfo('description', 'marseille.remi@gmail.com', 1, SavedContactInfo::CODE_SUCCESS);
        $this->assertTrue($saved->isHandledCode());
        $this->assertTrue($saved->isOk());
        $this->assertFalse($saved->isPending());

        $saved = new SavedContactInfo('description', 'marseille.remi@gmail.com', 1, SavedContactInfo::CODE_PENDING);
        $this->assertTrue($saved->isHandledCode());
        $this->assertFalse($saved->isOk());
        $this->assertTrue($saved->isPending());

        $saved = new SavedContactInfo('description', 'marseille.remi@gmail.com', 1, -2);
        $this->assertFalse($saved->isHandledCode());
        $this->assertFalse($saved->isOk());
        $this->assertFalse($saved->isPending());
    }
}