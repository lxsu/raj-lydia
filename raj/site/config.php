<?php
/* -----------------------------------------------------------------------------
config.php

Beskrivning: config
Skapare: RaJ

Vettiga länkar:
http://php.net/manual/en/language.constants.predefined.php

================================================================================
------------------------------------------------------------------------------*/
/**
 * Set level of error reporting
 */
error_reporting(-1);
ini_set('display_errors', 1);


/**
 * Set what to show as debug or developer information in the get_debug() theme helper.
 */
$raj->config['debug']['lydia'] = false;
$raj->config['debug']['session'] = false;
$raj->config['debug']['timer'] = false;
$raj->config['debug']['db-num-queries'] = false;
$raj->config['debug']['db-queries'] = false;


/**
 * Set database(s).
 */
$raj->config['database'][0]['dsn'] = 'sqlite:' . RAJ_SITE_PATH . '/data/.ht.sqlite';


/**
 * What type of urls should be used?
 * 
 * default      = 0      => index.php/controller/method/arg1/arg2/arg3
 * clean        = 1      => controller/method/arg1/arg2/arg3
 * querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
 */
$raj->config['url_type'] = 1;


/**
 * Set a base_url to use another than the default calculated
 */
$raj->config['base_url'] = null;


/**
 * How to hash password of new users, choose from: plain, md5salt, md5, sha1salt, sha1.
 */
$raj->config['hashing_algorithm'] = 'sha1salt';

$raj->config['create_new_users'] = true;

/**
 * Define session name
 */
$raj->config['session_name'] = preg_replace('/[:\.\/-_]/', '', __DIR__);
$raj->config['session_key']  = 'raj';


/**
 * Define server timezone
 */
$raj->config['timezone'] = 'Europe/Stockholm';


/**
 * Define internal character encoding
 */
$raj->config['character_encoding'] = 'UTF-8';


/**
 * Define language
 */
$raj->config['language'] = 'sv';


/**
 * Define the controllers, their classname and enable/disable them.
 *
 * The array-key is matched against the url, for example: 
 * the url 'developer/dump' would instantiate the controller with the key "developer", that is 
 * CCDeveloper and call the method "dump" in that class. This process is managed in:
 * $raj->FrontControllerRoute();
 * which is called in the frontcontroller phase from index.php.
 */
$raj->config['controllers'] = array(
  'index'     => array('enabled' => true,'class' => 'CCIndex'),
  'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
  'theme'     => array('enabled' => true,'class' => 'CCTheme'),
  'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
  'content'   => array('enabled' => true,'class' => 'CCContent'),
  'blog'      => array('enabled' => true,'class' => 'CCBlog'),
  'page'      => array('enabled' => true,'class' => 'CCPage'),
  'user'      => array('enabled' => true,'class' => 'CCUser'),
  'acp'       => array('enabled' => true,'class' => 'CCAdminControlPanel'),
  'module'    => array('enabled' => true,'class' => 'CCModules'),
  'my'        => array('enabled' => true,'class' => 'CCMycontroller'),

);

/**
 * Define a routing table for urls.
 *
 * Route custom urls to a defined controller/method/arguments
 */
$raj->config['routing'] = array(
  'home' => array('enabled' => true, 'url' => 'index/index'),
);


/**
 * Define menus.
 *
 * Create hardcoded menus and map them to a theme region through $ly->config['theme'].
 */
$raj->config['menus'] = array(
 'navbar' => array(
    'home'      => array('label'=>'Home', 'url'=>'home'),
    'modules'   => array('label'=>'Modules', 'url'=>'module'),
    'content'   => array('label'=>'Content', 'url'=>'content'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'guestbook'),
    'blog'      => array('label'=>'Blog', 'url'=>'blog'),
  ),
  'my-navbar' => array(
    'home'      => array('label'=>'Om mig', 'url'=>'my'),
    'blog'      => array('label'=>'Min blogg', 'url'=>'my/blog'),
    'guestbook' => array('label'=>'Gästbok', 'url'=>'my/guestbook'),
  ),
);



$raj->config['theme'] = array(
  'path'            => 'site/themes/mytheme',
  //'path'            => 'themes/grid',
  'parent'          => 'themes/grid',
  'stylesheet'      => 'style.css',
  'template_file'   => 'index.tpl.php',
  'regions' => array('navbar', 'flash','featured-first','featured-middle','featured-last',
    'primary','sidebar','triptych-first','triptych-middle','triptych-last',
    'footer-column-one','footer-column-two','footer-column-three','footer-column-four',
    'footer',
  ),
  // Add static entries for use in the template file.
  'menu_to_region' => array('my-navbar'=>'navbar'),
  'data' => array(
    'header' => 'RaJ',
    'slogan' => 'A PHP-based MVC-inspired CMF',
    'favicon' => 'logo_80x80.png',
    'logo' => 'logo_80x80.png',
    'logo_width'  => 80,
    'logo_height' => 80,
    'footer' => '<p>RaJ buildt on Lydia &copy; by Mikael Roos (mos@dbwebb.se)</p>',
  ),
);