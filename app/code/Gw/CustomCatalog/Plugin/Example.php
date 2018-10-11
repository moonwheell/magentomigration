<?php


namespace Gw\CustomCatalog\Plugin;

class Example
{

    public function beforeSetTitle( \Gw\CustomCatalog\Controller\Index\Example $subject, $title)
    {
        $title = $title . " to ";
		echo __METHOD__ . "</br>";

		return [$title];
    }

    public function afterGetTitle(\Gw\CustomCatalog\Controller\Index\Example $subject, $result)
    {

        echo __METHOD__ . "</br>";

        return '<h1>'. $result . 'Mageplaza.com' .'</h1>';

    }

    public function aroundGetTitle(\Gw\CustomCatalog\Controller\Index\Example $subject, callable $proceed)
    {

        echo __METHOD__ . " - Before proceed() </br>";
        $result = $proceed();
        echo __METHOD__ . " - After proceed() </br>";


        return $result;
    }


    public function afterIsHasVariations(\Magento\ConfigurableProduct\Block\Adminhtml\Product\Edit\Tab\Variations\Config $subject, $result)
    {
        $result .= true;

        return $result = true;
//        return $this->getProduct()->getTypeId() === Configurable::TYPE_CODE
//            && $this->configurableType->getUsedProducts($this->getProduct());
    }


}