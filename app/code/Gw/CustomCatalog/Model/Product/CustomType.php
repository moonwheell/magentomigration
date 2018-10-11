<?php

namespace Gw\CustomCatalog\Model\Product;

class CustomType extends \Magento\ConfigurableProduct\Model\Product\Type\Configurable
{
    const TYPE_ID = 'custom_product_type_code';

    /**
     * {@inheritdoc}
     */
    public function deleteTypeSpecificData(\Magento\Catalog\Model\Product $product)
    {
        // method intentionally empty
    }
}