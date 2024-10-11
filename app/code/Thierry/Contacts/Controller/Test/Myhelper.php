<?php
namespace Thierry\Contacts\Controller\Test;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Myhelper extends Action
{
    protected $_myHelper;

    /**
     * @param \Thierry\Contacts\Helper\Myhelper $helperData
     */
    public function __construct(
        Context $context,
        \Thierry\Contacts\Helper\Myhelper $helper
    ) {
        $this->_myHelper = $helper;
        parent::__construct($context);
    }

    public function execute()
    {
        $nbr = 49;
        echo $nbr.' fois 2 = '.$this->_myHelper->foisdeux($nbr);
    }
}