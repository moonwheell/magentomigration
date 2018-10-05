<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.10.18
 * Time: 14:04
 */

namespace Gw\CustomCatalog\Controller\Index;


class Example extends \Magento\Framework\App\Action\Action
{

    protected $title;

    public function execute()
    {
        echo $this->setTitle('Welcome');
        echo $this->getTitle();
    }


    public function setTitle($title)
    {
        return $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}