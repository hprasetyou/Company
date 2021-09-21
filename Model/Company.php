<?php
namespace Hprasetyou\Company\Model;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

class Company extends AbstractModel implements IdentityInterface
{
	const CACHE_TAG = 'hprasetyou_company_company';

	protected $_cacheTag = 'hprasetyou_company_company';

	protected $_eventPrefix = 'hprasetyou_company_company';

	protected function _construct()
	{
		$this->_init('Hprasetyou\Company\Model\ResourceModel\Company');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
