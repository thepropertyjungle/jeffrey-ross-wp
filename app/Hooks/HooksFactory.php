<?php
namespace TpjBladeTemplate\Hooks;
if ( ! defined( 'ABSPATH' ) ) exit;


class HooksFactory {

    const HOOKS_CLASSES = [FilterConfig::class];

    static function registerHooks(): void {
        foreach (self::HOOKS_CLASSES as $className) {
            $className::register();
        }
    }

    static function registerHook(string $hookClass): void {
        $hookClass::register();
    }
}