<?php

require_once 'C:\wamp\bin\php\php5.3.13\pear\symfony/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    // for compatibility / remove and enable only the plugins you want
    $this->enableAllPluginsExcept(array('sfDoctrinePlugin', 'sfCompat10Plugin'));
  }
  
  static protected $zendLoaded = false;
  
  static public function registerZend()
  {
  	if (self::$zendLoaded)
  	{
  		return;
  	}
  
  	set_include_path(sfConfig::get('sf_lib_dir').'/vendor'.PATH_SEPARATOR.get_include_path());
  	require_once sfConfig::get('sf_lib_dir').'/vendor/Zend/loader.php';
  	Zend_Loader_Autoloader::getInstance();
  	self::$zendLoaded = true;
  }
  
}
