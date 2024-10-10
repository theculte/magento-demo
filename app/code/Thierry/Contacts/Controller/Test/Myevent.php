<?php
namespace Thierry\Contacts\Controller\Test;

use Magento\Framework\App\Action\Action;

class Myevent extends Action
{
    public function execute()
    {

        $this->_eventManager->dispatch('thierry_contacts_event_test');
        die('test');
    }
}
