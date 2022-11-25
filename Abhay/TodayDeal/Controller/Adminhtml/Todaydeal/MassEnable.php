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

use Magento\Backend\App\Action;
use Magento\TestFramework\ErrorLog\Logger;
use Magento\Ui\Component\MassAction\Filter;

class MassEnable extends \Magento\Backend\App\Action
{
    protected $_filter;
    protected $_deal;

    public function __construct(
        \Magento\Ui\Component\MassAction\Filter $filter,
        Action\Context $context,
        \Abhay\TodayDeal\Model\DealFactory $dealFactory
    ) {
        $this->_filter = $filter;
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
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $dealModel = $this->_deal->create();
        $collection = $this->_filter->getCollection($dealModel->getCollection());
        foreach ($collection as $deal) {
            $deal->setStatus(1);
            $deal->save();
        }
        $this->messageManager->addSuccess(__('Product(s) enabled successfully.'));
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/');
    }
}
