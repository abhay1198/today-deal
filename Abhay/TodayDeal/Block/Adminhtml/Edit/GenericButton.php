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
namespace Abhay\TodayDeal\Block\Adminhtml\Edit;

/**
 * Class GenericButton for buttons.
 */
class GenericButton
{
    /**
     * Url Builder.
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * Registry.
     *
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * Constructor.
     *
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry           $registry
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry
    ) {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }

    /**
     * Return the template Id.
     *
     * @return int|null
     */
    public function getTemplateId()
    {
        return $this->registry->registry('deal_id');
    }

    /**
     * Generate url by route and parameters.
     *
     * @param string $route
     * @param array  $params
     *
     * @return string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}
