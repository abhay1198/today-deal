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

class NewAction extends TodayDealController
{
    /**
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        /**
        * @var \Magento\Backend\Model\View\Result\Forward $resultForward 
        */
        $resultForward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
        $resultForward->forward('edit');
        return $resultForward;
    }
}

