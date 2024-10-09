<?php
namespace Thierry\Contacts\Controller\Test;
class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
       /* $contactModel = $this->_objectManager->create('Thierry\Contacts\Model\Contact');
        $collection = $contactModel->getCollection()->addFieldToFilter('name', array('like'=> '%aul%'));
        foreach($collection as $contact) {
            var_dump($contact->getData());
        }        
        die('test');*/
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}