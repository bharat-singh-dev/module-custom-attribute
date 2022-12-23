<?php
/**
 * @category  CustomAttribute
 * @package   SixtySeven_CustomAttribute
 */
namespace SixtySeven\CustomAttribute\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

        $installer = $setup;
        $installer->startSetup();
        // Get tutorial_simplenews table
        $CustomAttribute = $installer->getTable('catalog_eav_attribute');

        // Check if the table already exists
        if ($installer->getConnection()->isTableExists($CustomAttribute) == true) { 
     $installer->getConnection()->addColumn($CustomAttribute,
                'attribute_description',
                [
                    'type'=>\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length'=>255,
                    'nullable' => true,
                    'default' => null,
                    'comment'=>'attribute_description'
                ]
            );
        }

        $installer->endSetup();
    }
}
