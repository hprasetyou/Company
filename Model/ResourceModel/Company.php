<?php
namespace Hprasetyou\Company\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Company extends AbstractDb
{

	public function __construct(
		Context $context
	)
	{
		parent::__construct($context);
	}

	protected function _construct()
	{
		$this->_init('hprasetyou_company_company', 'company_id');
	}

}
