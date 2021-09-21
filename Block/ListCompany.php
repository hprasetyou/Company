<?php
namespace Hprasetyou\Company\Block;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template\Context;
use Hprasetyou\Company\Model\CompanyFactory;

class ListCompany extends Template implements BlockInterface
{
  public function __construct(
    Context $context,
    CompanyFactory $companyFactory,
    $data = []
  ){
   $this->_companyFactory = $companyFactory;
   parent::__construct($context, $data);
  }

  public function getCompanies(){
    $companies = $this->_companyFactory->create();
    return $companies->getCollection();
  }
}
