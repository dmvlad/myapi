<?php

namespace Bitrix\Myapi\Tools;

use Bitrix\Main\Diag\Debug;
use Bitrix\Main\Application;

class Log
{
    const path = '/upload/tmp/myapi';

    public static function add($array, $subDir)
    {
        $context = Application::getInstance()->getContext();
        $server = $context->getServer();
       
        $dirPath = self::path . "/{$subDir}";
        $fullDirPath = $server->getDocumentRoot() . self::path . "/{$subDir}";
        $filePath = $dirPath . '/' . date('Ymd_Hi') . '.log';

        if (!file_exists($fullDirPath))
            mkdir($fullDirPath, 0755, true);

        Debug::writeToFile(print_r($array, true), 'log on ' . date('d.m.Y H:i:s'), $filePath);

    }
		
		
}


