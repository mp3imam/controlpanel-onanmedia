<?php

namespace Config;

class SmartyConfig
{
  public static $configDirs = [
    'templateDir' => APPPATH . 'Views',
    'compileDir' => WRITEPATH . 'smarty/template_c',
    'cacheDir' => WRITEPATH . 'smarty/cache',
    'configDir' => APPPATH . 'Config'
  ];

  public static $fileExtension = 'php';
}
