<?php
/**
 * Copyright © 2016 Jucksearm. All rights reserved.
 * See LICENSE for license details.
 */
namespace Jucksearm\ModuleCreator\Controller\Adminhtml;

abstract class Index extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Magento_Backend::creator';
}
