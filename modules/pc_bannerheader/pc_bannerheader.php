<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class Pc_BannerHeader extends Module
{
    const AVAILABLE_HOOKS = [
        'displayHeaderCustomBanner',
        'actionFrontControllerSetMedia',
        'displayBanner'
    ];

    public function __construct()
    {
        $this->name = 'pc_bannerheader';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Panda Coders';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Baner na szyczcie strony');
        $this->description = $this->l('Pozwala edytować zmieniające się komunikaty na szczycie strony');
    }

    public function install()
    {
        if (parent::install() && $this->registerHook(self::AVAILABLE_HOOKS)) {
            return true;
        }

        return false;

    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookActionFrontControllerSetMedia($params)
    {
        $this->context->controller->registerStylesheet(
            'module-pc-bannerheader-css',
            'modules/' . $this->name . '/views/css/front.css',
            [
                'priority' => 200
            ]
        );
        $this->context->controller->registerJavascript(
            'module-pc-bannerheader-js',
            'modules/' . $this->name . '/views/js/front.js',
            [
                'priority' => 999
            ]
        );
    }

    public function hookDisplayHeaderCustomBanner($params)
    {
        $bannerLines = [];
        $lang = $this->context->language->id;
        foreach ($this->getInputs() as $input) {
            $bannerLines[] = Configuration::get($input['name'] . '_' . $lang);
        }
        $this->context->smarty->assign([
            'bannerLines' => $bannerLines,

        ]);

        return $this->display(__FILE__, 'views/templates/pc_bannerheader.tpl');

    }


    public function getContent()
    {
        $output = '';

        if (Tools::isSubmit('submit' . $this->name)) {

            $def_lang = Configuration::get('PS_LANG_DEFAULT');
            foreach ($this->getInputs() as $input) {
                foreach ($this->getLangArray() as $lang) {
                    $value = Tools::getValue($input['name'] . '_' . $lang['id_lang'], false);
                    if (Validate::isCleanHtml($value)) {
                        Configuration::updateValue($input['name'] . '_' . $lang['id_lang'], $value, true);
                    }
                }
            }
        }

        return $output . $this->displayForm();
    }


    public function displayForm()
    {

        $form = [
            'form' => [
                'legend' => [
                    'title' => $this->l('Settings'),
                ],
                'submit' => [
                    'title' => $this->l('Save'),
                    'class' => 'btn btn-default pull-right',
                ],
            ],
        ];

        $helper = new HelperForm();
        $helper->table = $this->table;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&' . http_build_query(['configure' => $this->name]);
        $helper->submit_action = 'submit' . $this->name;
        $helper->default_form_language = (int) Configuration::get('PS_LANG_DEFAULT');


        $helper->languages = $this->getLangArray();

        $form['form']['input'] = $this->getInputs();
        foreach ($form['form']['input'] as $input) {
            foreach ($helper->languages as $language) {
                $helper->fields_value[$input['name']][$language['id_lang']] = Tools::getValue($input['name'] . '_' . $language['id_lang'], Configuration::get($input['name'] . '_' . $language['id_lang']));

            }
        }
        return $helper->generateForm([$form]);
    }


    public function getLangArray()
    {
        $languages = Language::getLanguages(false);
        foreach ($languages as $k => $language) {
            $languages[$k]['is_default'] = (int) $language['id_lang'] == Configuration::get('PS_LANG_DEFAULT');
        }

        return $languages;
    }

    public function getInputs()
    {
        return array(
            [
                'type' => 'text',
                'label' => $this->l('Tekst'),
                'name' => 'pc_bannerHeader1',
                'size' => 20,
                'lang' => true,
                'required' => false,
            ],
            [
                'type' => 'text',
                'label' => $this->l('Tekst'),
                'name' => 'pc_bannerHeader2',
                'size' => 20,
                'lang' => true,
                'required' => false,
            ],
            [
                'type' => 'text',
                'label' => $this->l('Tekst'),
                'name' => 'pc_bannerHeader3',
                'size' => 20,
                'lang' => true,
                'required' => false,
            ],
            [
                'type' => 'text',
                'label' => $this->l('Tekst'),
                'name' => 'pc_bannerHeader4',
                'size' => 20,
                'lang' => true,
                'required' => false,
            ],
            [
                'type' => 'text',
                'label' => $this->l('Tekst'),
                'name' => 'pc_bannerHeader5',
                'size' => 20,
                'lang' => true,
                'required' => false,
            ]
        );
    }


}