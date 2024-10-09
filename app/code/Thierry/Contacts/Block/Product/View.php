<?php
namespace Thierry\Contacts\Block\Product;

class View extends \Magento\Catalog\Block\Product\View
{
    /**
     * Retrieve current product model
     *
     * @return \Magento\Catalog\Model\Product
     */
    public function getProduct()
    {
        return parent::getProduct();
    }
}