<?php
namespace Thierry\Contacts\Controller\Test;
use Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;

class Translate extends Action
{
    public function __construct(Context $context) {
        parent::__construct($context);
    }

    public function execute()
    {
        echo __('chaine à traduire');
    }
}