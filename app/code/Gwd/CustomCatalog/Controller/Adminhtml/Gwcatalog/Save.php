<?php


namespace Gwd\CustomCatalog\Controller\Adminhtml\Gwcatalog;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('gwcatalog_id');
        
            $model = $this->_objectManager->create(\Gwd\CustomCatalog\Model\Gwcatalog::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Gwcatalog no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
        
            $model->setData($data);
        
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Gwcatalog.'));
                $this->dataPersistor->clear('gwd_customcatalog_gwcatalog');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['gwcatalog_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Gwcatalog.'));
            }
        
            $this->dataPersistor->set('gwd_customcatalog_gwcatalog', $data);
            return $resultRedirect->setPath('*/*/edit', ['gwcatalog_id' => $this->getRequest()->getParam('gwcatalog_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
