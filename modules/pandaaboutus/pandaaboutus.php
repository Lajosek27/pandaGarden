<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class pandaaboutus extends Module
{
    public function __construct()
    {
        $this->name = 'pandaaboutus';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Panda Coders';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7.0.0',
            'max' => '8.99.99',
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->trans('About us module', [], 'Modules.Pandaaboutus.Admin');
        $this->description = $this->trans('Section with information about our company on homepage', [], 'Modules.Pandaaboutus.Admin');

        $this->confirmUninstall = $this->trans('Are you sure you want to uninstall?', [], 'Modules.Pandaaboutus.Admin');

        if (!Configuration::get('PANDAABOUTUS')) {
            $this->warning = $this->trans('No name provided', [], 'Modules.Pandaaboutus.Admin');
        }
    }

    public function install()
{
    if (Shop::isFeatureActive()) {
        Shop::setContext(Shop::CONTEXT_ALL);
    }

    return parent::install() &&
        $this->registerHook('displayHome') &&
        $this->registerHook('actionFrontControllerSetMedia') &&
        Configuration::updateValue('PANDAABOUTUS', 'pandaaboutus');

}
public function uninstall()
{
    return (
        parent::uninstall() 
        && Configuration::deleteByName('PANDAABOUTUS')
    );
}


public function hookDisplayHome($param) {
    return $this->display(__FILE__, 'views/templates/pandaaboutus.tpl');
}

public function hookActionFrontControllerSetMedia(){
    $this->context->controller->registerStylesheet(
        $this->name .'-style',
        'modules/' . $this->name . '/views/css/pandaaboutus.css',
        [
            'media' => 'all',
            'priority' => 200,
        ]
    );

}

}