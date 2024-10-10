<?php
namespace Thierry\Contacts\Controller\Adminhtml\Test;

use Magento\Backend\App\Action;
use Thierry\Contacts\Model\Contact;

class MassDelete extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $ids = $this->getRequest()->getParam('selected', []);
        if (!is_array($ids) || !count($ids)) {
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', ['_current' => true]);
        }
        foreach ($ids as $id) {
            if ($contact = $this->_objectManager->create(Contact::class)->load($id)) {
                $contact->delete();
            }
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', count($ids)));

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', ['_current' => true]);
    }
}
