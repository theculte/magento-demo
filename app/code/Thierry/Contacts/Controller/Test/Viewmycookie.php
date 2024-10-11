<?php
namespace Thierry\Contacts\Controller\Test;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Viewmycookie extends Action
{
    /**
    * @var \Magento\Framework\Stdlib\CookieManagerInterface
    */
    protected $_cookieManager;

    public function __construct(
        Context $context,
        \Magento\Framework\Stdlib\CookieManagerInterface $cookieManager
    )
    {
        $this->_cookieManager = $cookieManager;
        parent::__construct($context);
    }

    public function execute()
    {
        $cookieValue = $this->_cookieManager->getCookie('thierry_contact_age', 0);
        die ('The cookie value defined is : '.$cookieValue);
    }
}