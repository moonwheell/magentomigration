<?php
namespace Gwd\CustomCatalog\Block\Adminhtml;
class Custom extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
		
        $this->_controller = 'adminhtml_custom';/*block grid.php directory*/
        $this->_blockGroup = 'Gwd_CustomCatalog';
        $this->_headerText = __('Custom');
        $this->_addButtonLabel = __('Add New Entry'); 
        parent::_construct();
		
    }
}
