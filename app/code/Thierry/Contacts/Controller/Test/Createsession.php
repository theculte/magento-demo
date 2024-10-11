<?php
namespace Thierry\Contacts\Controller\Test;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Createsession extends Action
{
    /**
     * @var  \Magento\Catalog\Model\Session
     */
    protected $_catalogSession;

    public function __construct(
        Context $context,
        \Magento\Catalog\Model\Session $catalogSession
    )
    {
        $this->_catalogSession = $catalogSession;
        parent::__construct($context);
    }

    public function execute()
    {
        echo 'I create my session value for Masupervar:<br />';
        $this->_catalogSession->setMasupervar('Thierry');
        echo '- value : '.$this->_catalogSession->getMasupervar().'<br /><br />';

        echo 'I edit my session value for Masupervar:<br />';
        $this->_catalogSession->setMasupervar('Thierry Verschu');
        echo '- value : '.$this->_catalogSession->getMasupervar().'<br /><br />';

        echo 'I delete my session value for Masupervar:<br />';
        $this->_catalogSession->unsMasupervar();
        echo '- value : '.$this->_catalogSession->getMasupervar().'<br /><br />';
    }
}