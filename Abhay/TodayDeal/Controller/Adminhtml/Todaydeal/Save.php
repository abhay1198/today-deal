<?php
/**
 * Abhay
 * 
 * PHP version 7
 * 
 * @category  Abhay
 * @package   Abhay_TodayDeal
 * @author    Abhay Agrawal <abhay@gmail.com>
 * @copyright 2022 Copyright © Abhay
 * @license   See COPYING.txt for license details.
 * @link      https://github.com/abhay1198/today-deal
 */
namespace Abhay\TodayDeal\Controller\Adminhtml\Todaydeal;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Backend\App\Action;

class Save extends \Magento\Backend\App\Action
{
    protected $_deal;
    /**
     * @param Action\Context                     $context
     * @param \Abhay\TodayDeal\Model\DealFactory $dealFactory
     */
    public function __construct(
        Action\Context $context,
        \Abhay\TodayDeal\Model\DealFactory $dealFactory
    ) {
        $this->_deal = $dealFactory;
        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Abhay_TodayDeal::todaydeal');
    }

    /**
     * Save action.
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $time = date('Y-m-d H:i:s');
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getParams();
        $dealProductData = $data['product_data'];

        $discountAmount = $dealProductData['discount_amount'];
        $dateFrom = $dealProductData['date_from'];
        $dateTo = $dealProductData['date_to'];
        $status = $dealProductData['status'];
        $productId = $dealProductData['data']['product_id'];

        if ($data) {
            $id = (int) $this->getRequest()->getParam('deal_id');
            $model = $this->_deal->create();
            $data['updated_at'] = $time;
            if ($id) {
                $data['discount_amount'] = $discountAmount;
                $data['date_from'] = $dateFrom;
                $data['date_to'] = $dateTo;
                $data['status'] = $status;
                $data['product_id'] = $productId;
                $model->addData($data)->setId($id)->save();
            } else {
                unset($data['deal_id']);
                $data['discount_amount'] = $discountAmount;
                $data['date_from'] = $dateFrom;
                $data['date_to'] = $dateTo;
                $data['status'] = $status;
                $data['product_id'] = $productId;
                $data['created_at'] = $time;
                $model->setData($data)->save();
            }
        }
        $this->messageManager->addSuccess(__('Deal saved successfully.'));
        return $resultRedirect->setPath('*/*/');
    }
}
