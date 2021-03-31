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
class MenuItem extends AbstractItem
{

    /**
     * The first compile time, the javascript may not
     * work, we send the user to the admin page
     *
     * Abstract item does not use the getter method
     * we override then the variable
     *
     * @return array
     */
    protected $params =  array(
            "do" => "admin",
            "page" => helper_plugin_toucher::PLUGIN_NAME
        );


    const MENU_HTML_ELEMENT_ID = 'plugin_' . helper_plugin_toucher::PLUGIN_NAME;


    public function getLinkAttributes($classprefix = 'menuitem ')
    {
        $linkAttributes = parent::getLinkAttributes($classprefix);

        $linkAttributes['id'] = self::MENU_HTML_ELEMENT_ID;

        return $linkAttributes;
    }

    public function getType()
    {
        return "admin";
    }


    public function getTitle()
    {
        $toucher = plugin_load('helper', helper_plugin_toucher::PLUGIN_NAME);
        return $toucher->getLang('menu');
    }

    public function getLabel()
    {
        return ucfirst(helper_plugin_toucher::PLUGIN_NAME);
    }


    public function getSvg()
    {
        /** @var helper_plugin_toucher $toucher */
        $toucher = plugin_load('helper', helper_plugin_toucher::PLUGIN_NAME);
        return $toucher->getIcon();
    }
}
