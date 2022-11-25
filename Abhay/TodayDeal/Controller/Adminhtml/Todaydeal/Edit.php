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

use Abhay\TodayDeal\Controller\Adminhtml\Todaydeal as TodayDealController;
use Magento\Framework\Controller\ResultFactory;

class Edit extends TodayDealController
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        if (!$id) {
            $resultPage->getConfig()->getTitle()->prepend(
                __('New Deal')
            );
        } else {
            $resultPage->getConfig()->getTitle()->prepend(
                __('Edit Deal')
            );
        }
        return $resultPage;
    }
}
