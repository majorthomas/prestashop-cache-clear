<?php

// Clear PrestaShop 1.6 cache

$config_dir = 'config/';

if (is_dir('web/config/')) {
  $config_dir = 'web/config/';
} elseif (!is_dir($config_dir)) {
  exit('The config directory doesn\'t exist.');
}

if (!is_file($config_dir . 'config.inc.php')) {
  exit('The config file doesn\'t exist.');
}

$config_file = $config_dir . 'config.inc.php';

include($config_file);

Tools::clearSmartyCache();

Smarty_Internal_Utility::clearCompiledTemplate(null, null, null, Context::getContext()->smarty);
$_cache_resource = Smarty_CacheResource::load(Context::getContext()->smarty, null);
Smarty_CacheResource::invalidLoadedCache(Context::getContext()->smarty);
$_cache_resource->clearAll(Context::getContext()->smarty, null);

if (method_exists('Tools', 'clearXMLCache')) {
  Tools::clearXMLCache();
}

if (method_exists('Media', 'clearCache')) {
  Media::clearCache();
}

if (method_exists('Tools', 'generateIndex')) {
  Tools::generateIndex();
} elseif (
  class_exists('PrestaShopAutoload')
  && method_exists('PrestaShopAutoload', 'getInstance')
  && method_exists(PrestaShopAutoload::getInstance(), 'generateIndex')
) {
  PrestaShopAutoload::getInstance()->generateIndex();
} elseif (
  class_exists('Autoload')
  && method_exists('Autoload', 'getInstance')
  && method_exists(Autoload::getInstance(), 'generateIndex')
) {
  Autoload::getInstance()->generateIndex();
}
