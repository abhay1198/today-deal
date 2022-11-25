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
namespace Abhay\TodayDeal\Controller\Adminhtml;
 
use Magento\Backend\App\Action;

abstract class Todaydeal extends \Magento\Backend\App\Action
{
    /**
     * Check for is allowed
     *
     * @return boolean
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Abhay_TodayDeal::todaydeal');
    }
}
