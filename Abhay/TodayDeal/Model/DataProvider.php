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
namespace Abhay\TodayDeal\Model;

use Abhay\TodayDeal\Model\ResourceModel\Deal\CollectionFactory;
use Magento\Framework\Session\SessionManagerInterface;

/**
 * Class DataProvider for product form
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $_loadedData;

    /**
     * @var SessionManagerInterface
     */
    private $session;
 
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $productCollectionFactory,
        SessionManagerInterface $session,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $productCollectionFactory->create();
        $this->session = $session;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
 
    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $product) {

            $result['product_data'] = $product->getData();
            // echo "<pre>";
            // print_r( $this->_loadedData[$product->getDealId()]["product_id"]);
            // die;
           
            $this->_loadedData[$product->getDealId()] = $result;
            // $this->_loadedData[$product->getDealId()]['product_data']["product_id"] = $result;
    
        }
        return $this->_loadedData;
    }
}
