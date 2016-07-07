<?php
/**
 * Copyright © 2016 Jucksearm. All rights reserved.
 * See LICENSE for license details.
 */
namespace Jucksearm\ModuleCreator\Controller\Adminhtml\Index;

class Index extends \Jucksearm\ModuleCreator\Controller\Adminhtml\Index
{
    /**
     * action
     *
     * @return void
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu('Jucksearm_ModuleCreator::system_extensions_creator');
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Module Creator'));
        $this->_addBreadcrumb(__('System'), __('System'));
        $this->_addBreadcrumb(__('Extensions'), __('Extensions'));
        $this->_addBreadcrumb(__('Module Creator'), __('Module Creator'));

        $this->_view->renderLayout();
    }
}
