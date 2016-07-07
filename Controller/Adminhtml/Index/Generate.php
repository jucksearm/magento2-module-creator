<?php
/**
 * Copyright © 2016 Jucksearm. All rights reserved.
 * See LICENSE for license details.
 */
namespace Jucksearm\ModuleCreator\Controller\Adminhtml\Index;

use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\DocBlockGenerator;

class Generate extends \Jucksearm\ModuleCreator\Controller\Adminhtml\Index
{
    /**
     * Destination path file location
     */
    const DEST_PATH   = BP . '/app/code';
    
    /**
     * Source path file localtion
     */
    const SOURCE_PATH = __DIR__ . '/../../../Blank';
    
    protected $blankList;

    protected $createList;

    /**
     * Action
     * @return void
     */
    public function execute()
    {   
        $version  = trim($this->getRequest()->getParam('module_version'));
        $vendor   = ucfirst(trim($this->getRequest()->getParam('module_vendor')));
        $name     = ucfirst(trim($this->getRequest()->getParam('module_name')));
       
        /**
         * Get List Blank file
         */
        $this->setFolderBlank();

        /**
         * Create new file and folder
         */
        $this->getFolderList($vendor, $name);

        foreach ($this->createList as $root) {
            $paths = explode('/', $root);
            $current = '';
            $last = count($paths);
            $counter = 1;
            foreach ($paths as $path) {
                $fullpath = $current.'/'.$path;
                if($counter == $last) {
                    if (!is_file(self::DEST_PATH.$fullpath)) {
                        $handle = fopen(self::DEST_PATH.$fullpath, 'w+');
                        fclose($handle);
                    }
                } else {
                    if (!is_dir(self::DEST_PATH.$fullpath)) {
                        mkdir(self::DEST_PATH.$fullpath);
                    }
                }

                $counter++;
                $current = $fullpath;
            }
        }

        /**
         * INSERT content
         * @return void
         */
        foreach ($this->blankList as $key => $source) {
            $content = file_get_contents(self::SOURCE_PATH.$source);
            $content = str_replace('{{MODULE_VENDOR}}', $vendor, $content);
            $content = str_replace('{{MODULE_NAME}}', $name, $content);
            $content = str_replace('{{MODULE_VERSION}}', $version, $content);
            $content = str_replace('{{module_vendor}}', strtolower($vendor), $content);
            $content = str_replace('{{module_name}}', strtolower($name), $content);
            file_put_contents(self::DEST_PATH.'/'.$this->createList[$key], $content);
        }
        
        $this->getResponse()->setRedirect($this->_redirect->getRedirectUrl($this->getUrl('*')));
    }

    protected function getFolderList($vendor, $module)
    {
        $folders = [
            $vendor.'/'.$module.'/Block/'.$module.'.php',
            $vendor.'/'.$module.'/etc/module.xml',
            $vendor.'/'.$module.'/etc/frontend/routes.xml',
            $vendor.'/'.$module.'/i18n/en_US.csv',
            $vendor.'/'.$module.'/view/frontend/layout/'.strtolower($module).'_index_index.xml',
            $vendor.'/'.$module.'/view/frontend/templates/'.strtolower($module).'.phtml',
            $vendor.'/'.$module.'/Controller/Index/Index.php',
            $vendor.'/'.$module.'/composer.json',
            $vendor.'/'.$module.'/LICENSE',
            $vendor.'/'.$module.'/README.md',
            $vendor.'/'.$module.'/registration.php',
        ];

        $this->createList = $folders;
    }

    protected function setFolderBlank()
    {
        $folders = [
            '/Block/Blank.php',
            '/etc/module.xml',
            '/etc/frontend/routes.xml',
            '/i18n/en_US.csv',
            '/view/frontend/layout/blank_index_index.xml',
            '/view/frontend/templates/blank.phtml',
            '/Controller/Index/Index.php',
            '/composer.json',
            '/LICENSE',
            '/README.md',
            '/registration.php',
        ];

        $this->blankList = $folders;
    }
}
