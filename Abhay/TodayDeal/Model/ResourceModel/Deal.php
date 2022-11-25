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
namespace Abhay\TodayDeal\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Deal extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('today_deal', 'deal_id');
    }
}
