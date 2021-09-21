<?php
namespace Hprasetyou\Company\Model\ResourceModel\Company;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
	protected $_idFieldName = 'company_id';
	protected $_eventPrefix = 'hprasetyou_company_company';
	protected $_eventObject = 'hprasetyou_company_company';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Hprasetyou\Company\Model\Company', 'Hprasetyou\Company\Model\ResourceModel\Company');
	}

}
