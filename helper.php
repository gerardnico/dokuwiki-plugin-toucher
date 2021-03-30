<?php


class helper_plugin_toucher extends DokuWiki_Plugin
{
    const CONF_ADMIN_ONLY = 'admin_only';

    /**
     * Touching the configuration file will reset the cache
     */
    function touchLocalConfFile() {
        touch(DOKU_CONF."local.php");
    }

    /**
     * @return bool true if the user can touch the file or the reason why it can't
     *
     * Because a non-empty string is also true
     * Use it like this:
     * $toucher->canTouch()!==true
     *
     */
    public function canTouch()
    {
        $canTouch = true;
        if ($this->getConf(self::CONF_ADMIN_ONLY)) {
            global $USERINFO;
            if( !auth_isadmin($_SERVER['REMOTE_USER'], $USERINFO['grps'])) {
                return "Only admin can touch";
            }
        }
        return $canTouch;
    }

    public function getIcon()
    {
        return __DIR__ . '/images/hand-index-fill.svg';
    }

}
