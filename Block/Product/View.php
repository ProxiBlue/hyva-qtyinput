<?php declare(strict_types=1);

/*
 * (c) Lucas van Staden <sales@proxiblue.com.au>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace ProxiBlue\HyvaQtyInput\Block\Product;

class View extends \Magento\Catalog\Block\Product\View
{
    /**
     * Gets minimal sales quantity
     *
     * @param \Magento\Catalog\Model\Product $product
     * @return float|null
     */
    public function getMaxQty($product)
    {
        $stockItem = $this->stockRegistry->getStockItem($product->getId(), $product->getStore()->getWebsiteId());
        $maxSaleQty = $stockItem->getMaxSaleQty();
        return $maxSaleQty > 0 ? $maxSaleQty : 10000000;
    }

    /**
     * Gets quantity step
     *
     * @param \Magento\Catalog\Model\Product $product
     * @return float|null
     */
    public function getQtyStep($product)
    {
        $stockItem = $this->stockRegistry->getStockItem($product->getId(), $product->getStore()->getWebsiteId());
        $qtyStep = 1;
        if($stockItem->getEnableQtyIncrements()) {
            $qtyStep = $stockItem->getQtyIncrements();
        }
        return $qtyStep;
    }
}
