<?php
/**
 * DokuWiki Plugin toucher (Admin Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Andriy Nych <nych.andriy@gmail.com>
 */

// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();

if (!defined('DOKU_LF')) define('DOKU_LF', "\n");
if (!defined('DOKU_TAB')) define('DOKU_TAB', "\t");
if (!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN', DOKU_INC . 'lib/plugins/');

require_once DOKU_PLUGIN . 'admin.php';

class admin_plugin_toucher extends DokuWiki_Admin_Plugin
{

    public function getMenuSort()
    {
        return 13;
    }

    public function forAdminOnly()
    {
        return $this->getConf(helper_plugin_toucher::CONF_ADMIN_ONLY);
    }

    public function getMenuIcon()
    {
        /** @var helper_plugin_toucher $toucher */
        $toucher = plugin_load('helper', 'toucher');
        return $toucher->getIcon();
    }


    public function handle()
    {

        /** @var helper_plugin_toucher $toucher */
        $toucher = plugin_load('helper', 'toucher');


        $reason = $toucher->canTouch();
        if ($reason !== true) {
            msg('Plugin toucher: You can\'t touch the file for the following reason: ' . $reason, -1);
            return false;
        }


        $toucher->touchLocalConfFile();

        msg('Plugin toucher touched configuration files', 1);
        return true;
    }

    public function html()
    {
        ptln('<h1>' . $this->getLang('menu') . '</h1>');
        ptln('<p>Configuration files have been touched.</p>');
        ptln('<p>The cache is now empty.</p>');
    }
}

// vim:ts=4:sw=4:et:
