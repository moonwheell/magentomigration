<?php


namespace Gwd\CustomCatalog\Controller\Adminhtml\Gwcatalog;

class Edit extends \Gwd\CustomCatalog\Controller\Adminhtml\Gwcatalog
{

    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('gwcatalog_id');
        $model = $this->_objectManager->create(\Gwd\CustomCatalog\Model\Gwcatalog::class);
        
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Gwcatalog no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('gwd_customcatalog_gwcatalog', $model);
        
        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Gwcatalog') : __('New Gwcatalog'),
            $id ? __('Edit Gwcatalog') : __('New Gwcatalog')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Gwcatalogs'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Gwcatalog %1', $model->getId()) : __('New Gwcatalog'));
        return $resultPage;
    }
}
