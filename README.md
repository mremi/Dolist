Dolist library
==============

This library allows you to interact with the API of Dolist CRM.

```php
<?php

use Mremi\Dolist\Api\Authentication\AuthenticationManager;
use Mremi\Dolist\Api\Authentication\AuthenticationRequest;
use Mremi\Dolist\Api\Contact\ContactManager;
use Mremi\Dolist\Api\Contact\FieldManager;

$contactSoapClient = new \SoapClient('http://api.dolist.net/v2/ContactManagementService.svc?wsdl', array(
    'soap_version'       => 1,
    'trace'              => true,
    'connection_timeout' => 2,
));
$authSoapClient = new \SoapClient('http://api.dolist.net/v2/AuthenticationService.svc?wsdl', array(
    'soap_version'       => 1,
    'trace'              => true,
    'connection_timeout' => 2,
));
$authRequest = new AuthenticationRequest('YOUR_ACCOUNT_IDENTIFIER', 'YOUR_AUTHENTICATION_KEY');
$authManager = new AuthenticationManager($authSoapClient, $authRequest, 3);

$contactManager = new ContactManager($contactSoapClient, $authManager, 'Mremi\\Dolist\\Api\\Contact\\Contact', 3);
$fieldManager   = new FieldManager('Mremi\\Dolist\\Api\\Contact\\Field');

$contact = $contactManager->create();
$contact->setEmail('test@example.com');
$contact->addField($fieldManager->create('firstname', 'Firstname'));
$contact->addField($fieldManager->create('lastname', 'Lastname'));

$ticket = $contactManager->save($contact);

$saved = $contactManager->getStatusByTicket($ticket);

if ($saved->isOk()) {
    // contact has been saved...
} else {
    // something is wrong...
    echo sprintf('%s %s', $saved->getReturnCode(), $saved->getDescription());
}
```