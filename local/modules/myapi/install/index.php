<?
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

Class myapi extends CModule
{
	var $MODULE_ID = "myapi";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $MODULE_GROUP_RIGHTS = "Y";

	public function __construct()
	{
		$arModuleVersion = array();

		include(__DIR__.'/version.php');

		$this->MODULE_VERSION = '0.2';
		$this->MODULE_VERSION_DATE = '2023.09.24';

		$this->MODULE_NAME = "Myapi - обмены с Битрикс24";
		$this->MODULE_DESCRIPTION = "Модуль для организации обменов Битрикс24 с другими системами - 1C, BI и т.п.";

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

		$this->PARTNER_NAME = Loc::getMessage("MY_PARTNER_NAME");
		$this->PARTNER_URI = Loc::getMessage("MY_PARTNER_URL");
		$this->MODULE_NAME = Loc::getMessage("MY_MODULE_NAME");
		$this->MODULE_DESCRIPTION = Loc::getMessage("MY_MODULE_DESCR");

	}


	function InstallDB($install_wizard = true)
	{
		RegisterModule("myapi");
		
		return true;
	}

	function UnInstallDB($arParams = Array())
	{
		UnRegisterModule("myapi");

		return true;
	}

	function InstallEvents()
	{
		return true;
	}

	function UnInstallEvents()
	{
		return true;
	}

	function InstallFiles()
	{
		return true;
	}

	function UnInstallFiles()
	{
		return true;
	}

	function DoInstall()
	{
		$this->errors = null;

		$this->InstallFiles();
		$this->InstallDB(false);
		
	}

	function DoUninstall()
	{
		$this->UnInstallFiles();
		$this->UnInstallDB(false);
	}
}
?>