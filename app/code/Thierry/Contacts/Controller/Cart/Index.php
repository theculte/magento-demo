<?php
namespace Thierry\Contacts\Controller\Cart;

class Index extends \Magento\Checkout\Controller\Cart\Index
{
    public function execute()
    {
      //die('test cart');
      return parent::execute();
    }
}