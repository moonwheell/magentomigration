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
            $model->setName('Firsttest');
            $model->setStatus(1);
            $model->setWeight(100);
            $model->setVisibility(4);
            $model->setTaxClassId(0);
            $model->setTypeId('simple');
            $model->setPrice(100);
            $model->setStockData(
                array(
                    'use_config_manage_stock' => 0,
                    'manage_stock' => 1,
                    'is_in_stock' => 1,
                    'qty' => 999999999
                )
            );


//            $model->setUrlRew(rand());

//            echo '<pre>';
//            var_dump($model->getData());
//            echo '</pre>';
//            die;


//            try {
                $model->save();

                echo '<pre>';
                var_dump($model);
                echo '</pre>';
                die;

                $this->messageManager->addSuccess(__('The Frist Grid Has been Saved.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId(), '_current' => true));
                    return;
                }
                $this->_redirect('*/*/');
//                return;
//            } catch (\Magento\Framework\Model\Exception $e) {
//                $this->messageManager->addError($e->getMessage());
//            } catch (\RuntimeException $e) {
//                $this->messageManager->addError($e->getMessage());
//            } catch (\Exception $e) {
//                $this->messageManager->addException($e, __('Something went wrong while saving the banner.'));
//            }

            echo '<pre>';
            var_dump($data);
            echo '</pre>';
            die;

            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', array());
            return;
        }
        $this->_redirect('*/*/');
    }
}