<?php

/**
 * Class Humans_Plugin
 */
class Humans_Plugin
    extends Pimcore_API_Plugin_Abstract
    implements Pimcore_API_Plugin_Interface
{

    /**
     * Determine config file name via class name
     *
     * @return string xml config filename
     */
    private static function getConfigName()
    {
        return PIMCORE_WEBSITE_PATH
            . '/var/config/'
            . 'extension-'
            . str_replace('_plugin', '', strtolower(__CLASS__))
            . '.xml';
    }

    /**
     * Installs the plugin
     *
     * Copies the sample/default user images into the system folder as
     * if they had been set by the user. Creates the extension config
     * file, too.
     *
     * @return string success message
     */
    public static function install()
    {
        $configWriter = new Zend_Config_Writer_Xml();
        $configWriter->setConfig(new Zend_Config(array()));
        $configWriter->write(self::getConfigName());

        $sourcePath = PIMCORE_PLUGINS_PATH . '/Humans/static/img';
        $destinationPath = PIMCORE_WEBSITE_VAR . "/user-image";

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath);
        }

        $fileCount = 0;

        foreach (scandir($sourcePath) as $fileName) {

            if (is_dir($sourcePath . '/' . $fileName)) {
                continue;
            }

            if (file_exists($destinationPath . '/' . $fileName)) {
                continue;
            }

            if (!preg_match('/user-[0-9]+\.png/', $destinationPath . '/' . $fileName)) {
                continue;
            }

            copy($sourcePath . '/' . $fileName, $destinationPath . '/' . $fileName);

            $fileCount++;
        }

        return 'Successfully installed ' . $fileCount . ' human avatars.';
	}

    /**
     * Uninstalls the plugin
     * Removes all unchanged user images and the config file.
     *
     * @return string success message
     */
    public static function uninstall()
    {

        $sourcePath = PIMCORE_PLUGINS_PATH . '/Humans/static/img';
        $destinationPath = PIMCORE_WEBSITE_VAR . "/user-image";

        $fileCount = 0;

        foreach (scandir($sourcePath) as $fileName) {

            if (is_dir($sourcePath . '/' . $fileName)) {
                continue;
            }

            if (!preg_match('/user-[0-9]+\.png/', $sourcePath . '/' . $fileName)) {
                continue;
            }

            if (!file_exists($destinationPath . '/' . $fileName)) {
                continue;
            }

            if (md5_file($sourcePath . '/' . $fileName) != md5_file($destinationPath . '/' . $fileName)) {
                continue;
            }

            unlink($destinationPath . '/' . $fileName);

            $fileCount++;
        }

        if (file_exists(self::getConfigName())) {
            unlink(self::getConfigName());
        }

        return 'Successfully un-installed ' . $fileCount . ' human avatars.';
	}

    /**
     * Checks, if the plugin is installed
     *
     * Existance of the xml config file is the indicator for an installed plugin
     *
     * @return bool true if the plugin is currently installed
     */
    public static function isInstalled()
    {
        return file_exists(self::getConfigName());
	}

}
