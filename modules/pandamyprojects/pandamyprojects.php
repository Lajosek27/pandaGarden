<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class PandaMyProjects extends Module
{
    public function __construct()
    {
        $this->name = 'pandamyprojects';
        $this->tab = 'admin_projects';  // Tylko jako identyfikator dla grupy menu
        $this->version = '1.0.0';
        $this->author = 'Panda Coders';
        $this->need_instance = 0;
        parent::__construct();

        $this->displayName = $this->l('My Projects');
        $this->description = $this->l('A module that adds "Projects" tab to the admin menu.');
    }

    public function install()
    {
        return parent::install() && $this->createAdminTab() && $this->installDB();
    }

    private function createAdminTab()
    {
        // Tworzymy zakładkę w menu administracyjnym
        $tab = new Tab();
        $tab->class_name = 'AdminPandaMyProjects';  // Klasa kontrolera
        $tab->module = $this->name;
        $tab->id_parent = Tab::getIdFromClassName('CONFIGURE');  // Główne menu "Poprawa"
        
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = $this->l('Projects');
        }

        // Dodajemy zakładkę
        if (!$tab->add()) {
            return false;
        }

        return true;
    }

    public function uninstall()
    {
        return parent::uninstall() && $this->uninstallDB() && $this->removeAdminTab();
    }

    private function removeAdminTab()
    {
        $id_tab = (int) Tab::getIdFromClassName('AdminPandaMyProjects');
        if ($id_tab) {
            $tab = new Tab($id_tab);
            $tab->delete();
        }
        return true;
    }

    private function installDB()
    {
        $sql1 = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'projects` (
            `id_project` INT(11) NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(255) NOT NULL,
            `description` TEXT NOT NULL,
            `image` VARCHAR(255) DEFAULT NULL,
            `date_add` DATETIME NOT NULL,
            PRIMARY KEY (`id_project`)
        ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8mb4;';

        $sql2 = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'project_images` (
            `id_image` INT(11) NOT NULL AUTO_INCREMENT,
            `id_project` INT(11) NOT NULL,
            `file_path` VARCHAR(512) NOT NULL,
            PRIMARY KEY (`id_image`),
            INDEX (`id_project`),
            FOREIGN KEY (`id_project`) REFERENCES `'._DB_PREFIX_.'projects`(`id_project`) ON DELETE CASCADE
        ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8mb4;';

        // Wykonanie zapytań SQL
        if (!Db::getInstance()->execute($sql1)) {
            return false;
        }

        if (!Db::getInstance()->execute($sql2)) {
            return false;
        }

        return true;
    }

    private function uninstallDB()
    {
        // Usuwamy tabele związane z projektami
        $sql = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'projects`, `'._DB_PREFIX_.'project_images`;';
        return Db::getInstance()->execute($sql);
    }
}

