# Magento 2 module: No Image 

## Description
Fix for Magento 2 (tested on v2.1.6). It fixes the case when there is no a required option swatch image in media (and maybe other cases for lost images).

It's quite useful after database migration during development.

## Installation via composer
```
composer require --dev onepica/mage2-dev-no-image
```

## Details
On initiate an image the module will create small placeholder (20x20 px) by the same image path.

## Warning
Please be aware this module will overwrite the class `Magento\Framework\Image`.


