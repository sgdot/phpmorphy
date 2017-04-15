<?php

namespace cijic\phpMorphy;

use phpMorphy;
use Spot\Exception;

class Morphy extends phpMorphy
{
    protected $language;
    private $dictionaries = ['ru' => 'ru_RU', 'en' => 'en_EN'];
    private $dictsPath;

    public function __construct($language = 'ru', $options = [])
    {
        $this->dictsPath = __DIR__ . '/../libs/phpmorphy/dicts';
        $this->language  = $this->dictionaries[$language];

        if (defined('PHPMORPHY_STORAGE_FILE')) {
            $options = ['storage' => PHPMORPHY_STORAGE_FILE];
        } else {
            $options = ['storage' => 'file'];
        }

        try {
            parent::__construct($this->dictsPath, $this->language, $options);
        } catch (\phpMorphy_Exception $e) {
            throw new \Exception('Error occured while creating phpMorphy instance: ' . PHP_EOL . $e);
        }
    }
}
