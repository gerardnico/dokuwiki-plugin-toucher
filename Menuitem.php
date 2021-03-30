<?php

namespace dokuwiki\plugin\toucher;
use dokuwiki\Menu\Item\AbstractItem;
use helper_plugin_toucher;

/**
 * Class MenuItem
 *
 * Implements the toucher button
 * https://www.dokuwiki.org/devel:menus:example
 */
class MenuItem extends AbstractItem {


    public function getLinkAttributes($classprefix = 'menuitem ') {
        $linkAttributes = parent::getLinkAttributes($classprefix);
        if (empty($linkAttributes['class'])) {
            $linkAttributes['class'] = '';
        }
        return $linkAttributes;
    }

    public function getTitle()
    {
        $toucher = plugin_load('helper', 'toucher');
        return $toucher->getLang('menu');
    }

    public function getLabel() {
        return "Toucher";
    }


    public function getSvg()
    {
        /** @var helper_plugin_toucher $toucher */
        $toucher = plugin_load('helper', 'toucher');
        return $toucher->getIcon();
    }
}
