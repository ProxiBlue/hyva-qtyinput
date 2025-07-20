# hyva-qtyinput

## Introduction

Enhance the Product View QTY input to honour to min/max and QTY step

## Install

You can install via composer:

* run: ```composer config repositories.github.repo.repman.io composer https://github.repo.repman.io```
* use composer ```composer require proxi-blue/hyva-qtyinput```
* enable: ```./bin/magento module:enable ProxiBlue_HyvaQtyInput```
* run: ```./bin/magento setup:upgrade```
* run: ```./bin/magento setup:di:compile```

## Configuration

The module does not add any new configuration options. The min/max/increment options for product quantity is used from core inventory setup.

## Using

You need to output this new enhanced qty block in your theme file.

```
vendor/hyva-themes/magento2-default-theme/Magento_Bundle/templates/catalog/product/view/summary.phtml
vendor/hyva-themes/magento2-default-theme/Magento_Catalog/templates/product/view/product-info.phtml
```

and replace ```<?= $block->getChildHtml("product.info.quantity") ?>``` with ```<?= $block->getChildHtml("product.info.quantity.enhanced") ?>```

If a product is configured with either Min / Max and Quantity Increments, the quantity incrment field will notify user of incorrect values entered.
If lower than min is entered, it will be set to the min value, and if more than max is entered, it will be set at the max value.
The mouse up/down values will honour the step value.
If a quantity step is needed, the user will be notifies entered value is not within teh steped range.

### Examples

Min qty is 8, max qty is 100000, step is 8

![image](https://user-images.githubusercontent.com/4994260/120951071-a4d08a80-c77a-11eb-8779-c3aa7d12daac.png)

![image](https://user-images.githubusercontent.com/4994260/120951137-bdd93b80-c77a-11eb-8da1-0dc6613a86da.png)

![image](https://user-images.githubusercontent.com/4994260/120951173-d21d3880-c77a-11eb-954c-d51d696b995f.png)


https://user-images.githubusercontent.com/4994260/120951247-fb3dc900-c77a-11eb-9202-bf4297216304.mp4



## Note

* Not tested with MSI enabled. The site build I created this for has MSI stripped out
* Only tested with Simple Product Types as the site I created this for only has simple products
