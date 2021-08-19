<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\Plugins\OnlyOffice\Utils\OnlyOfficeTrait;
use srag\RemovePluginDataConfirm\OnlyOffice\RepositoryObjectPluginUninstallTrait;

/**
 * Class ilOnlyOfficePlugin
 *
 * Generated by SrPluginGenerator v1.3.4
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilOnlyOfficePlugin extends ilRepositoryObjectPlugin
{

    use RepositoryObjectPluginUninstallTrait;
    use OnlyOfficeTrait;
    const PLUGIN_ID = "xono";
    const PLUGIN_NAME = "OnlyOffice";
    const PLUGIN_CLASS_NAME = self::class;
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * ilOnlyOfficePlugin constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @inheritDoc
     */
    public function getPluginName() : string
    {
        return self::PLUGIN_NAME;
    }


    /**
     * @inheritDoc
     */
    public function updateLanguages(/*?array*/ $a_lang_keys = null)/*:void*/
    {
        parent::updateLanguages($a_lang_keys);

        $this->installRemovePluginDataConfirmLanguages();
    }


    /**
     * @inheritDoc
     */
    protected function deleteData()/*: void */
    {
        self::onlyOffice()->dropTables();
    }

    protected function shouldUseOneUpdateStepOnly() : bool
    {
        // TODO: Implement shouldUseOneUpdateStepOnly() method.
        return false;
    }

    protected function uninstallCustom() {
        // ToDo: Implement
    }

    public static function checkPluginClassNameConst() {
        return self::PLUGIN_CLASS_NAME;
    }

    public function allowCopy()
    {
        return true;
    }

}
