<?php

declare(strict_types=1);

/*
 * (c) Lucas van Staden <sales@proxiblue.com.au>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace ProxiBlue\HyvaQtyInput\ViewModel;

use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class ProductView implements ArgumentInterface
{
    /**
     * Although depricated, magento core is still using this: Magento\Catalog\Block\Product\AbstractProduct
     *
     * @var \Magento\CatalogInventory\Api\StockRegistryInterface
     */
    protected $stockRegistry;

    /**
     * ProductView constructor.
     *
     * @param StockRegistryInterface $stockRegistry
     */
    public function __construct(StockRegistryInterface $stockRegistry) {
        $this->stockRegistry = $stockRegistry;
    }

    /**
     * Gets max sales quantity
     *
     * @param \Magento\Catalog\Model\Product $product
     * @return Integer
     */
    public function getMaxQty($product)
    {
        $stockItem = $this->stockRegistry->getStockItem($product->getId(), $product->getStore()->getWebsiteId());
        $maxSaleQty = $stockItem->getMaxSaleQty();
        if($maxSaleQty == 0) {
            $maxSaleQty = 10000; // a large default, as for some reason some result to 0, so this is a protection for max qty calculations
        }
        return $maxSaleQty;
    }

    /**
     * Gets quantity step
     *
     * @param \Magento\Catalog\Model\Product $product
     * @return Integer
     */
    public function getQtyStep($product)
    {
        $stockItem = $this->stockRegistry->getStockItem($product->getId(), $product->getStore()->getWebsiteId());
        $qtyStep = 1;
        if ($stockItem->getEnableQtyIncrements()) {
            $qtyStep = $stockItem->getQtyIncrements();
        }
        return $qtyStep;
    }
}
