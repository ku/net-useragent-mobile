<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

/**
 * PHP version 5
 *
 * Copyright (c) 2011 KUMAGAI Kentaro <ku0522a@gmail.com>,
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   Networking
 * @package    Net_UserAgent_Mobile
 * @author     KUMAGAI Kentaro <ku0522a@gmail.com>
 * @copyright  2011 KUMAGAI Kentaro <ku0522a@gmail.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php  New BSD License
 * @version    Release: @package_version@
 * @since      File available since Release 0.1.0
 */

require_once 'Net/UserAgent/Mobile/Common.php';
require_once 'Net/UserAgent/Mobile/Display.php';

// {{{ Net_UserAgent_Mobile_IOS

/**
 * iOS Agent implementation
 *
 * Net_UserAgent_Mobile_IOS is a subclass of
 * {@link Net_UserAgent_Mobile_Common}, which implements iOS based
 * user agents.
 *
 * SYNOPSIS:
 * <code>
 * require_once 'Net/UserAgent/Mobile.php';
 *
 * $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_0 like Mac OS X; en-us)';
 * $agent = Net_UserAgent_Mobile::factory();
 * </code>
 *
 * @category   Networking
 * @package    Net_UserAgent_Mobile
 * @author     KUMAGAI Kentaro <ku0522a@gmail.com> 
 * @copyright  2011 KUMAGAI Kentaro <ku0522a@gmail.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php  New BSD License
 * @version    Release: @package_version@
 * @since      Class available since Release 0.1.0
 */
class Net_UserAgent_Mobile_IOS extends Net_UserAgent_Mobile_Common
{

    // {{{ properties

    /**#@+
     * @access public
     */

    /**#@-*/

    /**#@+
     * @access protected
     */
    protected $_iosVersion;

    protected $_webkitVersion;

    /**#@-*/

    /**#@+
     * @access private
     */

    /**#@-*/

    /**#@+
     * @access public
     */

    // }}}
    // {{{ isNonMobile()

    /**
     * returns true
     *
     * @return boolean
     */
    public function isNonMobile()
    {
        return true;
    }

    // }}}
    // {{{ isIOS()

    /**
     * returns true
     *
     * @return boolean
     */
    public function isIOS()
    {
        return true;
    }

    // }}}
    // {{{ parse()

    /**
     * Parses HTTP_USER_AGENT string.
     *
     * @param string $userAgent User-Agent string
     */
    public function parse($userAgent)
    {
        if (preg_match('!^(\w+)/((\d+)(\.\d+)*)!', $userAgent, $m)) {
            $this->name = $m[1];
            $this->version = $m[2];
        }
        if (preg_match('!\biPhone OS\s+((\d+)(_\d+)*)\b!i', $userAgent, $m)) {
                $this->_iosVersion = preg_replace('/_/', '.', $m[1]);
        }
        if (preg_match('!\bAppleWebKit/((\d+)(\.\d+)*)\b!i', $userAgent, $m)) {
                $this->_webkitVersion = $m[1];
        }
    }

    // }}}
    // {{{ makeDisplay()

    /**
     * create a new {@link Net_UserAgent_Mobile_Display} class instance
     *
     * @return Net_UserAgent_Mobile_Display
     */
    public function makeDisplay()
    {
        return new Net_UserAgent_Mobile_Display(null);
    }

    // }}}
    // {{{ getCarrierShortName()

    /**
     * returns the short name of the carrier
     *
     * @return string
     */
    public function getCarrierShortName()
    {
        return 'N';
    }

    // }}}
    // {{{ getCarrierLongName()

    /**
     * returns the long name of the carrier
     *
     * @return string
     */
    public function getCarrierLongName()
    {
        return 'NonMobile';
    }

    /**#@-*/

    /**#@+
     * @access protected
     */

    /**#@-*/

    /**#@+
     * @access private
     */

    /**#@-*/

    // }}}
    // {{{ getIOSVersion()

    /**
     * returns version of iOS
     *
     * @return string
     */
    public function getIOSVersion()
    {
        return $this->_iosVersion;
    }
    // }}}
    // {{{ getWebKitVersion()

    /**
     * returns version of android
     *
     * @return string
     */
    public function getWebKitVersion()
    {
        return $this->_webkitVersion;
    }
    // }}}
}

// }}}

/*
 * Local Variables:
 * mode: php
 * coding: iso-8859-1
 * tab-width: 4
 * c-basic-offset: 4
 * c-hanging-comment-ender-p: nil
 * indent-tabs-mode: nil
 * End:
 */
