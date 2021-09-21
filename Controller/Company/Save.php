<?php
namespace Hprasetyou\Company\Controller\Company;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Hprasetyou\Company\Model\CompanyFactory;


class Save extends Action implements HttpPostActionInterface
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
    $saved = $this->saveData([
      'name' => $post['name'],
      'phonenumber' => $post['phonenumber']
    ],$post['company_id']);
    $resultJson->setData([
      "saved" => $saved
    ]);
    return $resultJson;
  }

  private function saveData($data, $id = null){
    $model = $this->_companyFactory->create();
    if($id){
      $model = $model->load($id);
    }
    foreach ($data as $key => $value) {
      $model->setData($key, $value);
    }

    $model->save();
    return $model->getCompanyId();
  }

}
