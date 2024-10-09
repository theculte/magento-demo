<?php
namespace Thierry\Contacts\Model\Contact;
use Thierry\Contacts\Model\ResourceModel\Contact\CollectionFactory;
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $contactCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $contactCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $contactCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->data)) {
            return $this->data;
        }

        $items = $this->collection->getItems();
        $this->data = array();
        /** @var Contact $contact */
        foreach ($items as $contact) {
            // notre fieldset s'apelle "contact" d'ou ce tableau pour que magento puisse retrouver ses datas :
            $this->data[$contact->getId()]['contact'] = $contact->getData();
        }


        return $this->data;

    }
}