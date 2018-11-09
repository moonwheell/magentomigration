<?php
namespace Gwd\CustomCatalog\Controller\Adminhtml\Custom;
use Magento\Framework\App\Filesystem\DirectoryList;
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
	public function execute()
    {
		
        $data = $this->getRequest()->getParams();

        if ($data) {
            $model = $this->_objectManager->create('Magento\Catalog\Model\Product');
		
            /* if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
				try {
					    $uploader = $this->_objectManager->create('Magento\Core\Model\File\Uploader', array('fileId' => 'image'));
						$uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'));
						$uploader->setAllowRenameFiles(true);
						$uploader->setFilesDispersion(true);
						$mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')
							->getDirectoryRead(DirectoryList::MEDIA);
						$config = $this->_objectManager->get('Magento\Bannerslider\Model\Banner');
						$result = $uploader->save($mediaDirectory->getAbsolutePath('bannerslider/images'));
						unset($result['tmp_name']);
						unset($result['path']);
						$data['image'] = $result['file'];
				} catch (Exception $e) {
					$data['image'] = $_FILES['image']['name'];
				}
			}
			else{
				$data['image'] = $data['image']['value'];
			} */
			$id = $this->getRequest()->getParam('id');


            if ($id) {
                $model->load($id);
            }

            $model->setData($data);

//            $model->setName('Test Product');
//            $model->setTypeId('simple');
//            $model->setUrlKey(rand(1,99999999) . '.html');
//            $model->setAttributeSetId(4);
////            $model->setSku('test-SKU');
//            $model->setWebsiteIds(array(1));
//            $model->setVisibility(4);
//            $model->setPrice(array(1));
//            $model->setImage('/testimg/test.jpg');
//            $model->setSmallImage('/testimg/test.jpg');
//            $model->setThumbnail('/testimg/test.jpg');
//            $model->setStockData(array(
//                    'use_config_manage_stock' => 0, //'Use config settings' checkbox
//                    'manage_stock' => 1, //manage stock
//                    'min_sale_qty' => 1, //Minimum Qty Allowed in Shopping Cart
//                    'max_sale_qty' => 2, //Maximum Qty Allowed in Shopping Cart
//                    'is_in_stock' => 1, //Stock Availability
//                    'qty' => 100 //qty
//                )
//            );

            try {
                $model->save();


                $this->messageManager->addSuccess(__('The Frist Grid Has been Saved.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId(), '_current' => true));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (\Magento\Framework\Model\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the banner.'));
            }


            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', array());
            return;
        }
        $this->_redirect('*/*/');
    }
}
