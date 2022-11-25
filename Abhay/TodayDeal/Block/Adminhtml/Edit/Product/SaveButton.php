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

namespace Abhay\TodayDeal\Block\Adminhtml\Edit\Product;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Abhay\TodayDeal\Block\Adminhtml\Edit\GenericButton;

/**
 * Class SaveButton for saving the product.
 */
class SaveButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        $data = [
            'label' => __('Save Deal'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
        return $data;
    }
}
