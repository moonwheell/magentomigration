<?php

namespace Gwd\CustomCatalog\Block\Adminhtml\Custom\Edit;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * Preparing grid edit form
     *
     * @return $this
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareForm()
    {
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            array(
                'data' => array(
                    'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/save'),
                    'method' => 'post',
                    'enctype' => 'multipart/form-data'
                )
            )
        );
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
