<?php

// Importowanie klasy ObjectModel z globalnej przestrzeni nazw
use PrestaShop\PrestaShop\Core\Localization\Locale;
use PrestaShop\PrestaShop\Adapter\Entity\ObjectModel;



class Project extends \ObjectModel
{
    public $id_project;
    public $title;
    public $description;
    public $cover;
    public $images;
    public $date_add;

    // Inne właściwości i metody

    public static $definition = [
        'table' => 'projects',
        'primary' => 'id_project',
        'fields' => [
            'title' => ['type' => self::TYPE_STRING, 'validate' => 'isString'],
            'description' => ['type' => self::TYPE_STRING, 'validate' => 'isString'],
            'cover' => ['type' => self::TYPE_INT, 'validate' => 'isInteger'],
            'date_add' => ['type' => self::TYPE_DATE],
        ],
    ];

    // public function __construct() {
    //     parent::__construct()
    // }
}

