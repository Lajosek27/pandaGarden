<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class panda_categories_homepage extends Module
{
    public function __construct()
    {
        $this->name = 'panda_categories_homepage';
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

        $this->displayName = $this->trans('Display categories on homepage', [], 'Modules.Pandacategoryhompage.Admin');
        $this->description = $this->trans('Section with categories', [], 'Modules.Pandacategoryhompage.Admin');

        $this->confirmUninstall = $this->trans('Are you sure you want to uninstall?', [], 'Modules.Pandacategoryhompage.Admin');

        if (!Configuration::get('PANDACATEGORYHOMEPAGE')) {
            $this->warning = $this->trans('No name provided', [], 'Modules.Pandacategoryhompage.Admin');
        }
    }

    public function install()
{
    if (Shop::isFeatureActive()) {
        Shop::setContext(Shop::CONTEXT_ALL);
    }

    return parent::install() &&
        $this->registerHook('displayCategoryHomepage') &&
        $this->registerHook('displayHome') &&
        $this->registerHook('actionFrontControllerSetMedia') &&
        Configuration::updateValue('PANDACATEGORYHOMEPAGE', 'pandacategoryhomepage');

}
public function uninstall()
{
    return (
        parent::uninstall() 
        && Configuration::deleteByName('PANDACATEGORYHOMEPAGE')
    );
}

public function hookDisplayCategoryHomepage($params)
{
    // $this->context->smarty->assign([
    //     'my_module_name' => Configuration::get('PANDAABOUTU'),
    //     'my_module_link' => $this->context->link->getModuleLink('pandaaboutus', 'display')
    // ]);

    return $this->display(__FILE__, 'views/templates/pandacategoryhomepage.tpl');
}

public function hookDisplayHome($param) {
    return $this->display(__FILE__, 'views/templates/pandacategoryhomepage.tpl');
}

public function hookActionFrontControllerSetMedia(){
    $this->context->controller->registerStylesheet(
        $this->name .'-style',
        'modules/' . $this->name . '/views/css/pandacategoryhomepage.css',
        [
            'media' => 'all',
            'priority' => 200,
        ]
    );

}

}