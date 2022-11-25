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
namespace Abhay\TodayDeal\Model\Config\Source;

class ProductList implements \Magento\Framework\Option\ArrayInterface
{
    protected $_productCollectionFactory;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
    ) {
        $this->_productCollectionFactory = $productCollectionFactory;
    }

    public function toOptionArray()
    {
        $collection = $this->_productCollectionFactory->create();
        $options = [];
        foreach ($collection as $product) {
            $options[] = ['label' => $product->getSku(), 'value' => $product->getId()];
        }
        return $options;
    }

}
