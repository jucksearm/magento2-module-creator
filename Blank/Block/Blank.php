<?php
/**
 * Copyright © 2016 Jucksearm. All rights reserved.
 * See LICENSE for license details.
 */
namespace {{MODULE_VENDOR}}\{{MODULE_NAME}}\Block;

class {{MODULE_NAME}} extends \Magento\Framework\View\Element\Template
{
	public function _prepareLayout()
	{
		$this->pageConfig->getTitle()->set(__('Hello World'));
		
	    return parent::_prepareLayout();
	}
}