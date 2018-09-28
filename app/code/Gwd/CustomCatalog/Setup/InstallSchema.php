<?php


namespace Gwd\CustomCatalog\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $table_gwd_customcatalog_gwcatalog = $setup->getConnection()->newTable($setup->getTable('gwd_customcatalog_gwcatalog'));

        $table_gwd_customcatalog_gwcatalog->addColumn(
            'gwcatalog_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,],
            'Entity ID'
        );

        $table_gwd_customcatalog_gwcatalog->addColumn(
            'content',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'content'
        );

        $setup->getConnection()->createTable($table_gwd_customcatalog_gwcatalog);
    }
}
