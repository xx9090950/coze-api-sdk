<?php

namespace Gongruixiang\CozeApiSdk\scripts;

class Installer
{
    public static function postInstall()
    {
        $configDir = __DIR__ . '/../../../../config/';
        $sourceConfig = __DIR__ . '/../src/config/coze.php';
        $targetConfig = $configDir . 'coze.php';

        if (!file_exists($configDir)) {
            mkdir($configDir, 0755, true);
        }

        if (!file_exists($targetConfig)) {
            copy($sourceConfig, $targetConfig);
            echo "Configuration file my_package.php has been copied to the ThinkPHP config directory.\n";
        } else {
            echo "Configuration file my_package.php already exists in the ThinkPHP config directory.\n";
        }
    }
}
