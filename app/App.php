<?php
namespace TpjBladeTemplate;
if ( ! defined( 'ABSPATH' ) ) exit;

use TpjBladeTemplate\Hooks\HooksFactory;

class App {

    public function start(): void {
        HooksFactory::registerHooks();
    }
}