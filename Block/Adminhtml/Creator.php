<?php
/**
 * Copyright © 2016 Jucksearm. All rights reserved.
 * See LICENSE for license details.
 */
namespace Jucksearm\ModuleCreator\Block\Adminhtml;

use Magento\Framework\View\Element\AbstractBlock;

class Creator extends \Magento\Backend\Block\Template
{
    /**
     * Block's template
     *
     * @var string
     */
    protected $_template = 'Jucksearm_ModuleCreator::index.phtml';

    /**
     * @return AbstractBlock|void
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        $this->getToolbar()->addChild(
            'back_button',
            'Magento\Backend\Block\Widget\Button',
            [
                'label' => __('Back'),
                'onclick' => "window.location.href = '" . $this->getUrl('*/*') . "'",
                'class' => 'action-back'
            ]
        );

        $this->getToolbar()->addChild(
            'reset_button',
            'Magento\Backend\Block\Widget\Button',
            [
                'label' => __('Reset'),
                'onclick' => 'window.location.href = window.location.href',
                'class' => 'reset'
            ]
        );

        $this->getToolbar()->addChild(
            'save_button',
            'Magento\Backend\Block\Widget\Button',
            [
                'label' => __('Generate Module'),
                'class' => 'save primary create-module',
                'data_attribute' => [
                    'mage-init' => ['button' => ['event' => 'save', 'target' => '#module-creator-form']],
                ]
            ]
        );
    }
}
