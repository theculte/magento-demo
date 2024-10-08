<?php
namespace Thierry\Contacts\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Catalog\Model\ResourceModel\Product\Gallery;
use Magento\Catalog\Model\Product\Attribute\Backend\Media\ImageEntryConverter;

/**
 * Upgrade the Catalog module DB scheme
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '0.2.0', '<')) {

            if (!$setup->getConnection()->isTableExists($setup->getTable('thierry_contacts'))) {
                $table = $setup->getConnection()
                    ->newTable($setup->getTable('thierry_contacts'))
                    ->addColumn(
                        'thierry_contacts_id',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        null,
                        ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                        'Contacts ID'
                    )
                    ->addColumn(
                        'name',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        100,
                        ['nullable' => false, 'default' => 'simple'],
                        'Name'
                    )
                    ->addColumn(
                        'email',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        100,
                        ['nullable' => false, 'default' => 'simple'],
                        'Email'
                    )
                    ->setComment('Thierry Contacts Table')
                    ->setOption('type', 'InnoDB')
                    ->setOption('charset', 'utf8');
    
                $setup->getConnection()->createTable($table);
            }
        }
        if (version_compare($context->getVersion(), '0.3.0', '<')) {

            $tableName = $setup->getTable('thierry_contacts');
            $setup->getConnection()->addColumn($tableName, 'comment', [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length'    => 255,
                'unsigned' => true,
                'nullable' => false,
                'default' => '0',
                'comment' => 'Comment'
            ]);
        }
        $setup->endSetup();
    }
}