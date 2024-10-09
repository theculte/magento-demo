<?php

namespace Thierry\Contacts\Model\ResourceModel\Contact;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Contact Resource Model Collection
 *
 * @author      tverschu
 */
class Collection extends AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Thierry\Contacts\Model\Contact', 'Thierry\Contacts\Model\ResourceModel\Contact');
    }
}