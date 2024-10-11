<?php
namespace Thierry\Contacts\Controller\Test;
use Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;

class Myconfig extends Action
{
    protected $_myHelper;
    protected $_scopeConfig;

    /**
     * @param \Thierry\Contacts\Helper\Myhelper $helperData
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context $context,
        \Thierry\Contacts\Helper\Myhelper $helper,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->_myHelper = $helper;
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    public function execute()
    {
        echo $this->_scopeConfig->getValue('thierry_contacts/contact/title', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}