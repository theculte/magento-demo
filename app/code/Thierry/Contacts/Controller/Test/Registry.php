<?php
namespace Thierry\Contacts\Controller\Test;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Registry extends Action
{
    
    public function __construct(
        Context $context,
        protected \Magento\Framework\Registry $_registry
    )
    {
        parent::__construct($context);
    }

    public function execute()
    {
        echo 'I create my registry value for MyVar:<br />';
        $this->_registry->register('myVar','Thierry');
        echo '- value : '.$this->_registry->registry('myVar').'<br /><br />';

        echo 'I edit my registry value for MyVar:<br />';
        $this->_registry->unregister('myVar');
        $this->_registry->register('myVar','Thierry Verschu');
        echo '- value : '.$this->_registry->registry('myVar').'<br /><br />';

        echo 'I delete my registry value for MyVar:<br />';
        $this->_registry->unregister('myVar');
        echo '- value : '.$this->_registry->registry('myVar').'<br /><br />';
    }
} 