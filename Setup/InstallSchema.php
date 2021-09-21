<?php
namespace Hprasetyou\Company\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
	  {
		    $installer = $setup;
        $installer->startSetup();
    		$installer = $this->create_instagram_post_table($installer,$setup);
    		$installer->endSetup();
    }

    private function create_instagram_post_table($installer, $setup){
		$tbName = 'hprasetyou_company_company';
		if (!$installer->tableExists($tbName)) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable($tbName)
			)
				->addColumn(
					'company_id',
					Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'Company ID'
				)
				->addColumn(
					'name',
					Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Name'
				)
				->addColumn(
					'phonenumber',
					Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Phone Number'
				)
				->addColumn(
						'created_at',
						Table::TYPE_TIMESTAMP,
						null,
						['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
						'Created At'
				)->addColumn(
					'updated_at',
					Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
					'Updated At')
				->setComment('Company Master');
			     $installer->getConnection()->createTable($table);
        }
        return $installer;
    }

}
