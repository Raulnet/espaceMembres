<?php

    define ('ROOT', realpath(dirname(__FILE__) . '/../') . '/');

    function autoloadItemsClass($sClassName)
    {
        $sFilePath = ROOT . 'src/' . $sClassName . '.class.php';
        $sFilePath = realpath($sFilePath);
        if (is_file($sFilePath)) {
            require_once $sFilePath;
        } else {
            die ('class not found ' . $sClassName);
        }
    }

    spl_autoload_register('autoloadItemsClass');



