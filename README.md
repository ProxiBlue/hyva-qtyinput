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

The module does not add any new configuration options. The min/max/increment optiosn for product quantity is used from core inventory setup.

## Using

If a product is configured with either Min / Max and Quantity Increments, the quantity incrment field will notify user of incorrect values entered.
If lower than min is entered, it will be set to the min value, and if more than max is entered, it will be set at the max value.
The mouse up/down values will honour the step value.

### Examples

Min qty is 8, max qty is 10000, step is 8

![image](https://user-images.githubusercontent.com/4994260/120951071-a4d08a80-c77a-11eb-8779-c3aa7d12daac.png)

![image](https://user-images.githubusercontent.com/4994260/120951137-bdd93b80-c77a-11eb-8da1-0dc6613a86da.png)

![image](https://user-images.githubusercontent.com/4994260/120951173-d21d3880-c77a-11eb-954c-d51d696b995f.png)


https://user-images.githubusercontent.com/4994260/120951247-fb3dc900-c77a-11eb-9202-bf4297216304.mp4



## Note

* Not tested with MSI enabled. The site build I created for this has MSI stripped out
* Only tested with Simple Product Types
