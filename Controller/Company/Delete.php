<?php
namespace Hprasetyou\Company\Controller\Company;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Hprasetyou\Company\Model\CompanyFactory;


class Delete extends Action implements HttpPostActionInterface
{
  protected $request;

  public function __construct(Context $context,
  CompanyFactory $companyFactory,
  array $data = [])
  {
      parent::__construct($context);
      $this->_companyFactory = $companyFactory;
  }
  public function execute() {
    $post = $this->getRequest()->getPostValue();
    $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
    $delete = $this->deleteData($post['id']);
    $resultJson->setData([
      "success" => true
    ]);
    return $resultJson;
  }

  private function deleteData($id){
    $model = $this->_companyFactory->create();
    $model->load($id);
    return $model->delete();
  }

}
