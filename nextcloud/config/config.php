<?php
$CONFIG = array (
  'htaccess.RewriteBase' => '/',
  'memcache.local' => '\\OC\\Memcache\\APCu',
  'apps_paths' => 
  array (
    0 => 
    array (
      'path' => '/var/www/html/apps',
      'url' => '/apps',
      'writable' => false,
    ),
    1 => 
    array (
      'path' => '/var/www/html/custom_apps',
      'url' => '/custom_apps',
      'writable' => true,
    ),
  ),
  'upgrade.disable-web' => true,
  'instanceid' => 'ocd6t357am0a',
  'passwordsalt' => 'SK5KMTz7iwAHfI3X2eD1DB75tii3ux',
  'secret' => '/YyYl3bOiRXwnMTg/eMUpSCPmHj99yqoNjBgQb/eDSczaEJZ',
  'trusted_domains' => 
  array (
    0 => 'nextcloud.localhost',
    1 => 'localhost',
    2 => 'nextcloud',         // <== nom du conteneur dans Docker
    3 => '172.25.0.20',       // <== IP du conteneur Nextcloud
  ),
  'datadirectory' => '/var/www/html/data',
  'dbtype' => 'sqlite3',
  'version' => '31.0.4.1',
  'overwrite.cli.url' => 'http://nextcloud.localhost',
  'installed' => true,
);
