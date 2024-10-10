<?php
namespace Thierry\Contacts\Model;

use Magento\Cron\Exception;
use Magento\Framework\Model\AbstractModel;

class Product extends \Magento\Catalog\Model\Product
{
    /**
     * Get product name
     *
     * @return string
     * @codeCoverageIgnoreStart
     */
    public function getName()
    {
        return parent::getName().' SURCHARGE !!';
    }
}
