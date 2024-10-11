<?php
namespace Thierry\Contacts\Controller\Test;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Mycookie extends Action
{

    public function __construct(
        Context $context,
        protected \Magento\Framework\Stdlib\CookieManagerInterface $_cookieManager,
        protected \Magento\Framework\Stdlib\Cookie\CookieMetadataFactory $_cookieMetadataFactory
    )
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $metadata = $this->_cookieMetadataFactory
            ->createPublicCookieMetadata()
            ->setDuration(3600); //1H


        $this->_cookieManager->setPublicCookie(
            'thierry_contact_age',
            42,
            $metadata
        );

        echo ('The cookies has been defined');
    }
}
