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
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
 
class Index extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Abhay_TodayDeal::todaydeal');
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /**
        * @var \Magento\Backend\Model\View\Result\Page $resultPage 
        */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Abhay_TodayDeal::todaydeal');
        $resultPage->getConfig()->getTitle()->prepend(__('Today Deal'));

        return $resultPage;
    }
}
