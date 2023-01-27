<?php
/**
 * Plugin Name: Miusage
 * Plugin URI:  www.facebook.com
 * Description: This plugin belongs to miusage.
 * Version:     1.0.0
 * Author:      Cupid Chakma
 * Author URI:  Cupid Chakma
 * Text Domain: miusage
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package     Miusage
 * @author      Test Plugin
 * @copyright   2023 Test Plugin
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 *
 * Prefix:      Plugin Functions Prefix
 */

require_once __DIR__ . '/vendor/autoload.php';

use Miusage\Cron;
use Miusage\Admin\Menu;
use DI\ContainerBuilder;
use Miusage\Rest\Payload;

final Class Miusage {
    public static $instance = null;
    public static function init() {
        if ( self::$instance == null ) {
            self::define_constants();
            self::$instance = self::intialize_container();
            new Cron();
            self::$instance->get( Payload::class );
            self::$instance->get( Menu::class );
        }
        return self::$instance;
    }

    public static function intialize_container() {
        $builder = new ContainerBuilder();
        $builder->addDefinitions( require_once __DIR__ . '/config.php' );
        return $builder->build();
    }

    public static function define_constants() {
        define( 'MIUSAGE_ROOT_PATH', __DIR__ );
        define( 'VIEWS_PATH', __DIR__ . '/views/' );
        define( 'MIUSAGE_URL', plugin_dir_url( __FILE__ ) );
        define( 'ADMIN_ASSETS_CSS_PATH', MIUSAGE_URL . 'assets/admin/css' );
        define( 'ADMIN_ASSETS_JS_PATH', MIUSAGE_URL . 'assets/admin/build' );
        define( 'ADMIN_BUILD_PATH', MIUSAGE_URL . 'build' );
        define( 'ADMIN_CSS_BUILD_PATH', ADMIN_BUILD_PATH . '/css' );
    }
}

Miusage::init();