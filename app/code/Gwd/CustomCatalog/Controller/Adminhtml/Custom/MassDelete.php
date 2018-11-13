<?php

namespace Gwd\CustomCatalog\Controller\Adminhtml\Custom;

use Magento\Backend\App\Action;

class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $ids = $this->getRequest()->getParam('id');

        if (!is_array($ids) || empty($ids)) {
            $this->messageManager->addError(__('Please select product(s).'));
        } else {
            try {
                foreach ($ids as $id) {
                    $row = $this->_objectManager->get('\Magento\Catalog\Model\Product')->load($id);
                    $row->delete();
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 record(s) have been deleted.', count($ids))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/');
    }
}

//$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//$productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
//$collectionSize = $productCollection->getSize();
//
//try {
//    foreach ($productCollection as $collection) {
//        $collection->delete();
//    }
//} catch (\Exception $e) {
//    $this->messageManager->addError($e->getMessage());
//}
//$this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $collectionSize));
//$this->_redirect('*/*/');