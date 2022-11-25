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
namespace Abhay\TodayDeal\Model\ResourceModel\Deal\Grid;

use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Search\AggregationInterface;
use Abhay\TodayDeal\Model\ResourceModel\Deal\Collection as DealCollection;
use Magento\Framework\Data\Collection\EntityFactoryInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Collection extends DealCollection implements SearchResultInterface
{
    public function __construct(
        EntityFactoryInterface $entityFactory,
        LoggerInterface $logger,
        FetchStrategyInterface $fetchStrategy,
        ManagerInterface $eventManager,
        $mainTable,
        $resourceModel,
        \Magento\Eav\Model\ResourceModel\Entity\Attribute $entityAttribute,
        $model = \Magento\Framework\View\Element\UiComponent\DataProvider\Document::class,
        \Magento\Framework\DB\Adapter\AdapterInterface $connection = null,
        AbstractDb $resource = null
    ) {
        parent::__construct(
            $entityFactory,
            $logger,
            $fetchStrategy,
            $eventManager,
            $connection,
            $resource
        );
        $this->_init($model, $resourceModel);
        $this->setMainTable($mainTable);
        $this->entityAttribute = $entityAttribute;
    }

    public function getAggregations()
    {
        return $this->aggregations;
    }

    public function setAggregations($aggregations)
    {
        $this->aggregations = $aggregations;
    }

    public function getSearchCriteria()
    {
        return null;
    }
    
    public function setSearchCriteria(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null
    ) {
        return $this;
    }

    public function getTotalCount()
    {
        return $this->getSize();
    }

    public function setTotalCount($totalCount)
    {
        return $this;
    }

    public function setItems(array $items = null)
    {
        return $this;
    }

    protected function _initSelect()
    {
        $this->addFilterToMap("product_name", "cpev.value");

        parent::_initSelect();
    }

    /**
     * Join store relation table if there is store filter
     *
     * @return void
     */
    protected function _renderFiltersBefore()
    {
        $eavAttribute = $this->entityAttribute;
        $i = 0;
        $proAttrId = $eavAttribute->getIdByCode("catalog_product", "name");
        $catalogProductEntityVarchar = $this->getTable('catalog_product_entity_varchar');
        $this->getSelect()->join(
            $catalogProductEntityVarchar.' as cpev',
            'main_table.product_id = cpev.row_id',
            ["product_name" => "value"]
        )->where("cpev.attribute_id = ".$proAttrId);
        parent::_renderFiltersBefore();
    }

}
