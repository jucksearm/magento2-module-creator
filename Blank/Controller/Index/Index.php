<?php
/**
 * Copyright © 2016 Jucksearm. All rights reserved.
 * See LICENSE for license details.
 */
namespace {{MODULE_VENDOR}}\{{MODULE_NAME}}\Controller\Index;
 
class Index extends \Magento\Framework\App\Action\Action
{
	
	public function execute()
	{
		$this->_view->loadLayout();
		$this->_view->getLayout()->initMessages();
		$this->_view->renderLayout();
	}
}