<?php
namespace Thierry\Contacts\Helper;

class Data extends \Magento\Catalog\Helper\Data
{
    public function getProduct()
    {
        return parent::getProduct();
        //die('rewrite helper');
        //return $this->_coreRegistry->registry('current_product');
    }
}
