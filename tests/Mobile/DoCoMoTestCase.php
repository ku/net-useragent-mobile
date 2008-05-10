<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

/**
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Networking
 * @package    Net_UserAgent_Mobile
 * @author     KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @copyright  2008 KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: DoCoMoTestCase.php,v 1.17 2008/05/10 13:14:17 kuboa Exp $
 * @since      File available since Release 0.31.0
 */

require_once 'PHPUnit/Framework/TestCase.php';
require_once 'Net/UserAgent/Mobile/DoCoMo.php';

// {{{ Net_UserAgent_Mobile_DoCoMoTestCase

/**
 * Some tests for Net_UserAgent_Mobile_DoCoMo.
 *
 * @category   Networking
 * @package    Net_UserAgent_Mobile
 * @author     KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @copyright  2008 KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: @package_version@
 * @since      Class available since Release 0.31.0
 */
class Net_UserAgent_Mobile_DoCoMoTestCase extends PHPUnit_Framework_TestCase
{

    // {{{ properties

    /**#@+
     * @access public
     */

    /**#@-*/

    /**#@+
     * @access protected
     */

    /**#@-*/

    /**#@+
     * @access private
     */

    /**
     * @link http://www.nttdocomo.co.jp/service/imode/make/content/spec/useragent/index.html
     * @link http://www.nttdocomo.co.jp/service/imode/make/content/spec/screen_area/index.html
     * @link http://www.nttdocomo.co.jp/binary/pdf/service/imode/make/content/spec/imode_spec.pdf
     * @version Sat, 10 May 2008 11:30:45 GMT
     */
    private $_profiles = array(

                               // HTML 1.0
                               'DoCoMo/1.0/D501i' => array('model' => 'D501i', 'htmlVersion' => '1.0', 'width' => 96, 'height' => 72, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'D', 'series' => '501i'),
                               'DoCoMo/1.0/F501i' => array('model' => 'F501i', 'htmlVersion' => '1.0', 'width' => 112, 'height' => 84, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'F', 'series' => '501i'),
                               'DoCoMo/1.0/N501i' => array('model' => 'N501i', 'htmlVersion' => '1.0', 'width' => 118, 'height' => 128, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'N', 'series' => '501i'),
                               'DoCoMo/1.0/P501i' => array('model' => 'P501i', 'htmlVersion' => '1.0', 'width' => 96, 'height' => 120, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'P', 'series' => '501i'),

                               // HTML 2.0
                               'DoCoMo/1.0/D502i' => array('model' => 'D502i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 90, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'D', 'series' => '502i'),
                               'DoCoMo/1.0/D502i/c10' => array('model' => 'D502i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 90, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '502i'),
                               'DoCoMo/1.0/F502i' => array('model' => 'F502i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 91, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'F', 'series' => '502i'),
                               'DoCoMo/1.0/F502i/c10' => array('model' => 'F502i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 91, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '502i'),
                               'DoCoMo/1.0/N502i' => array('model' => 'N502i', 'htmlVersion' => '2.0', 'width' => 118, 'height' => 128, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'N', 'series' => '502i'),
                               'DoCoMo/1.0/N502i/c08' => array('model' => 'N502i', 'htmlVersion' => '2.0', 'width' => 118, 'height' => 128, 'version' => '1.0', 'cacheSize' => 8, 'isFoma' => false, 'vendor' => 'N', 'series' => '502i'),
                               'DoCoMo/1.0/P502i' => array('model' => 'P502i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 117, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'P', 'series' => '502i'),
                               'DoCoMo/1.0/P502i/c10' => array('model' => 'P502i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 117, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '502i'),
                               'DoCoMo/1.0/NM502i' => array('model' => 'NM502i', 'htmlVersion' => '2.0', 'width' => 111, 'height' => 106, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'NM', 'series' => '502i'),
                               'DoCoMo/1.0/NM502i/c10' => array('model' => 'NM502i', 'htmlVersion' => '2.0', 'width' => 111, 'height' => 106, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'NM', 'series' => '502i'),
                               'DoCoMo/1.0/SO502i' => array('model' => 'SO502i', 'htmlVersion' => '2.0', 'width' => 120, 'height' => 120, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'SO', 'series' => '502i'),
                               'DoCoMo/1.0/F502it' => array('model' => 'F502it', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 91, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'F', 'series' => '502i'),
                               'DoCoMo/1.0/F502it/c10' => array('model' => 'F502it', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 91, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '502i'),
                               'DoCoMo/1.0/N502it' => array('model' => 'N502it', 'htmlVersion' => '2.0', 'width' => 118, 'height' => 128, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'N', 'series' => '502i'),
                               'DoCoMo/1.0/N502it/c10' => array('model' => 'N502it', 'htmlVersion' => '2.0', 'width' => 118, 'height' => 128, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '502i'),
                               'DoCoMo/1.0/SO502iWM/c10' => array('model' => 'SO502iWM', 'htmlVersion' => '2.0', 'width' => 120, 'height' => 113, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'SO', 'series' => '502i'),
                               'DoCoMo/1.0/SH821i' => array('model' => 'SH821i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 78, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'SH', 'series' => '821i'),
                               'DoCoMo/1.0/SH821i/c10' => array('model' => 'SH821i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 78, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'SH', 'series' => '821i'),
                               'DoCoMo/1.0/N821i' => array('model' => 'N821i', 'htmlVersion' => '2.0', 'width' => 118, 'height' => 128, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'N', 'series' => '821i'),
                               'DoCoMo/1.0/N821i/c08' => array('model' => 'N821i', 'htmlVersion' => '2.0', 'width' => 118, 'height' => 128, 'version' => '1.0', 'cacheSize' => 8, 'isFoma' => false, 'vendor' => 'N', 'series' => '821i'),
                               'DoCoMo/1.0/P821i' => array('model' => 'P821i', 'htmlVersion' => '2.0', 'width' => 118, 'height' => 128, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'P', 'series' => '821i'),
                               'DoCoMo/1.0/P821i/c08' => array('model' => 'P821i', 'htmlVersion' => '2.0', 'width' => 118, 'height' => 128, 'version' => '1.0', 'cacheSize' => 8, 'isFoma' => false, 'vendor' => 'P', 'series' => '821i'),
                               'DoCoMo/1.0/D209i' => array('model' => 'D209i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 90, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'D', 'series' => '209i'),
                               'DoCoMo/1.0/D209i/c10' => array('model' => 'D209i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 90, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '209i'),
                               'DoCoMo/1.0/ER209i' => array('model' => 'ER209i', 'htmlVersion' => '2.0', 'width' => 120, 'height' => 72, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'ER', 'series' => '209i'),
                               'DoCoMo/1.0/ER209i/c15' => array('model' => 'ER209i', 'htmlVersion' => '2.0', 'width' => 120, 'height' => 72, 'version' => '1.0', 'cacheSize' => 15, 'isFoma' => false, 'vendor' => 'ER', 'series' => '209i'),
                               'DoCoMo/1.0/F209i' => array('model' => 'F209i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 91, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'F', 'series' => '209i'),
                               'DoCoMo/1.0/F209i/c10' => array('model' => 'F209i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 91, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '209i'),
                               'DoCoMo/1.0/KO209i' => array('model' => 'KO209i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 96, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'KO', 'series' => '209i'),
                               'DoCoMo/1.0/N209i' => array('model' => 'N209i', 'htmlVersion' => '2.0', 'width' => 108, 'height' => 82, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'N', 'series' => '209i'),
                               'DoCoMo/1.0/N209i/c08' => array('model' => 'N209i', 'htmlVersion' => '2.0', 'width' => 108, 'height' => 82, 'version' => '1.0', 'cacheSize' => 8, 'isFoma' => false, 'vendor' => 'N', 'series' => '209i'),
                               'DoCoMo/1.0/P209i' => array('model' => 'P209i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 87, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'P', 'series' => '209i'),
                               'DoCoMo/1.0/P209i/c10' => array('model' => 'P209i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 87, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '209i'),
                               'DoCoMo/1.0/P209is' => array('model' => 'P209is', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 87, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'P', 'series' => '209i'),
                               'DoCoMo/1.0/P209is/c10' => array('model' => 'P209is', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 87, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '209i'),
                               'DoCoMo/1.0/R209i' => array('model' => 'R209i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 72, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'R', 'series' => '209i'),
                               'DoCoMo/1.0/P651ps' => array('model' => 'P651ps', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 87, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'P', 'series' => '651'),
                               'DoCoMo/1.0/R691i' => array('model' => 'R691i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 72, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'R', 'series' => '691i'),
                               'DoCoMo/1.0/F210i/c10' => array('model' => 'F210i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 113, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '210i'),
                               'DoCoMo/1.0/N210i' => array('model' => 'N210i', 'htmlVersion' => '2.0', 'width' => 118, 'height' => 113, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'N', 'series' => '210i'),
                               'DoCoMo/1.0/N210i/c10' => array('model' => 'N210i', 'htmlVersion' => '2.0', 'width' => 118, 'height' => 113, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '210i'),
                               'DoCoMo/1.0/P210i' => array('model' => 'P210i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 91, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'P', 'series' => '210i'),
                               'DoCoMo/1.0/P210i/c10' => array('model' => 'P210i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 91, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '210i'),
                               'DoCoMo/1.0/KO210i' => array('model' => 'KO210i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 96, 'version' => '1.0', 'cacheSize' => 5, 'isFoma' => false, 'vendor' => 'KO', 'series' => '210i'),
                               'DoCoMo/1.0/KO210i/c10' => array('model' => 'KO210i', 'htmlVersion' => '2.0', 'width' => 96, 'height' => 96, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'KO', 'series' => '210i'),
                               'DoCoMo/1.0/F671i/c10' => array('model' => 'F671i', 'htmlVersion' => '2.0', 'width' => 120, 'height' => 126, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '671i'),

                               // HTML 3.0
                               'DoCoMo/1.0/D210i/c10' => array('model' => 'D210i', 'htmlVersion' => '3.0', 'width' => 96, 'height' => 91, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '210i'),
                               'DoCoMo/1.0/SO210i/c10' => array('model' => 'SO210i', 'htmlVersion' => '3.0', 'width' => 120, 'height' => 113, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'SO', 'series' => '210i'),
                               'DoCoMo/1.0/F503i/c10' => array('model' => 'F503i', 'htmlVersion' => '3.0', 'width' => 120, 'height' => 130, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '503i'),
                               'DoCoMo/1.0/F503iS/c10' => array('model' => 'F503iS', 'htmlVersion' => '3.0', 'width' => 120, 'height' => 130, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '503i'),
                               'DoCoMo/1.0/P503i/c10' => array('model' => 'P503i', 'htmlVersion' => '3.0', 'width' => 120, 'height' => 130, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '503i'),
                               'DoCoMo/1.0/P503iS/c10' => array('model' => 'P503iS', 'htmlVersion' => '3.0', 'width' => 120, 'height' => 130, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '503i'),
                               'DoCoMo/1.0/N503i/c10' => array('model' => 'N503i', 'htmlVersion' => '3.0', 'width' => 118, 'height' => 128, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '503i'),
                               'DoCoMo/1.0/N503iS/c10' => array('model' => 'N503iS', 'htmlVersion' => '3.0', 'width' => 118, 'height' => 128, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '503i'),
                               'DoCoMo/1.0/SO503i/c10' => array('model' => 'SO503i', 'htmlVersion' => '3.0', 'width' => 120, 'height' => 113, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'SO', 'series' => '503i'),
                               'DoCoMo/1.0/SO503iS/c10' => array('model' => 'SO503iS', 'htmlVersion' => '3.0', 'width' => 120, 'height' => 113, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'SO', 'series' => '503i'),
                               'DoCoMo/1.0/D503i/c10' => array('model' => 'D503i', 'htmlVersion' => '3.0', 'width' => 132, 'height' => 126, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '503i'),
                               'DoCoMo/1.0/D503iS/c10' => array('model' => 'D503iS', 'htmlVersion' => '3.0', 'width' => 132, 'height' => 126, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '503i'),
                               'DoCoMo/1.0/F211i/c10' => array('model' => 'F211i', 'htmlVersion' => '3.0', 'width' => 96, 'height' => 113, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '211i'),
                               'DoCoMo/1.0/D211i/c10' => array('model' => 'D211i', 'htmlVersion' => '3.0', 'width' => 100, 'height' => 91, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '211i'),
                               'DoCoMo/1.0/N211i/c10' => array('model' => 'N211i', 'htmlVersion' => '3.0', 'width' => 118, 'height' => 128, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '211i'),
                               'DoCoMo/1.0/N211iS/c10' => array('model' => 'N211iS', 'htmlVersion' => '3.0', 'width' => 118, 'height' => 128, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '211i'),
                               'DoCoMo/1.0/P211i/c10' => array('model' => 'P211i', 'htmlVersion' => '3.0', 'width' => 120, 'height' => 130, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '211i'),
                               'DoCoMo/1.0/P211iS/c10' => array('model' => 'P211iS', 'htmlVersion' => '3.0', 'width' => 120, 'height' => 130, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '211i'),
                               'DoCoMo/1.0/SO211i/c10' => array('model' => 'SO211i', 'htmlVersion' => '3.0', 'width' => 120, 'height' => 112, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'SO', 'series' => '211i'),
                               'DoCoMo/1.0/R211i/c10' => array('model' => 'R211i', 'htmlVersion' => '3.0', 'width' => 96, 'height' => 98, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'R', 'series' => '211i'),
                               'DoCoMo/1.0/SH251i/c10' => array('model' => 'SH251i', 'htmlVersion' => '3.0', 'width' => 120, 'height' => 130, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'SH', 'series' => '251i'),
                               'DoCoMo/1.0/SH251iS/c10' => array('model' => 'SH251iS', 'htmlVersion' => '3.0', 'width' => 176, 'height' => 187, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'SH', 'series' => '251i'),
                               'DoCoMo/1.0/R692i/c10' => array('model' => 'R692i', 'htmlVersion' => '3.0', 'width' => 96, 'height' => 98, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'R', 'series' => '692i'),
                               'DoCoMo/2.0 N2001(c10)' => array('model' => 'N2001', 'htmlVersion' => '3.0', 'width' => 118, 'height' => 128, 'version' => '2.0', 'cacheSize' => 10, 'isFoma' => true, 'vendor' => 'N', 'series' => 'FOMA'),
                               'DoCoMo/2.0 N2002(c100)' => array('model' => 'N2002', 'htmlVersion' => '3.0', 'width' => 118, 'height' => 128, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => 'FOMA'),
                               'DoCoMo/2.0 P2002(c100)' => array('model' => 'P2002', 'htmlVersion' => '3.0', 'width' => 118, 'height' => 128, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => 'FOMA'),
                               'DoCoMo/2.0 D2101V(c100)' => array('model' => 'D2101V', 'htmlVersion' => '3.0', 'width' => 120, 'height' => 130, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => 'FOMA'),
                               'DoCoMo/2.0 P2101V(c100)' => array('model' => 'P2101V', 'htmlVersion' => '3.0', 'width' => 163, 'height' => 182, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => 'FOMA'),
                               'DoCoMo/2.0 MST_v_SH2101V(c100)' => array('model' => 'SH2101V', 'htmlVersion' => '3.0', 'width' => 800, 'height' => 600, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => 'FOMA'),
                               'DoCoMo/2.0 T2101V(c100)' => array('model' => 'T2101V', 'htmlVersion' => '3.0', 'width' => 176, 'height' => 144, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'T', 'series' => 'FOMA'),

                               // HTML 4.0
                               'DoCoMo/1.0/D504i/c10' => array('model' => 'D504i', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '504i'),
                               'DoCoMo/1.0/D504i/c30/TD' => array('model' => 'D504i', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'D', 'series' => '504i', 'status' => 'TD'),
                               'DoCoMo/1.0/D504i/c10/TJ' => array('model' => 'D504i', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '504i', 'status' => 'TJ'),
                               'DoCoMo/1.0/F504i/c10/TB' => array('model' => 'F504i', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 136, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '504i', 'status' => 'TB'),
                               'DoCoMo/1.0/F504i/c30/TD' => array('model' => 'F504i', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 136, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'F', 'series' => '504i', 'status' => 'TD'),
                               'DoCoMo/1.0/F504i/c10/TJ' => array('model' => 'F504i', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 136, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '504i', 'status' => 'TJ'),
                               'DoCoMo/1.0/F504iS/c10/TB' => array('model' => 'F504iS', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 136, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '504i', 'status' => 'TB'),
                               'DoCoMo/1.0/F504iS/c30/TD' => array('model' => 'F504iS', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 136, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'F', 'series' => '504i', 'status' => 'TD'),
                               'DoCoMo/1.0/F504iS/c10/TJ' => array('model' => 'F504iS', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 136, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '504i', 'status' => 'TJ'),
                               'DoCoMo/1.0/N504i/c10/TB' => array('model' => 'N504i', 'htmlVersion' => '4.0', 'width' => 160, 'height' => 180, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '504i', 'status' => 'TB'),
                               'DoCoMo/1.0/N504i/c30/TD' => array('model' => 'N504i', 'htmlVersion' => '4.0', 'width' => 160, 'height' => 180, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'N', 'series' => '504i', 'status' => 'TD'),
                               'DoCoMo/1.0/N504i/c10/TJ' => array('model' => 'N504i', 'htmlVersion' => '4.0', 'width' => 160, 'height' => 180, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '504i', 'status' => 'TJ'),
                               'DoCoMo/1.0/N504iS/c10/TB' => array('model' => 'N504iS', 'htmlVersion' => '4.0', 'width' => 160, 'height' => 180, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '504i', 'status' => 'TB'),
                               'DoCoMo/1.0/N504iS/c30/TD' => array('model' => 'N504iS', 'htmlVersion' => '4.0', 'width' => 160, 'height' => 180, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'N', 'series' => '504i', 'status' => 'TD'),
                               'DoCoMo/1.0/N504iS/c10/TJ' => array('model' => 'N504iS', 'htmlVersion' => '4.0', 'width' => 160, 'height' => 180, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '504i', 'status' => 'TJ'),
                               'DoCoMo/1.0/SO504i/c10/TB' => array('model' => 'SO504i', 'htmlVersion' => '4.0', 'width' => 120, 'height' => 112, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'SO', 'series' => '504i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO504i/c30/TD' => array('model' => 'SO504i', 'htmlVersion' => '4.0', 'width' => 120, 'height' => 112, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'SO', 'series' => '504i', 'status' => 'TD'),
                               'DoCoMo/1.0/SO504i/c10/TJ' => array('model' => 'SO504i', 'htmlVersion' => '4.0', 'width' => 120, 'height' => 112, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'SO', 'series' => '504i', 'status' => 'TJ'),
                               'DoCoMo/1.0/P504i/c10/TB' => array('model' => 'P504i', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '504i', 'status' => 'TB'),
                               'DoCoMo/1.0/P504i/c30/TD' => array('model' => 'P504i', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'P', 'series' => '504i', 'status' => 'TD'),
                               'DoCoMo/1.0/P504i/c10/TJ' => array('model' => 'P504i', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '504i', 'status' => 'TJ'),
                               'DoCoMo/1.0/P504iS/c10/TB' => array('model' => 'P504iS', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '504i', 'status' => 'TB'),
                               'DoCoMo/1.0/P504iS/c30/TD' => array('model' => 'P504iS', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'P', 'series' => '504i', 'status' => 'TD'),
                               'DoCoMo/1.0/P504iS/c10/TJ' => array('model' => 'P504iS', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '504i', 'status' => 'TJ'),
                               'DoCoMo/1.0/D251i/c10' => array('model' => 'D251i', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '251i'),
                               'DoCoMo/1.0/D251iS/c10/TB' => array('model' => 'D251iS', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '251i', 'status' => 'TB'),
                               'DoCoMo/1.0/F251i/c10/TB' => array('model' => 'F251i', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 140, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '251i', 'status' => 'TB'),
                               'DoCoMo/1.0/F251i/c10/c10/TB' => array('model' => 'F251i', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 140, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '251i', 'status' => 'TB'),
                               'DoCoMo/1.0/N251i/c10/TB' => array('model' => 'N251i', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 140, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '251i', 'status' => 'TB'),
                               'DoCoMo/1.0/N251iS/c10/TB' => array('model' => 'N251iS', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 140, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '251i', 'status' => 'TB'),
                               'DoCoMo/1.0/P251iS/c10/TB' => array('model' => 'P251iS', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '251i', 'status' => 'TB'),
                               'DoCoMo/1.0/F671iS/c10/TB' => array('model' => 'F671iS', 'htmlVersion' => '4.0', 'width' => 160, 'height' => 120, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '671i', 'status' => 'TB'),
                               'DoCoMo/1.0/F212i/c10/TB' => array('model' => 'F212i', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 136, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '212i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO212i/c10/TB' => array('model' => 'SO212i', 'htmlVersion' => '4.0', 'width' => 120, 'height' => 112, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'SO', 'series' => '212i', 'status' => 'TB'),
                               'DoCoMo/1.0/F661i/c10/TB' => array('model' => 'F661i', 'htmlVersion' => '4.0', 'width' => 132, 'height' => 136, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '661i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/1.0/F672i/c10/TB' => array('model' => 'F672i', 'htmlVersion' => '4.0', 'width' => 160, 'height' => 120, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'F', 'series' => '672i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO213i/c10/TB' => array('model' => 'SO213i', 'htmlVersion' => '4.0', 'width' => 120, 'height' => 112, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'SO', 'series' => '213i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO213iS/c10/TB' => array('model' => 'SO213iS', 'htmlVersion' => '4.0', 'width' => 120, 'height' => 112, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'SO', 'series' => '213i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO213iWR/c10/TB' => array('model' => 'SO213iWR', 'htmlVersion' => '4.0', 'width' => 120, 'height' => 112, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'SO', 'series' => '213i', 'status' => 'TB'),
                               'DoCoMo/2.0 F2051(c100;TB)' => array('model' => 'F2051', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 182, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => 'FOMA', 'status' => 'TB'),
                               'DoCoMo/2.0 F2051(c100;TD)' => array('model' => 'F2051', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 182, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => 'FOMA', 'status' => 'TD'),
                               'DoCoMo/2.0 F2051(c100;TD)' => array('model' => 'F2051', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 182, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => 'FOMA', 'status' => 'TD'),
                               'DoCoMo/2.0 F2051(c100;TJ)' => array('model' => 'F2051', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 182, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => 'FOMA', 'status' => 'TJ'),
                               'DoCoMo/2.0 N2051(c100;TB)' => array('model' => 'N2051', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 198, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => 'FOMA', 'status' => 'TB'),
                               'DoCoMo/2.0 N2051(c100;TD)' => array('model' => 'N2051', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 198, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => 'FOMA', 'status' => 'TD'),
                               'DoCoMo/2.0 N2051(c100;TJ)' => array('model' => 'N2051', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 198, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => 'FOMA', 'status' => 'TJ'),
                               'DoCoMo/2.0 P2102V(c100;TB)' => array('model' => 'P2102V', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 198, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => 'FOMA', 'status' => 'TB'),
                               'DoCoMo/2.0 P2102V(c100;TD)' => array('model' => 'P2102V', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 198, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => 'FOMA', 'status' => 'TD'),
                               'DoCoMo/2.0 P2102V(c100;TJ)' => array('model' => 'P2102V', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 198, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => 'FOMA', 'status' => 'TJ'),
                               'DoCoMo/2.0 F2102V(c100;TB)' => array('model' => 'F2102V', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 182, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => 'FOMA', 'status' => 'TB'),
                               'DoCoMo/2.0 F2102V(c100;TD)' => array('model' => 'F2102V', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 182, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => 'FOMA', 'status' => 'TD'),
                               'DoCoMo/2.0 F2102V(c100;TJ)' => array('model' => 'F2102V', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 182, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => 'FOMA', 'status' => 'TJ'),
                               'DoCoMo/2.0 N2102V(c100;TB)' => array('model' => 'N2102V', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 198, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => 'FOMA', 'status' => 'TB'),
                               'DoCoMo/2.0 N2102V(c100;TD)' => array('model' => 'N2102V', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 198, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => 'FOMA', 'status' => 'TD'),
                               'DoCoMo/2.0 N2102V(c100;TJ)' => array('model' => 'N2102V', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 198, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => 'FOMA', 'status' => 'TJ'),
                               'DoCoMo/2.0 N2701(c100;TB)' => array('model' => 'N2701', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 198, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => 'FOMA', 'status' => 'TB'),
                               'DoCoMo/1.0/N2701/c10/TB' => array('model' => 'N2701', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 198, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => 'FOMA', 'status' => 'TB'),
                               'DoCoMo/2.0 N2701(c100;TD)' => array('model' => 'N2701', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 198, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => 'FOMA', 'status' => 'TD'),
                               'DoCoMo/2.0 N2701(c100;TJ)' => array('model' => 'N2701', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 198, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => 'FOMA', 'status' => 'TJ'),
                               'DoCoMo/2.0 NM850iG(c100;TB;W22H10)' => array('model' => 'NM850iG', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 144, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'NM', 'series' => '850i', 'status' => 'TB'),
                               'DoCoMo/2.0 NM850iG(c100;TD)' => array('model' => 'NM850iG', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 144, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'NM', 'series' => '850i', 'status' => 'TD'),
                               'DoCoMo/2.0 NM850iG(c100;TJ)' => array('model' => 'NM850iG', 'htmlVersion' => '4.0', 'width' => 176, 'height' => 144, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'NM', 'series' => '850i', 'status' => 'TJ'),
                               'DoCoMo/2.0 NM705i(c100;TB;W15H13)' => array('model' => 'NM705i', 'htmlVersion' => '4.0', 'width' => 231, 'height' => 235, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'NM', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 NM705i(c100;TD)' => array('model' => 'NM705i', 'htmlVersion' => '4.0', 'width' => 231, 'height' => 235, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'NM', 'series' => '705i', 'status' => 'TD'),
                               'DoCoMo/2.0 NM705i(c100;TJ)' => array('model' => 'NM705i', 'htmlVersion' => '4.0', 'width' => 231, 'height' => 235, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'NM', 'series' => '705i', 'status' => 'TJ'),

                               // HTML 5.0
                               'DoCoMo/1.0/D505i/c20/TB/W20H10' => array('model' => 'D505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'D', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/D505i/c30/TD' => array('model' => 'D505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'D', 'series' => '505i', 'status' => 'TD'),
                               'DoCoMo/1.0/D505i/c20/TJ' => array('model' => 'D505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'D', 'series' => '505i', 'status' => 'TJ'),
                               'DoCoMo/1.0/SO505i/c20/TB/W21H09' => array('model' => 'SO505i', 'htmlVersion' => '5.0', 'width' => 256, 'height' => 240, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO505i/c20/TB/W18H08' => array('model' => 'SO505i', 'htmlVersion' => '5.0', 'width' => 256, 'height' => 240, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO505i/c30/TD' => array('model' => 'SO505i', 'htmlVersion' => '5.0', 'width' => 256, 'height' => 240, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'SO', 'series' => '505i', 'status' => 'TD'),
                               'DoCoMo/1.0/SO505i/c20/TJ' => array('model' => 'SO505i', 'htmlVersion' => '5.0', 'width' => 256, 'height' => 240, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '505i', 'status' => 'TJ'),
                               'DoCoMo/1.0/SH505i/c20/TB/W24H12' => array('model' => 'SH505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SH', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/SH505i2/c20/TB/W24H12' => array('model' => 'SH505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SH', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/SH505i/c30/TD' => array('model' => 'SH505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'SH', 'series' => '505i', 'status' => 'TD'),
                               'DoCoMo/1.0/SH505i2/c30/TD' => array('model' => 'SH505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'SH', 'series' => '505i', 'status' => 'TD'),
                               'DoCoMo/1.0/SH505i/c20/TJ' => array('model' => 'SH505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SH', 'series' => '505i', 'status' => 'TJ'),
                               'DoCoMo/1.0/SH505i2/c20/TJ' => array('model' => 'SH505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SH', 'series' => '505i', 'status' => 'TJ'),
                               'DoCoMo/1.0/N505i/c20/TB/W20H10' => array('model' => 'N505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/N505i/c20/TB/W30H14' => array('model' => 'N505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/N505i/c20/TB/W16H08' => array('model' => 'N505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/N505i/c30/TD' => array('model' => 'N505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'N', 'series' => '505i', 'status' => 'TD'),
                               'DoCoMo/1.0/N505i/c20/TJ' => array('model' => 'N505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '505i', 'status' => 'TJ'),
                               'DoCoMo/1.0/F505i/c20/TB/W20H10' => array('model' => 'F505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 268, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'F', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/F505i/c20/TB/W24H12' => array('model' => 'F505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 268, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'F', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/F505i/c30/TD' => array('model' => 'F505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 268, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'F', 'series' => '505i', 'status' => 'TD'),
                               'DoCoMo/1.0/F505i/c20/TJ' => array('model' => 'F505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 268, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'F', 'series' => '505i', 'status' => 'TJ'),
                               'DoCoMo/1.0/P505i/c20/TB/W20H10' => array('model' => 'P505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'P', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/P505i/c30/TD' => array('model' => 'P505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'P', 'series' => '505i', 'status' => 'TD'),
                               'DoCoMo/1.0/P505i/c20/TJ' => array('model' => 'P505i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'P', 'series' => '505i', 'status' => 'TJ'),
                               'DoCoMo/1.0/D505iS/c20/TB/W20H10' => array('model' => 'D505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'D', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/D505iS/c30/TD' => array('model' => 'D505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'D', 'series' => '505i', 'status' => 'TD'),
                               'DoCoMo/1.0/D505iS/c20/TJ' => array('model' => 'D505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'D', 'series' => '505i', 'status' => 'TJ'),
                               'DoCoMo/1.0/P505iS/c20/TB/W20H10' => array('model' => 'P505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'P', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/P505iS/c30/TD' => array('model' => 'P505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'P', 'series' => '505i', 'status' => 'TD'),
                               'DoCoMo/1.0/P505iS/c20/TJ' => array('model' => 'P505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'P', 'series' => '505i', 'status' => 'TJ'),
                               'DoCoMo/1.0/N505iS/c20/TB/W20H10' => array('model' => 'N505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/N505iS/c20/TB/W30H14' => array('model' => 'N505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/N505iS/c20/TB/W16H08' => array('model' => 'N505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/N505iS/c30/TD' => array('model' => 'N505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'N', 'series' => '505i', 'status' => 'TD'),
                               'DoCoMo/1.0/N505iS/c20/TJ' => array('model' => 'N505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '505i', 'status' => 'TJ'),
                               'DoCoMo/1.0/SO505iS/c20/TB/W20H10' => array('model' => 'SO505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO505iS/c20/TB/W40H21' => array('model' => 'SO505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO505iS/c20/TB/W30H16' => array('model' => 'SO505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO505iS/c20/TB/W16H08' => array('model' => 'SO505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO505iS/c30/TD' => array('model' => 'SO505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'SO', 'series' => '505i', 'status' => 'TD'),
                               'DoCoMo/1.0/SO505iS/c20/TJ' => array('model' => 'SO505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '505i', 'status' => 'TJ'),
                               'DoCoMo/1.0/SH505iS/c20/TB/W24H12' => array('model' => 'SH505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SH', 'series' => '505i', 'status' => 'TB'),
                               'DoCoMo/1.0/SH505iS/c30/TD' => array('model' => 'SH505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'SH', 'series' => '505i', 'status' => 'TD'),
                               'DoCoMo/1.0/SH505iS/c20/TJ' => array('model' => 'SH505iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SH', 'series' => '505i', 'status' => 'TJ'),
                               'DoCoMo/1.0/F505iGPS/c20/TB/W20H10' => array('model' => 'F505iGPS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 268, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'F', 'series' => '505i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/1.0/F505iGPS/c20/TB/W24H12' => array('model' => 'F505iGPS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 268, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'F', 'series' => '505i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/1.0/F505iGPS/c30/TD' => array('model' => 'F505iGPS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 268, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'F', 'series' => '505i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/1.0/F505iGPS/c20/TJ' => array('model' => 'F505iGPS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 268, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'F', 'series' => '505i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/1.0/D252i/c10/TB/W25H12' => array('model' => 'D252i', 'htmlVersion' => '5.0', 'width' => 176, 'height' => 198, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '252i', 'status' => 'TB'),
                               'DoCoMo/1.0/SH252i/c20/TB/W24H12' => array('model' => 'SH252i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SH', 'series' => '252i', 'status' => 'TB'),
                               'DoCoMo/1.0/P252i/c10/TB/W22H10' => array('model' => 'P252i', 'htmlVersion' => '5.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '252i', 'status' => 'TB'),
                               'DoCoMo/1.0/N252i/c10/TB/W22H10' => array('model' => 'N252i', 'htmlVersion' => '5.0', 'width' => 132, 'height' => 140, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '252i', 'status' => 'TB'),
                               'DoCoMo/1.0/N252i/c10/TB/W26H11' => array('model' => 'N252i', 'htmlVersion' => '5.0', 'width' => 132, 'height' => 140, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '252i', 'status' => 'TB'),
                               'DoCoMo/1.0/N252i/c10/TB/W16H07' => array('model' => 'N252i', 'htmlVersion' => '5.0', 'width' => 132, 'height' => 140, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '252i', 'status' => 'TB'),
                               'DoCoMo/1.0/P252iS/c10/TB/W22H10' => array('model' => 'P252iS', 'htmlVersion' => '5.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '252i', 'status' => 'TB'),
                               'DoCoMo/1.0/D506i/c20/TB/W20H10' => array('model' => 'D506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'D', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/D506i/c20/TB/W40H18' => array('model' => 'D506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'D', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/D506i/c20/TB/W30H14' => array('model' => 'D506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'D', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/D506i/c20/TB/W16H08' => array('model' => 'D506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'D', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/D506i/c30/TD' => array('model' => 'D506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'D', 'series' => '506i', 'status' => 'TD'),
                               'DoCoMo/1.0/D506i/c20/TJ' => array('model' => 'D506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'D', 'series' => '506i', 'status' => 'TJ'),
                               'DoCoMo/1.0/F506i/c20/TB/W20H10' => array('model' => 'F506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 268, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'F', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/F506i/c20/TB/W24H12' => array('model' => 'F506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 268, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'F', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/F506i/c30/TD' => array('model' => 'F506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 268, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'F', 'series' => '506i', 'status' => 'TD'),
                               'DoCoMo/1.0/F506i/c20/TJ' => array('model' => 'F506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 268, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'F', 'series' => '506i', 'status' => 'TJ'),
                               'DoCoMo/1.0/N506i/c20/TB/W20H11' => array('model' => 'N506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 295, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/N506i/c20/TB/W30H15' => array('model' => 'N506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 295, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/N506i/c20/TB/W16H09' => array('model' => 'N506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 295, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/N506i/c30/TD' => array('model' => 'N506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 295, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'N', 'series' => '506i', 'status' => 'TD'),
                               'DoCoMo/1.0/N506i/c20/TJ' => array('model' => 'N506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 295, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '506i', 'status' => 'TJ'),
                               'DoCoMo/1.0/P506iC/c20/TB/W20H10' => array('model' => 'P506iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'P', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/P506iC/c20/TB/W30H14' => array('model' => 'P506iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'P', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/P506iC/c30/TD' => array('model' => 'P506iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'P', 'series' => '506i', 'status' => 'TD'),
                               'DoCoMo/1.0/P506iC/c20/TJ' => array('model' => 'P506iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'P', 'series' => '506i', 'status' => 'TJ'),
                               'DoCoMo/1.0/SH506iC/c20/TB/W24H12' => array('model' => 'SH506iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SH', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/SH506iC/c20/TB/W40H19' => array('model' => 'SH506iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SH', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/SH506iC/c20/TB/W20H10' => array('model' => 'SH506iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SH', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/SH506iC/c30/TD' => array('model' => 'SH506iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'SH', 'series' => '506i', 'status' => 'TD'),
                               'DoCoMo/1.0/SH506iC/c20/TJ' => array('model' => 'SH506iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SH', 'series' => '506i', 'status' => 'TJ'),
                               'DoCoMo/1.0/SO506iC/c20/TB/W20H10' => array('model' => 'SO506iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO506iC/c20/TB/W40H21' => array('model' => 'SO506iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO506iC/c20/TB/W30H16' => array('model' => 'SO506iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO506iC/c20/TB/W16H08' => array('model' => 'SO506iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO506iC/c30/TD' => array('model' => 'SO506iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TD'),
                               'DoCoMo/1.0/SO506iC/c20/TJ' => array('model' => 'SO506iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TJ'),
                               'DoCoMo/1.0/N506iS/c20/TB/W20H11' => array('model' => 'N506iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 295, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/N506iS/c20/TB/W30H15' => array('model' => 'N506iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 295, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/N506iS/c20/TB/W16H09' => array('model' => 'N506iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 295, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/N506iS/c30/TD' => array('model' => 'N506iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 295, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'N', 'series' => '506i', 'status' => 'TD'),
                               'DoCoMo/1.0/N506iS/c20/TJ' => array('model' => 'N506iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 295, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '506i', 'status' => 'TJ'),
                               'DoCoMo/1.0/SO506i/c20/TB/W20H10' => array('model' => 'SO506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO506i/c20/TB/W40H21' => array('model' => 'SO506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO506i/c20/TB/W30H16' => array('model' => 'SO506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO506i/c20/TB/W16H08' => array('model' => 'SO506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO506i/c30/TD' => array('model' => 'SO506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TD'),
                               'DoCoMo/1.0/SO506i/c20/TJ' => array('model' => 'SO506i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TJ'),
                               'DoCoMo/1.0/SO506iS/c20/TB/W20H10' => array('model' => 'SO506iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO506iS/c20/TB/W40H21' => array('model' => 'SO506iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO506iS/c20/TB/W30H16' => array('model' => 'SO506iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO506iS/c20/TB/W16H08' => array('model' => 'SO506iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/SO506iS/c30/TD' => array('model' => 'SO506iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TD'),
                               'DoCoMo/1.0/SO506iS/c20/TJ' => array('model' => 'SO506iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'SO', 'series' => '506i', 'status' => 'TJ'),
                               'DoCoMo/1.0/N506iS2/c20/TB/W20H11' => array('model' => 'N506iS2', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 295, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/N506iS2/c20/TB/W30H15' => array('model' => 'N506iS2', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 295, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/N506iS2/c20/TB/W16H09' => array('model' => 'N506iS2', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 295, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '506i', 'status' => 'TB'),
                               'DoCoMo/1.0/N506iS2/c30/TD' => array('model' => 'N506iS2', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 295, 'version' => '1.0', 'cacheSize' => 30, 'isFoma' => false, 'vendor' => 'N', 'series' => '506i', 'status' => 'TD'),
                               'DoCoMo/1.0/N506iS2/c20/TJ' => array('model' => 'N506iS2', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 295, 'version' => '1.0', 'cacheSize' => 20, 'isFoma' => false, 'vendor' => 'N', 'series' => '506i', 'status' => 'TJ'),
                               'DoCoMo/1.0/D253i/c10/TB/W17H09' => array('model' => 'D253i', 'htmlVersion' => '5.0', 'width' => 176, 'height' => 198, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '253i', 'status' => 'TB'),
                               'DoCoMo/1.0/D253i/c10/TB/W14H07' => array('model' => 'D253i', 'htmlVersion' => '5.0', 'width' => 176, 'height' => 198, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '253i', 'status' => 'TB'),
                               'DoCoMo/1.0/D253i/c10/TB/W25H12' => array('model' => 'D253i', 'htmlVersion' => '5.0', 'width' => 176, 'height' => 198, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '253i', 'status' => 'TB'),
                               'DoCoMo/1.0/D253i/c10/TB/W14H06' => array('model' => 'D253i', 'htmlVersion' => '5.0', 'width' => 176, 'height' => 198, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '253i', 'status' => 'TB'),
                               'DoCoMo/1.0/N253i/c10/TB/W20H10' => array('model' => 'N253i', 'htmlVersion' => '5.0', 'width' => 160, 'height' => 180, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '253i', 'status' => 'TB'),
                               'DoCoMo/1.0/N253i/c10/TB/W26H12' => array('model' => 'N253i', 'htmlVersion' => '5.0', 'width' => 160, 'height' => 180, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '253i', 'status' => 'TB'),
                               'DoCoMo/1.0/N253i/c10/TB/W16H08' => array('model' => 'N253i', 'htmlVersion' => '5.0', 'width' => 160, 'height' => 180, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'N', 'series' => '253i', 'status' => 'TB'),
                               'DoCoMo/1.0/P253i/c10/TB/W22H10' => array('model' => 'P253i', 'htmlVersion' => '5.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '253i', 'status' => 'TB'),
                               'DoCoMo/1.0/D253iWM/c10/TB/W27H08' => array('model' => 'D253iWM', 'htmlVersion' => '5.0', 'width' => 220, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '253i', 'status' => 'TB'),
                               'DoCoMo/1.0/D253iWM/c10/TB/W22H06' => array('model' => 'D253iWM', 'htmlVersion' => '5.0', 'width' => 220, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '253i', 'status' => 'TB'),
                               'DoCoMo/1.0/D253iWM/c10/TB/W36H10' => array('model' => 'D253iWM', 'htmlVersion' => '5.0', 'width' => 220, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'D', 'series' => '253i', 'status' => 'TB'),
                               'DoCoMo/1.0/P253iS/c10/TB/W22H10' => array('model' => 'P253iS', 'htmlVersion' => '5.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '253i', 'status' => 'TB'),
                               'DoCoMo/1.0/P213i/c10/TB/W22H10' => array('model' => 'P213i', 'htmlVersion' => '5.0', 'width' => 132, 'height' => 144, 'version' => '1.0', 'cacheSize' => 10, 'isFoma' => false, 'vendor' => 'P', 'series' => '213i', 'status' => 'TB'),
                               'DoCoMo/2.0 F900i(c100;TB;W22H12)' => array('model' => 'F900i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 F900i(c100;TB;W18H10)' => array('model' => 'F900i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 F900i(c100;TB;W28H15)' => array('model' => 'F900i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 F900i(c100;TD)' => array('model' => 'F900i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '900i', 'status' => 'TD'),
                               'DoCoMo/2.0 F900i(c100;TJ)' => array('model' => 'F900i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '900i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N900i(c100;TB;W24H12)' => array('model' => 'N900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 N900i(c100;TB;W20H10)' => array('model' => 'N900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 N900i(c100;TB;W30H15)' => array('model' => 'N900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 N900i(c100;TD)' => array('model' => 'N900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TD'),
                               'DoCoMo/2.0 N900i(c100;TJ)' => array('model' => 'N900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P900i(c100;TB;W24H11)' => array('model' => 'P900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 P900i(c100;TB;W20H09)' => array('model' => 'P900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 P900i(c100;TB;W30H14)' => array('model' => 'P900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 P900i(c100;TD)' => array('model' => 'P900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '900i', 'status' => 'TD'),
                               'DoCoMo/2.0 P900i(c100;TJ)' => array('model' => 'P900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '900i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SH900i(c100;TB;W24H12)' => array('model' => 'SH900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH900i(c100;TD)' => array('model' => 'SH900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '900i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH900i(c100;TJ)' => array('model' => 'SH900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '900i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F900iT(c100;TB;W22H12)' => array('model' => 'F900iT', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 F900iT(c100;TB;W18H10)' => array('model' => 'F900iT', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 F900iT(c100;TB;W28H15)' => array('model' => 'F900iT', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 F900iT(c100;TD)' => array('model' => 'F900iT', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '900i', 'status' => 'TD'),
                               'DoCoMo/2.0 F900iT(c100;TJ)' => array('model' => 'F900iT', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '900i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P900iV(c100;TB;W24H11)' => array('model' => 'P900iV', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 P900iV(c100;TB;W20H09)' => array('model' => 'P900iV', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 P900iV(c100;TB;W30H14)' => array('model' => 'P900iV', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 P900iV(c100;TD)' => array('model' => 'P900iV', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '900i', 'status' => 'TD'),
                               'DoCoMo/2.0 P900iV(c100;TJ)' => array('model' => 'P900iV', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 266, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '900i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N900iS(c100;TB;W24H12)' => array('model' => 'N900iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 N900iS(c100;TB;W20H10)' => array('model' => 'N900iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 N900iS(c100;TB;W30H15)' => array('model' => 'N900iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 N900iS(c100;TD)' => array('model' => 'N900iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TD'),
                               'DoCoMo/2.0 N900iS(c100;TJ)' => array('model' => 'N900iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TJ'),
                               'DoCoMo/2.0 D900i(c100;TB;W20H10)' => array('model' => 'D900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 D900i(c100;TD)' => array('model' => 'D900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '900i', 'status' => 'TD'),
                               'DoCoMo/2.0 D900i(c100;TJ)' => array('model' => 'D900i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '900i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F900iC(c100;TB;W22H12)' => array('model' => 'F900iC', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 F900iC(c100;TB;W18H10)' => array('model' => 'F900iC', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 F900iC(c100;TB;W28H15)' => array('model' => 'F900iC', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 F900iC(c100;TD)' => array('model' => 'F900iC', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '900i', 'status' => 'TD'),
                               'DoCoMo/2.0 F900iC(c100;TJ)' => array('model' => 'F900iC', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '900i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N900iL(c100;TB;W24H12)' => array('model' => 'N900iL', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 N900iL(c100;TB;W20H10)' => array('model' => 'N900iL', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 N900iL(c100;TB;W30H15)' => array('model' => 'N900iL', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 N900iL(c100;TD)' => array('model' => 'N900iL', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TD'),
                               'DoCoMo/2.0 N900iL(c100;TJ)' => array('model' => 'N900iL', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N900iG(c100;TB;W24H12)' => array('model' => 'N900iG', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 N900iG(c100;TB;W20H10)' => array('model' => 'N900iG', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 N900iG(c100;TB;W30H15)' => array('model' => 'N900iG', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TB'),
                               'DoCoMo/2.0 N900iG(c100;TD)' => array('model' => 'N900iG', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TD'),
                               'DoCoMo/2.0 N900iG(c100;TJ)' => array('model' => 'N900iG', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 269, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '900i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F880iES(c100;TB;W20H08)' => array('model' => 'F880iES', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '880i', 'status' => 'TB'),
                               'DoCoMo/2.0 F880iES(c100;TB;W16H08)' => array('model' => 'F880iES', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '880i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH901iC(c100;TB;W24H12)' => array('model' => 'SH901iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH901iC(c100;TB;W20H10)' => array('model' => 'SH901iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH901iC(c100;TB;W30H15)' => array('model' => 'SH901iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH901iC(c100;TD)' => array('model' => 'SH901iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '901i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH901iC(c100;TJ)' => array('model' => 'SH901iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '901i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F901iC(c100;TB;W23H12)' => array('model' => 'F901iC', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 F901iC(c100;TB;W19H10)' => array('model' => 'F901iC', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 F901iC(c100;TB;W28H15)' => array('model' => 'F901iC', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 F901iC(c100;TD)' => array('model' => 'F901iC', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '901i', 'status' => 'TD'),
                               'DoCoMo/2.0 F901iC(c100;TJ)' => array('model' => 'F901iC', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '901i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N901iC(c100;TB;W24H12)' => array('model' => 'N901iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 N901iC(c100;TB;W20H10)' => array('model' => 'N901iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 N901iC(c100;TB;W30H15)' => array('model' => 'N901iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 N901iC(c100;TD)' => array('model' => 'N901iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '901i', 'status' => 'TD'),
                               'DoCoMo/2.0 N901iC(c100;TJ)' => array('model' => 'N901iC', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '901i', 'status' => 'TJ'),
                               'DoCoMo/2.0 D901i(c100;TB;W23H12)' => array('model' => 'D901i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 D901i(c100;TB;W19H10)' => array('model' => 'D901i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 D901i(c100;TB;W28H15)' => array('model' => 'D901i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 D901i(c100;TD)' => array('model' => 'D901i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '901i', 'status' => 'TD'),
                               'DoCoMo/2.0 D901i(c100;TJ)' => array('model' => 'D901i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '901i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P901i(c100;TB;W24H12)' => array('model' => 'P901i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 P901i(c100;TB;W20H10)' => array('model' => 'P901i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 P901i(c100;TB;W30H15)' => array('model' => 'P901i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 P901i(c100;TD)' => array('model' => 'P901i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '901i', 'status' => 'TD'),
                               'DoCoMo/2.0 P901i(c100;TJ)' => array('model' => 'P901i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '901i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SH901iS(c100;TB;W24H12)' => array('model' => 'SH901iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH901iS(c100;TB;W20H10)' => array('model' => 'SH901iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH901iS(c100;TB;W30H15)' => array('model' => 'SH901iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH901iS(c100;TD)' => array('model' => 'SH901iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '901i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH901iS(c100;TJ)' => array('model' => 'SH901iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '901i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F901iS(c100;TB;W23H12)' => array('model' => 'F901iS', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 F901iS(c100;TB;W19H10)' => array('model' => 'F901iS', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 F901iS(c100;TB;W28H15)' => array('model' => 'F901iS', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 F901iS(c100;TD)' => array('model' => 'F901iS', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '901i', 'status' => 'TD'),
                               'DoCoMo/2.0 F901iS(c100;TJ)' => array('model' => 'F901iS', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '901i', 'status' => 'TJ'),
                               'DoCoMo/2.0 D901iS(c100;TB;W23H12)' => array('model' => 'D901iS', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 D901iS(c100;TB;W19H10)' => array('model' => 'D901iS', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 D901iS(c100;TB;W28H15)' => array('model' => 'D901iS', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 D901iS(c100;TD)' => array('model' => 'D901iS', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '901i', 'status' => 'TD'),
                               'DoCoMo/2.0 D901iS(c100;TJ)' => array('model' => 'D901iS', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '901i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P901iS(c100;TB;W24H12)' => array('model' => 'P901iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 P901iS(c100;TB;W20H10)' => array('model' => 'P901iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 P901iS(c100;TB;W30H15)' => array('model' => 'P901iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 P901iS(c100;TD)' => array('model' => 'P901iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '901i', 'status' => 'TD'),
                               'DoCoMo/2.0 P901iS(c100;TJ)' => array('model' => 'P901iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '901i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N901iS(c100;TB;W24H12)' => array('model' => 'N901iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 N901iS(c100;TB;W20H10)' => array('model' => 'N901iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 N901iS(c100;TB;W30H15)' => array('model' => 'N901iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 N901iS(c100;TD)' => array('model' => 'N901iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '901i', 'status' => 'TD'),
                               'DoCoMo/2.0 N901iS(c100;TJ)' => array('model' => 'N901iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '901i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P901iTV(c100;TB;W24H12)' => array('model' => 'P901iTV', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 P901iTV(c100;TB;W20H10)' => array('model' => 'P901iTV', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 P901iTV(c100;TB;W30H15)' => array('model' => 'P901iTV', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '901i', 'status' => 'TB'),
                               'DoCoMo/2.0 P901iTV(c100;TD)' => array('model' => 'P901iTV', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '901i', 'status' => 'TD'),
                               'DoCoMo/2.0 P901iTV(c100;TJ)' => array('model' => 'P901iTV', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '901i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F700i(c100;TB;W23H12)' => array('model' => 'F700i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '700i', 'status' => 'TB'),
                               'DoCoMo/2.0 F700i(c100;TB;W19H10)' => array('model' => 'F700i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '700i', 'status' => 'TB'),
                               'DoCoMo/2.0 F700i(c100;TB;W28H15)' => array('model' => 'F700i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '700i', 'status' => 'TB'),
                               'DoCoMo/2.0 F700i(c100;TD)' => array('model' => 'F700i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '700i', 'status' => 'TD'),
                               'DoCoMo/2.0 F700i(c100;TJ)' => array('model' => 'F700i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '700i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SH700i(c100;TB;W24H12)' => array('model' => 'SH700i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '700i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH700i(c100;TD)' => array('model' => 'SH700i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '700i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH700i(c100;TJ)' => array('model' => 'SH700i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '700i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N700i(c100;TB;W24H12)' => array('model' => 'N700i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '700i', 'status' => 'TB'),
                               'DoCoMo/2.0 N700i(c100;TB;W20H10)' => array('model' => 'N700i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '700i', 'status' => 'TB'),
                               'DoCoMo/2.0 N700i(c100;TB;W30H15)' => array('model' => 'N700i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '700i', 'status' => 'TB'),
                               'DoCoMo/2.0 N700i(c100;TD)' => array('model' => 'N700i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '700i', 'status' => 'TD'),
                               'DoCoMo/2.0 N700i(c100;TJ)' => array('model' => 'N700i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '700i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P700i(c100;TB;W24H12)' => array('model' => 'P700i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '700i', 'status' => 'TB'),
                               'DoCoMo/2.0 P700i(c100;TB;W20H10)' => array('model' => 'P700i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '700i', 'status' => 'TB'),
                               'DoCoMo/2.0 P700i(c100;TB;W30H15)' => array('model' => 'P700i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '700i', 'status' => 'TB'),
                               'DoCoMo/2.0 P700i(c100;TD)' => array('model' => 'P700i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '700i', 'status' => 'TD'),
                               'DoCoMo/2.0 P700i(c100;TJ)' => array('model' => 'P700i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '700i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F700iS(c100;TB;W23H12)' => array('model' => 'F700iS', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '700i', 'status' => 'TB'),
                               'DoCoMo/2.0 F700iS(c100;TB;W19H10)' => array('model' => 'F700iS', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '700i', 'status' => 'TB'),
                               'DoCoMo/2.0 F700iS(c100;TB;W28H15)' => array('model' => 'F700iS', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '700i', 'status' => 'TB'),
                               'DoCoMo/2.0 F700iS(c100;TD)' => array('model' => 'F700iS', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '700i', 'status' => 'TD'),
                               'DoCoMo/2.0 F700iS(c100;TJ)' => array('model' => 'F700iS', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '700i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SH700iS(c100;TB;W24H12)' => array('model' => 'SH700iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '700i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH700iS(c100;TD)' => array('model' => 'SH700iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '700i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH700iS(c100;TJ)' => array('model' => 'SH700iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '700i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SA700iS(c100;TB;W24H12)' => array('model' => 'SA700iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SA', 'series' => '700i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SA700iS(c100;TB;W20H10)' => array('model' => 'SA700iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SA', 'series' => '700i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SA700iS(c100;TB;W30H15)' => array('model' => 'SA700iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SA', 'series' => '700i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SA700iS(c100;TD)' => array('model' => 'SA700iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SA', 'series' => '700i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 SA700iS(c100;TJ)' => array('model' => 'SA700iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SA', 'series' => '700i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 SH851i(c100;TB;W24H12)' => array('model' => 'SH851i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '851i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH851i(c100;TB;W20H10)' => array('model' => 'SH851i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '851i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH851i(c100;TB;W30H15)' => array('model' => 'SH851i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '851i', 'status' => 'TB'),
                               'DoCoMo/2.0 P851i(c100;TB;W24H12)' => array('model' => 'P851i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '851i', 'status' => 'TB'),
                               'DoCoMo/2.0 P851i(c100;TB;W20H10)' => array('model' => 'P851i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '851i', 'status' => 'TB'),
                               'DoCoMo/2.0 P851i(c100;TB;W30H15)' => array('model' => 'P851i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '851i', 'status' => 'TB'),
                               'DoCoMo/2.0 P851i(c100;TD)' => array('model' => 'P851i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '851i', 'status' => 'TD'),
                               'DoCoMo/2.0 P851i(c100;TJ)' => array('model' => 'P851i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '851i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F881iES(c100;TB;W20H08)' => array('model' => 'F881iES', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '881i', 'status' => 'TB'),
                               'DoCoMo/2.0 F881iES(c100;TB;W16H08)' => array('model' => 'F881iES', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '881i', 'status' => 'TB'),
                               'DoCoMo/2.0 D701i(c100;TB;W23H12)' => array('model' => 'D701i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '701i', 'status' => 'TB'),
                               'DoCoMo/2.0 D701i(c100;TB;W19H10)' => array('model' => 'D701i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '701i', 'status' => 'TB'),
                               'DoCoMo/2.0 D701i(c100;TB;W28H15)' => array('model' => 'D701i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '701i', 'status' => 'TB'),
                               'DoCoMo/2.0 D701i(c100;TD)' => array('model' => 'D701i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '701i', 'status' => 'TD'),
                               'DoCoMo/2.0 D701i(c100;TJ)' => array('model' => 'D701i', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '701i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N701i(c100;TB;W24H12)' => array('model' => 'N701i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '701i', 'status' => 'TB'),
                               'DoCoMo/2.0 N701i(c100;TB;W20H10)' => array('model' => 'N701i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '701i', 'status' => 'TB'),
                               'DoCoMo/2.0 N701i(c100;TB;W30H15)' => array('model' => 'N701i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '701i', 'status' => 'TB'),
                               'DoCoMo/2.0 N701i(c100;TD)' => array('model' => 'N701i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '701i', 'status' => 'TD'),
                               'DoCoMo/2.0 N701i(c100;TJ)' => array('model' => 'N701i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '701i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P701iD(c100;TB;W24H12)' => array('model' => 'P701iD', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '701i', 'status' => 'TB'),
                               'DoCoMo/2.0 P701iD(c100;TB;W20H10)' => array('model' => 'P701iD', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '701i', 'status' => 'TB'),
                               'DoCoMo/2.0 P701iD(c100;TB;W30H15)' => array('model' => 'P701iD', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '701i', 'status' => 'TB'),
                               'DoCoMo/2.0 P701iD(c100;TD)' => array('model' => 'P701iD', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '701i', 'status' => 'TD'),
                               'DoCoMo/2.0 P701iD(c100;TJ)' => array('model' => 'P701iD', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '701i', 'status' => 'TJ'),
                               'DoCoMo/2.0 D701iWM(c100;TB;W23H12)' => array('model' => 'D701iWM', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '701i', 'status' => 'TB'),
                               'DoCoMo/2.0 D701iWM(c100;TB;W19H10)' => array('model' => 'D701iWM', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '701i', 'status' => 'TB'),
                               'DoCoMo/2.0 D701iWM(c100;TB;W28H15)' => array('model' => 'D701iWM', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '701i', 'status' => 'TB'),
                               'DoCoMo/2.0 D701iWM(c100;TD)' => array('model' => 'D701iWM', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '701i', 'status' => 'TD'),
                               'DoCoMo/2.0 D701iWM(c100;TJ)' => array('model' => 'D701iWM', 'htmlVersion' => '5.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '701i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N701iECO(c100;TB;W24H12)' => array('model' => 'N701iECO', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '701i', 'status' => 'TB'),
                               'DoCoMo/2.0 N701iECO(c100;TB;W20H10)' => array('model' => 'N701iECO', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '701i', 'status' => 'TB'),
                               'DoCoMo/2.0 N701iECO(c100;TB;W30H15)' => array('model' => 'N701iECO', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '701i', 'status' => 'TB'),
                               'DoCoMo/2.0 N701iECO(c100;TD)' => array('model' => 'N701iECO', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '701i', 'status' => 'TD'),
                               'DoCoMo/2.0 N701iECO(c100;TJ)' => array('model' => 'N701iECO', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '701i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SA800i(c100;TB;W24H12)' => array('model' => 'SA800i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SA', 'series' => '800i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SA800i(c100;TB;W20H10)' => array('model' => 'SA800i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SA', 'series' => '800i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SA800i(c100;TB;W30H15)' => array('model' => 'SA800i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SA', 'series' => '800i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SA800i(c100;TD)' => array('model' => 'SA800i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SA', 'series' => '800i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 SA800i(c100;TJ)' => array('model' => 'SA800i', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SA', 'series' => '800i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 L600i(c100;TB;W21H11)' => array('model' => 'L600i', 'htmlVersion' => '5.0', 'width' => 170, 'height' => 189, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '600i', 'status' => 'TB'),
                               'DoCoMo/2.0 L600i(c100;TB;W24H13)' => array('model' => 'L600i', 'htmlVersion' => '5.0', 'width' => 170, 'height' => 189, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '600i', 'status' => 'TB'),
                               'DoCoMo/2.0 L600i(c100;TD)' => array('model' => 'L600i', 'htmlVersion' => '5.0', 'width' => 170, 'height' => 189, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '600i', 'status' => 'TD'),
                               'DoCoMo/2.0 L600i(c100;TJ)' => array('model' => 'L600i', 'htmlVersion' => '5.0', 'width' => 170, 'height' => 189, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '600i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N600i(c100;TB;W21H11)' => array('model' => 'N600i', 'htmlVersion' => '5.0', 'width' => 176, 'height' => 180, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '600i', 'status' => 'TB'),
                               'DoCoMo/2.0 N600i(c100;TB;W28H15)' => array('model' => 'N600i', 'htmlVersion' => '5.0', 'width' => 176, 'height' => 180, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '600i', 'status' => 'TB'),
                               'DoCoMo/2.0 N600i(c100;TD)' => array('model' => 'N600i', 'htmlVersion' => '5.0', 'width' => 176, 'height' => 180, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '600i', 'status' => 'TD'),
                               'DoCoMo/2.0 N600i(c100;TJ)' => array('model' => 'N600i', 'htmlVersion' => '5.0', 'width' => 176, 'height' => 180, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '600i', 'status' => 'TJ'),
                               'DoCoMo/2.0 L601i(c100;TB;W21H11)' => array('model' => 'L601i', 'htmlVersion' => '5.0', 'width' => 170, 'height' => 189, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '601i', 'status' => 'TB'),
                               'DoCoMo/2.0 L601i(c100;TB;W18H10)' => array('model' => 'L601i', 'htmlVersion' => '5.0', 'width' => 170, 'height' => 189, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '601i', 'status' => 'TB'),
                               'DoCoMo/2.0 L601i(c100;TB;W24H13)' => array('model' => 'L601i', 'htmlVersion' => '5.0', 'width' => 170, 'height' => 189, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '601i', 'status' => 'TB'),
                               'DoCoMo/2.0 L601i(c100;TD)' => array('model' => 'L601i', 'htmlVersion' => '5.0', 'width' => 170, 'height' => 189, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '601i', 'status' => 'TD'),
                               'DoCoMo/2.0 L601i(c100;TJ)' => array('model' => 'L601i', 'htmlVersion' => '5.0', 'width' => 170, 'height' => 189, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '601i', 'status' => 'TJ'),
                               'DoCoMo/2.0 M702iS(c100;TB;W24H13)' => array('model' => 'M702iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 267, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'M', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 M702iS(c100;TB;W20H11)' => array('model' => 'M702iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 267, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'M', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 M702iS(c100;TB;W30H16)' => array('model' => 'M702iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 267, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'M', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 M702iS(c100;TD)' => array('model' => 'M702iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 267, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'M', 'series' => '702i', 'status' => 'TD'),
                               'DoCoMo/2.0 M702iS(c100;TJ)' => array('model' => 'M702iS', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 267, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'M', 'series' => '702i', 'status' => 'TJ'),
                               'DoCoMo/2.0 M702iG(c100;TB;W24H13)' => array('model' => 'M702iG', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 267, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'M', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 M702iG(c100;TB;W20H11)' => array('model' => 'M702iG', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 267, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'M', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 M702iG(c100;TB;W30H16)' => array('model' => 'M702iG', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 267, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'M', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 M702iG(c100;TD)' => array('model' => 'M702iG', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 267, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'M', 'series' => '702i', 'status' => 'TD'),
                               'DoCoMo/2.0 M702iG(c100;TJ)' => array('model' => 'M702iG', 'htmlVersion' => '5.0', 'width' => 240, 'height' => 267, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'M', 'series' => '702i', 'status' => 'TJ'),
                               'DoCoMo/2.0 L602i(c100;TB;W21H11)' => array('model' => 'L602i', 'htmlVersion' => '5.0', 'width' => 170, 'height' => 189, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '602i', 'status' => 'TB'),
                               'DoCoMo/2.0 L602i(c100;TB;W18H10)' => array('model' => 'L602i', 'htmlVersion' => '5.0', 'width' => 170, 'height' => 189, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '602i', 'status' => 'TB'),
                               'DoCoMo/2.0 L602i(c100;TB;W24H13)' => array('model' => 'L602i', 'htmlVersion' => '5.0', 'width' => 170, 'height' => 189, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '602i', 'status' => 'TB'),
                               'DoCoMo/2.0 L602i(c100;TD)' => array('model' => 'L602i', 'htmlVersion' => '5.0', 'width' => 170, 'height' => 189, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '602i', 'status' => 'TD'),
                               'DoCoMo/2.0 L602i(c100;TJ)' => array('model' => 'L602i', 'htmlVersion' => '5.0', 'width' => 170, 'height' => 189, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '602i', 'status' => 'TJ'),

                               // HTML 6.0
                               'DoCoMo/2.0 F902i(c100;TB;W23H12)' => array('model' => 'F902i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 F902i(c100;TB;W19H10)' => array('model' => 'F902i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 F902i(c100;TB;W28H15)' => array('model' => 'F902i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 F902i(c100;TB;W24H12)' => array('model' => 'F902i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 F902i(c100;TD)' => array('model' => 'F902i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '902i', 'status' => 'TD'),
                               'DoCoMo/2.0 F902i(c100;TJ)' => array('model' => 'F902i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '902i', 'status' => 'TJ'),
                               'DoCoMo/2.0 D902i(c100;TB;W23H16)' => array('model' => 'D902i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 D902i(c100;TB;W19H13)' => array('model' => 'D902i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 D902i(c100;TB;W28H20)' => array('model' => 'D902i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 D902i(c100;TB;W24H16)' => array('model' => 'D902i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 D902i(c100;TD)' => array('model' => 'D902i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '902i', 'status' => 'TD'),
                               'DoCoMo/2.0 D902i(c100;TJ)' => array('model' => 'D902i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '902i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N902i(c100;TB;W24H12)' => array('model' => 'N902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 N902i(c100;TB;W20H10)' => array('model' => 'N902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 N902i(c100;TB;W30H15)' => array('model' => 'N902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 N902i(c100;TD)' => array('model' => 'N902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TD'),
                               'DoCoMo/2.0 N902i(c100;TJ)' => array('model' => 'N902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P902i(c100;TB;W24H12)' => array('model' => 'P902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 P902i(c100;TB;W20H10)' => array('model' => 'P902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 P902i(c100;TB;W30H15)' => array('model' => 'P902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 P902i(c100;TD)' => array('model' => 'P902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '902i', 'status' => 'TD'),
                               'DoCoMo/2.0 P902i(c100;TJ)' => array('model' => 'P902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '902i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SH902i(c100;TB;W24H12)' => array('model' => 'SH902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH902i(c100;TB;W20H10)' => array('model' => 'SH902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH902i(c100;TB;W30H15)' => array('model' => 'SH902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH902i(c100;TD)' => array('model' => 'SH902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '902i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH902i(c100;TJ)' => array('model' => 'SH902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '902i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SO902i(c100;TB;W24H12)' => array('model' => 'SO902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO902i(c100;TB;W20H10)' => array('model' => 'SO902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO902i(c100;TB;W30H16)' => array('model' => 'SO902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO902i(c100;TD)' => array('model' => 'SO902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '902i', 'status' => 'TD'),
                               'DoCoMo/2.0 SO902i(c100;TJ)' => array('model' => 'SO902i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '902i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SH902iS(c100;TB;W24H12)' => array('model' => 'SH902iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH902iS(c100;TB;W20H10)' => array('model' => 'SH902iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH902iS(c100;TB;W30H15)' => array('model' => 'SH902iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH902iS(c100;TD)' => array('model' => 'SH902iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '902i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH902iS(c100;TJ)' => array('model' => 'SH902iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '902i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P902iS(c100;TB;W24H12)' => array('model' => 'P902iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 P902iS(c100;TB;W20H10)' => array('model' => 'P902iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 P902iS(c100;TB;W30H15)' => array('model' => 'P902iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 P902iS(c100;TD)' => array('model' => 'P902iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '902i', 'status' => 'TD'),
                               'DoCoMo/2.0 P902iS(c100;TJ)' => array('model' => 'P902iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '902i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N902iS(c100;TB;W24H12)' => array('model' => 'N902iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 N902iS(c100;TB;W20H10)' => array('model' => 'N902iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 N902iS(c100;TB;W30H15)' => array('model' => 'N902iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 N902iS(c100;TD)' => array('model' => 'N902iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TD'),
                               'DoCoMo/2.0 N902iS(c100;TJ)' => array('model' => 'N902iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TJ'),
                               'DoCoMo/2.0 D902iS(c100;TB;W23H16)' => array('model' => 'D902iS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 D902iS(c100;TB;W19H13)' => array('model' => 'D902iS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 D902iS(c100;TB;W28H20)' => array('model' => 'D902iS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 D902iS(c100;TB;W24H16)' => array('model' => 'D902iS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 D902iS(c100;TD)' => array('model' => 'D902iS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '902i', 'status' => 'TD'),
                               'DoCoMo/2.0 D902iS(c100;TJ)' => array('model' => 'D902iS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '902i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F902iS(c100;TB;W23H12)' => array('model' => 'F902iS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 F902iS(c100;TB;W19H10)' => array('model' => 'F902iS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 F902iS(c100;TB;W28H15)' => array('model' => 'F902iS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 F902iS(c100;TB;W24H12)' => array('model' => 'F902iS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 F902iS(c100;TD)' => array('model' => 'F902iS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '902i', 'status' => 'TD'),
                               'DoCoMo/2.0 F902iS(c100;TJ)' => array('model' => 'F902iS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '902i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SO902iWP+(c100;TB;W24H12)' => array('model' => 'SO902iWP+', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO902iWP+(c100;TB;W20H10)' => array('model' => 'SO902iWP+', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO902iWP+(c100;TB;W30H16)' => array('model' => 'SO902iWP+', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO902iWP+(c100;TD)' => array('model' => 'SO902iWP+', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '902i', 'status' => 'TD'),
                               'DoCoMo/2.0 SO902iWP+(c100;TJ)' => array('model' => 'SO902iWP+', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '902i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SH902iSL(c100;TB;W24H12)' => array('model' => 'SH902iSL', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH902iSL(c100;TB;W20H10)' => array('model' => 'SH902iSL', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH902iSL(c100;TB;W30H15)' => array('model' => 'SH902iSL', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH902iSL(c100;TD)' => array('model' => 'SH902iSL', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '902i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH902iSL(c100;TJ)' => array('model' => 'SH902iSL', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '902i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N902iX(c100;TB;W24H12)' => array('model' => 'N902iX', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 N902iX(c100;TB;W20H10)' => array('model' => 'N902iX', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 N902iX(c100;TB;W30H15)' => array('model' => 'N902iX', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 N902iX(c100;TD)' => array('model' => 'N902iX', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TD'),
                               'DoCoMo/2.0 N902iX(c100;TJ)' => array('model' => 'N902iX', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N902iL(c100;TB;W24H12)' => array('model' => 'N902iL', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 N902iL(c100;TB;W20H10)' => array('model' => 'N902iL', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 N902iL(c100;TB;W30H15)' => array('model' => 'N902iL', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TB'),
                               'DoCoMo/2.0 N902iL(c100;TD)' => array('model' => 'N902iL', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TD'),
                               'DoCoMo/2.0 N902iL(c100;TJ)' => array('model' => 'N902iL', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '902i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P702i(c100;TB;W24H12)' => array('model' => 'P702i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 P702i(c100;TB;W20H10)' => array('model' => 'P702i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 P702i(c100;TB;W30H15)' => array('model' => 'P702i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 P702i(c100;TD)' => array('model' => 'P702i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '702i', 'status' => 'TD'),
                               'DoCoMo/2.0 P702i(c100;TJ)' => array('model' => 'P702i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '702i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N702iD(c100;TB;W24H12)' => array('model' => 'N702iD', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 N702iD(c100;TB;W20H10)' => array('model' => 'N702iD', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 N702iD(c100;TB;W30H15)' => array('model' => 'N702iD', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 N702iD(c100;TD)' => array('model' => 'N702iD', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '702i', 'status' => 'TD'),
                               'DoCoMo/2.0 N702iD(c100;TJ)' => array('model' => 'N702iD', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '702i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F702iD(c100;TB;W23H12)' => array('model' => 'F702iD', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 F702iD(c100;TB;W19H10)' => array('model' => 'F702iD', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 F702iD(c100;TB;W28H15)' => array('model' => 'F702iD', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 F702iD(c100;TB;W24H12)' => array('model' => 'F702iD', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 F702iD(c100;TD)' => array('model' => 'F702iD', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '702i', 'status' => 'TD'),
                               'DoCoMo/2.0 F702iD(c100;TJ)' => array('model' => 'F702iD', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '702i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SH702iD(c100;TB;W24H12)' => array('model' => 'SH702iD', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH702iD(c100;TB;W20H10)' => array('model' => 'SH702iD', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH702iD(c100;TB;W30H15)' => array('model' => 'SH702iD', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH702iD(c100;TD)' => array('model' => 'SH702iD', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '702i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH702iD(c100;TJ)' => array('model' => 'SH702iD', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '702i', 'status' => 'TJ'),
                               'DoCoMo/2.0 D702i(c100;TB;W23H12)' => array('model' => 'D702i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 D702i(c100;TB;W19H10)' => array('model' => 'D702i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 D702i(c100;TB;W28H15)' => array('model' => 'D702i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 D702i(c100;TD)' => array('model' => 'D702i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '702i', 'status' => 'TD'),
                               'DoCoMo/2.0 D702i(c100;TJ)' => array('model' => 'D702i', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '702i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SO702i(c100;TB;W24H12)' => array('model' => 'SO702i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO702i(c100;TB;W20H10)' => array('model' => 'SO702i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO702i(c100;TB;W30H16)' => array('model' => 'SO702i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO702i(c100;TD)' => array('model' => 'SO702i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '702i', 'status' => 'TD'),
                               'DoCoMo/2.0 SO702i(c100;TJ)' => array('model' => 'SO702i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '702i', 'status' => 'TJ'),
                               'DoCoMo/2.0 D702iBCL(c100;TB;W23H12)' => array('model' => 'D702iBCL', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 D702iBCL(c100;TB;W19H10)' => array('model' => 'D702iBCL', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 D702iBCL(c100;TB;W28H15)' => array('model' => 'D702iBCL', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 D702iBCL(c100;TD)' => array('model' => 'D702iBCL', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '702i', 'status' => 'TD'),
                               'DoCoMo/2.0 D702iBCL(c100;TJ)' => array('model' => 'D702iBCL', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '702i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SA702i(c100;TB;W24H12)' => array('model' => 'SA702i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SA', 'series' => '702i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SA702i(c100;TB;W20H10)' => array('model' => 'SA702i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SA', 'series' => '702i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SA702i(c100;TB;W30H15)' => array('model' => 'SA702i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SA', 'series' => '702i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SA702i(c100;TD)' => array('model' => 'SA702i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SA', 'series' => '702i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 SA702i(c100;TJ)' => array('model' => 'SA702i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 252, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SA', 'series' => '702i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 SH702iS(c100;TB;W24H12)' => array('model' => 'SH702iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH702iS(c100;TB;W20H10)' => array('model' => 'SH702iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH702iS(c100;TB;W30H15)' => array('model' => 'SH702iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH702iS(c100;TD)' => array('model' => 'SH702iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '702i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH702iS(c100;TJ)' => array('model' => 'SH702iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '702i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N702iS(c100;TB;W24H12)' => array('model' => 'N702iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 N702iS(c100;TB;W20H10)' => array('model' => 'N702iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 N702iS(c100;TB;W30H15)' => array('model' => 'N702iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 N702iS(c100;TD)' => array('model' => 'N702iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '702i', 'status' => 'TD'),
                               'DoCoMo/2.0 N702iS(c100;TJ)' => array('model' => 'N702iS', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '702i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P702iD(c100;TB;W24H12)' => array('model' => 'P702iD', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 P702iD(c100;TB;W20H10)' => array('model' => 'P702iD', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 P702iD(c100;TB;W30H15)' => array('model' => 'P702iD', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 P702iD(c100;TD)' => array('model' => 'P702iD', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '702i', 'status' => 'TD'),
                               'DoCoMo/2.0 P702iD(c100;TJ)' => array('model' => 'P702iD', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '702i', 'status' => 'TJ'),
                               'DoCoMo/2.0 D702iF(c100;TB;W23H12)' => array('model' => 'D702iF', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 D702iF(c100;TB;W19H10)' => array('model' => 'D702iF', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 D702iF(c100;TB;W28H15)' => array('model' => 'D702iF', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '702i', 'status' => 'TB'),
                               'DoCoMo/2.0 D702iF(c100;TD)' => array('model' => 'D702iF', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '702i', 'status' => 'TD'),
                               'DoCoMo/2.0 D702iF(c100;TJ)' => array('model' => 'D702iF', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '702i', 'status' => 'TJ'),
                               'DoCoMo/2.0 D851iWM(c100;TB;W23H16)' => array('model' => 'D851iWM', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '851i', 'status' => 'TB'),
                               'DoCoMo/2.0 D851iWM(c100;TB;W19H13)' => array('model' => 'D851iWM', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '851i', 'status' => 'TB'),
                               'DoCoMo/2.0 D851iWM(c100;TB;W28H20)' => array('model' => 'D851iWM', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '851i', 'status' => 'TB'),
                               'DoCoMo/2.0 D851iWM(c100;TD)' => array('model' => 'D851iWM', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '851i', 'status' => 'TD'),
                               'DoCoMo/2.0 D851iWM(c100;TJ)' => array('model' => 'D851iWM', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '851i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F882iES(c100;TB;W20H08)' => array('model' => 'F882iES', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '882i', 'status' => 'TB'),
                               'DoCoMo/2.0 F882iES(c100;TB;W16H08)' => array('model' => 'F882iES', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '882i', 'status' => 'TB'),
                               'DoCoMo/2.0 N601i(c100;TB;W24H12)' => array('model' => 'N601i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '601i', 'status' => 'TB'),
                               'DoCoMo/2.0 N601i(c100;TB;W20H10)' => array('model' => 'N601i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '601i', 'status' => 'TB'),
                               'DoCoMo/2.0 N601i(c100;TB;W30H15)' => array('model' => 'N601i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '601i', 'status' => 'TB'),
                               'DoCoMo/2.0 D800iDS(c100;TB;W23H12)' => array('model' => 'D800iDS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '800i', 'status' => 'TB'),
                               'DoCoMo/2.0 D800iDS(c100;TB;W19H10)' => array('model' => 'D800iDS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '800i', 'status' => 'TB'),
                               'DoCoMo/2.0 D800iDS(c100;TB;W28H15)' => array('model' => 'D800iDS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '800i', 'status' => 'TB'),
                               'DoCoMo/2.0 D800iDS(c100;TD)' => array('model' => 'D800iDS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '800i', 'status' => 'TD'),
                               'DoCoMo/2.0 D800iDS(c100;TJ)' => array('model' => 'D800iDS', 'htmlVersion' => '6.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '800i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P703imyu(c100;TB;W24H12)' => array('model' => 'P703imyu', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 P703imyu(c100;TB;W20H10)' => array('model' => 'P703imyu', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 P703imyu(c100;TB;W30H15)' => array('model' => 'P703imyu', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 P703imyu(c100;TD)' => array('model' => 'P703imyu', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '703i', 'status' => 'TD'),
                               'DoCoMo/2.0 P703imyu(c100;TJ)' => array('model' => 'P703imyu', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '703i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F883i(c100;TB;W20H08)' => array('model' => 'F883i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '883i', 'status' => 'TB'),
                               'DoCoMo/2.0 F883i(c100;TB;W16H08)' => array('model' => 'F883i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '883i', 'status' => 'TB'),
                               'DoCoMo/2.0 P704imyu(c100;TB;W20H10)' => array('model' => 'P704imyu', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 P704imyu(c100;TB;W24H12)' => array('model' => 'P704imyu', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 P704imyu(c100;TB;W30H15)' => array('model' => 'P704imyu', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 P704imyu(c100;TD)' => array('model' => 'P704imyu', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '704i', 'status' => 'TD'),
                               'DoCoMo/2.0 P704imyu(c100;TJ)' => array('model' => 'P704imyu', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '704i', 'status' => 'TJ'),
                               'DoCoMo/2.0 L704i(c100;TB;W24H14)' => array('model' => 'L704i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 L704i(c100;TB;W20H11)' => array('model' => 'L704i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 L704i(c100;TB;W30H17)' => array('model' => 'L704i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 L704i(c100;TD)' => array('model' => 'L704i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '704i', 'status' => 'TD'),
                               'DoCoMo/2.0 L704i(c100;TJ)' => array('model' => 'L704i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '704i', 'status' => 'TJ'),
                               'DoCoMo/2.0 L705i(c100;TB;W16H09)' => array('model' => 'L705i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 L705i(c100;TB;W20H11)' => array('model' => 'L705i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 L705i(c100;TB;W24H14)' => array('model' => 'L705i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 L705i(c100;TB;W21H11)' => array('model' => 'L705i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 L705i(c100;TD)' => array('model' => 'L705i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '705i', 'status' => 'TD'),
                               'DoCoMo/2.0 L705i(c100;TJ)' => array('model' => 'L705i', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '705i', 'status' => 'TJ'),
                               'DoCoMo/2.0 L705iX(c100;TB;W24H14)' => array('model' => 'L705iX', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 L705iX(c100;TB;W20H11)' => array('model' => 'L705iX', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 L705iX(c100;TB;W30H17)' => array('model' => 'L705iX', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 L705iX(c100;TB;W21H11)' => array('model' => 'L705iX', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 L705iX(c100;TD)' => array('model' => 'L705iX', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '705i', 'status' => 'TD'),
                               'DoCoMo/2.0 L705iX(c100;TJ)' => array('model' => 'L705iX', 'htmlVersion' => '6.0', 'width' => 240, 'height' => 280, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'L', 'series' => '705i', 'status' => 'TJ'),

                               // HTML 7.0
                               'DoCoMo/2.0 SH903i(c100;TB;W24H16)' => array('model' => 'SH903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SH903i(c100;TB;W20H13)' => array('model' => 'SH903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SH903i(c100;TB;W30H20)' => array('model' => 'SH903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SH903i(c100;TD)' => array('model' => 'SH903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '903i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 SH903i(c100;TJ)' => array('model' => 'SH903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '903i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 P903i(c100;TB;W24H12)' => array('model' => 'P903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 P903i(c100;TB;W20H10)' => array('model' => 'P903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 P903i(c100;TB;W30H15)' => array('model' => 'P903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 P903i(c100;TD)' => array('model' => 'P903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '903i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 P903i(c100;TJ)' => array('model' => 'P903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '903i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 N903i(c100;TB;W24H12)' => array('model' => 'N903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N903i(c100;TB;W20H10)' => array('model' => 'N903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N903i(c100;TB;W30H15)' => array('model' => 'N903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N903i(c100;TD)' => array('model' => 'N903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '903i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 N903i(c100;TJ)' => array('model' => 'N903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '903i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 D903i(c100;TB;W23H16)' => array('model' => 'D903i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D903i(c100;TB;W19H13)' => array('model' => 'D903i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D903i(c100;TB;W28H20)' => array('model' => 'D903i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D903i(c100;TB;W24H16)' => array('model' => 'D903i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D903i(c100;TD)' => array('model' => 'D903i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '903i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 D903i(c100;TJ)' => array('model' => 'D903i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '903i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 F903i(c100;TB;W23H12)' => array('model' => 'F903i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F903i(c100;TB;W19H10)' => array('model' => 'F903i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F903i(c100;TB;W28H15)' => array('model' => 'F903i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F903i(c100;TB;W24H12)' => array('model' => 'F903i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F903i(c100;TD)' => array('model' => 'F903i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 F903i(c100;TJ)' => array('model' => 'F903i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 SO903i(c100;TB;W24H18)' => array('model' => 'SO903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO903i(c100;TB;W20H15)' => array('model' => 'SO903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO903i(c100;TB;W30H23)' => array('model' => 'SO903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO903i(c100;TB;W20H10)' => array('model' => 'SO903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO903i(c100;TD)' => array('model' => 'SO903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '903i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 SO903i(c100;TJ)' => array('model' => 'SO903i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '903i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 D903iTV(c100;TB;W23H16)' => array('model' => 'D903iTV', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 D903iTV(c100;TB;W19H13)' => array('model' => 'D903iTV', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 D903iTV(c100;TB;W28H20)' => array('model' => 'D903iTV', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 D903iTV(c100;TB;W24H16)' => array('model' => 'D903iTV', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 D903iTV(c100;TD)' => array('model' => 'D903iTV', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '903i', 'status' => 'TD'),
                               'DoCoMo/2.0 D903iTV(c100;TJ)' => array('model' => 'D903iTV', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '903i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F903iX(c100;TB;W23H12)' => array('model' => 'F903iX', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 F903iX(c100;TB;W19H10)' => array('model' => 'F903iX', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 F903iX(c100;TB;W28H15)' => array('model' => 'F903iX', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 F903iX(c100;TB;W24H12)' => array('model' => 'F903iX', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 F903iX(c100;TD)' => array('model' => 'F903iX', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TD'),
                               'DoCoMo/2.0 F903iX(c100;TJ)' => array('model' => 'F903iX', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P903iTV(c100;TB;W24H15)' => array('model' => 'P903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 P903iTV(c100;TB;W20H13)' => array('model' => 'P903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 P903iTV(c100;TB;W30H19)' => array('model' => 'P903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 P903iTV(c100;TD)' => array('model' => 'P903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '903i', 'status' => 'TD'),
                               'DoCoMo/2.0 P903iTV(c100;TJ)' => array('model' => 'P903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '903i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SH903iTV(c100;TB;W24H16)' => array('model' => 'SH903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH903iTV(c100;TB;W20H13)' => array('model' => 'SH903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH903iTV(c100;TB;W30H20)' => array('model' => 'SH903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH903iTV(c100;TD)' => array('model' => 'SH903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '903i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH903iTV(c100;TJ)' => array('model' => 'SH903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '903i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F903iBSC(c100;TB;W23H12)' => array('model' => 'F903iBSC', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F903iBSC(c100;TB;W19H10)' => array('model' => 'F903iBSC', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F903iBSC(c100;TB;W28H15)' => array('model' => 'F903iBSC', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F903iBSC(c100;TB;W24H12)' => array('model' => 'F903iBSC', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F903iBSC(c100;TD)' => array('model' => 'F903iBSC', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 F903iBSC(c100;TJ)' => array('model' => 'F903iBSC', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '903i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 P903iX(c100;TB;W24H12)' => array('model' => 'P903iX', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 P903iX(c100;TB;W20H10)' => array('model' => 'P903iX', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 P903iX(c100;TB;W30H15)' => array('model' => 'P903iX', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 P903iX(c100;TD)' => array('model' => 'P903iX', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '903i', 'status' => 'TD'),
                               'DoCoMo/2.0 P903iX(c100;TJ)' => array('model' => 'P903iX', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '903i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SO903iTV(c100;TB;W24H18)' => array('model' => 'SO903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO903iTV(c100;TB;W20H15)' => array('model' => 'SO903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO903iTV(c100;TB;W30H23)' => array('model' => 'SO903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO903iTV(c100;TB;W20H10)' => array('model' => 'SO903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '903i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO903iTV(c100;TD)' => array('model' => 'SO903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '903i', 'status' => 'TD'),
                               'DoCoMo/2.0 SO903iTV(c100;TJ)' => array('model' => 'SO903iTV', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '903i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N703iD(c100;TB;W24H12)' => array('model' => 'N703iD', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 N703iD(c100;TB;W20H10)' => array('model' => 'N703iD', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 N703iD(c100;TB;W30H15)' => array('model' => 'N703iD', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 N703iD(c100;TD)' => array('model' => 'N703iD', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '703i', 'status' => 'TD'),
                               'DoCoMo/2.0 N703iD(c100;TJ)' => array('model' => 'N703iD', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '703i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F703i(c100;TB;W23H12)' => array('model' => 'F703i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 F703i(c100;TB;W19H10)' => array('model' => 'F703i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 F703i(c100;TB;W28H15)' => array('model' => 'F703i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 F703i(c100;TB;W24H12)' => array('model' => 'F703i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 F703i(c100;TD)' => array('model' => 'F703i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '703i', 'status' => 'TD'),
                               'DoCoMo/2.0 F703i(c100;TJ)' => array('model' => 'F703i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '703i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P703i(c100;TB;W24H12)' => array('model' => 'P703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 P703i(c100;TB;W20H10)' => array('model' => 'P703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 P703i(c100;TB;W30H15)' => array('model' => 'P703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 P703i(c100;TD)' => array('model' => 'P703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '703i', 'status' => 'TD'),
                               'DoCoMo/2.0 P703i(c100;TJ)' => array('model' => 'P703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '703i', 'status' => 'TJ'),
                               'DoCoMo/2.0 D703i(c100;TB;W23H12)' => array('model' => 'D703i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 D703i(c100;TB;W19H10)' => array('model' => 'D703i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 D703i(c100;TB;W28H15)' => array('model' => 'D703i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 D703i(c100;TD)' => array('model' => 'D703i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '703i', 'status' => 'TD'),
                               'DoCoMo/2.0 D703i(c100;TJ)' => array('model' => 'D703i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '703i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SH703i(c100;TB;W24H12)' => array('model' => 'SH703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH703i(c100;TB;W20H10)' => array('model' => 'SH703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH703i(c100;TB;W30H15)' => array('model' => 'SH703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH703i(c100;TD)' => array('model' => 'SH703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '703i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH703i(c100;TJ)' => array('model' => 'SH703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '703i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N703imyu(c100;TB;W24H12)' => array('model' => 'N703imyu', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 N703imyu(c100;TB;W20H10)' => array('model' => 'N703imyu', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 N703imyu(c100;TB;W30H15)' => array('model' => 'N703imyu', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 N703imyu(c100;TD)' => array('model' => 'N703imyu', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '703i', 'status' => 'TD'),
                               'DoCoMo/2.0 N703imyu(c100;TJ)' => array('model' => 'N703imyu', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '703i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SO703i(c100;TB;W24H18)' => array('model' => 'SO703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO703i(c100;TB;W20H15)' => array('model' => 'SO703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO703i(c100;TB;W30H23)' => array('model' => 'SO703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO703i(c100;TB;W20H10)' => array('model' => 'SO703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '703i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO703i(c100;TD)' => array('model' => 'SO703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '703i', 'status' => 'TD'),
                               'DoCoMo/2.0 SO703i(c100;TJ)' => array('model' => 'SO703i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '703i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SH904i(c100;TB;W24H16)' => array('model' => 'SH904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SH904i(c100;TB;W20H13)' => array('model' => 'SH904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SH904i(c100;TB;W30H20)' => array('model' => 'SH904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SH904i(c100;TD)' => array('model' => 'SH904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '904i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 SH904i(c100;TJ)' => array('model' => 'SH904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '904i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 N904i(c100;TB;W24H16)' => array('model' => 'N904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N904i(c100;TB;W20H13)' => array('model' => 'N904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N904i(c100;TB;W30H20)' => array('model' => 'N904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N904i(c100;TD)' => array('model' => 'N904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '904i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 N904i(c100;TJ)' => array('model' => 'N904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '904i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 F904i(c100;TB;W24H17)' => array('model' => 'F904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F904i(c100;TB;W24H12)' => array('model' => 'F904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F904i(c100;TB;W20H14)' => array('model' => 'F904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F904i(c100;TB;W20H10)' => array('model' => 'F904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F904i(c100;TB;W30H22)' => array('model' => 'F904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F904i(c100;TB;W30H15)' => array('model' => 'F904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F904i(c100;TD)' => array('model' => 'F904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '904i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 F904i(c100;TJ)' => array('model' => 'F904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '904i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 D904i(c100;TB;W24H12)' => array('model' => 'D904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D904i(c100;TB;W20H10)' => array('model' => 'D904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D904i(c100;TB;W30H15)' => array('model' => 'D904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D904i(c100;TB;W24H16)' => array('model' => 'D904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D904i(c100;TB;W20H13)' => array('model' => 'D904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D904i(c100;TB;W30H20)' => array('model' => 'D904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D904i(c100;TD)' => array('model' => 'D904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '904i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 D904i(c100;TJ)' => array('model' => 'D904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '904i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 P904i(c100;TB;W24H15)' => array('model' => 'P904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 P904i(c100;TB;W20H13)' => array('model' => 'P904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 P904i(c100;TB;W30H19)' => array('model' => 'P904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '904i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 P904i(c100;TD)' => array('model' => 'P904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '904i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 P904i(c100;TJ)' => array('model' => 'P904i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '904i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 SO704i(c100;TB;W24H18)' => array('model' => 'SO704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO704i(c100;TB;W20H15)' => array('model' => 'SO704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO704i(c100;TB;W30H23)' => array('model' => 'SO704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO704i(c100;TB;W20H10)' => array('model' => 'SO704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO704i(c100;TD)' => array('model' => 'SO704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '704i', 'status' => 'TD'),
                               'DoCoMo/2.0 SO704i(c100;TJ)' => array('model' => 'SO704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '704i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F704i(c100;TB;W23H12)' => array('model' => 'F704i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 F704i(c100;TB;W19H10)' => array('model' => 'F704i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 F704i(c100;TB;W28H15)' => array('model' => 'F704i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 F704i(c100;TB;W24H12)' => array('model' => 'F704i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 F704i(c100;TD)' => array('model' => 'F704i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '704i', 'status' => 'TD'),
                               'DoCoMo/2.0 F704i(c100;TJ)' => array('model' => 'F704i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '704i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N704imyu(c100;TB;W24H12)' => array('model' => 'N704imyu', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 N704imyu(c100;TB;W20H10)' => array('model' => 'N704imyu', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 N704imyu(c100;TB;W30H15)' => array('model' => 'N704imyu', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 N704imyu(c100;TD)' => array('model' => 'N704imyu', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '704i', 'status' => 'TD'),
                               'DoCoMo/2.0 N704imyu(c100;TJ)' => array('model' => 'N704imyu', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '704i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SH704i(c100;TB;W24H16)' => array('model' => 'SH704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH704i(c100;TB;W20H13)' => array('model' => 'SH704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH704i(c100;TB;W30H20)' => array('model' => 'SH704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH704i(c100;TD)' => array('model' => 'SH704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '704i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH704i(c100;TJ)' => array('model' => 'SH704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '704i', 'status' => 'TJ'),
                               'DoCoMo/2.0 D704i(c100;TB;W23H12)' => array('model' => 'D704i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 D704i(c100;TB;W19H10)' => array('model' => 'D704i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 D704i(c100;TB;W28H15)' => array('model' => 'D704i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 D704i(c100;TB;W24H12)' => array('model' => 'D704i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 D704i(c100;TD)' => array('model' => 'D704i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '704i', 'status' => 'TD'),
                               'DoCoMo/2.0 D704i(c100;TJ)' => array('model' => 'D704i', 'htmlVersion' => '7.0', 'width' => 230, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '704i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P704i(c100;TB;W24H12)' => array('model' => 'P704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 P704i(c100;TB;W20H10)' => array('model' => 'P704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 P704i(c100;TB;W30H15)' => array('model' => 'P704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '704i', 'status' => 'TB'),
                               'DoCoMo/2.0 P704i(c100;TD)' => array('model' => 'P704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '704i', 'status' => 'TD'),
                               'DoCoMo/2.0 P704i(c100;TJ)' => array('model' => 'P704i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 270, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '704i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F883iES(c100;TB;W20H08)' => array('model' => 'F883iES', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '883i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F883iES(c100;TB;W16H08)' => array('model' => 'F883iES', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '883i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F883iESS(c100;TB;W20H08)' => array('model' => 'F883iESS', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '883i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F883iESS(c100;TB;W16H08)' => array('model' => 'F883iESS', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 256, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '883i', 'status' => 'TB', 'isGPS' => true),

                               'DoCoMo/2.0 F801i(c100;TB;W24H17)' => array('model' => 'F801i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '801i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F801i(c100;TB;W20H14)' => array('model' => 'F801i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '801i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F801i(c100;TB;W30H22)' => array('model' => 'F801i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '801i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F801i(c100;TD)' => array('model' => 'F801i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '801i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 F801i(c100;TJ)' => array('model' => 'F801i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '801i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 F705i(c100;TB;W24H17)' => array('model' => 'F705i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 F705i(c100;TB;W20H14)' => array('model' => 'F705i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 F705i(c100;TB;W30H22)' => array('model' => 'F705i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 F705i(c100;TD)' => array('model' => 'F705i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '705i', 'status' => 'TD'),
                               'DoCoMo/2.0 F705i(c100;TJ)' => array('model' => 'F705i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '705i', 'status' => 'TJ'),
                               'DoCoMo/2.0 D705i(c100;TB;W24H16)' => array('model' => 'D705i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 D705i(c100;TB;W20H13)' => array('model' => 'D705i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 D705i(c100;TB;W30H20)' => array('model' => 'D705i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 D705i(c100;TD)' => array('model' => 'D705i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '705i', 'status' => 'TD'),
                               'DoCoMo/2.0 D705i(c100;TJ)' => array('model' => 'D705i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '705i', 'status' => 'TJ'),
                               'DoCoMo/2.0 D705imyu(c100;TB;W24H12)' => array('model' => 'D705imyu', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 D705imyu(c100;TB;W20H10)' => array('model' => 'D705imyu', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 D705imyu(c100;TB;W30H15)' => array('model' => 'D705imyu', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 D705imyu(c100;TD)' => array('model' => 'D705imyu', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '705i', 'status' => 'TD'),
                               'DoCoMo/2.0 D705imyu(c100;TJ)' => array('model' => 'D705imyu', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 240, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '705i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SH705i(c100;TB;W24H16)' => array('model' => 'SH705i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH705i(c100;TB;W20H13)' => array('model' => 'SH705i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH705i(c100;TB;W30H20)' => array('model' => 'SH705i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH705i(c100;TD)' => array('model' => 'SH705i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '705i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH705i(c100;TJ)' => array('model' => 'SH705i', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '705i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SH705i2(c100;TB;W20H13)' => array('model' => 'SH705i2', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH705i2(c100;TB;W24H16)' => array('model' => 'SH705i2', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH705i2(c100;TB;W30H20)' => array('model' => 'SH705i2', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH705i2(c100;TD)' => array('model' => 'SH705i2', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '705i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH705i2(c100;TJ)' => array('model' => 'SH705i2', 'htmlVersion' => '7.0', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '705i', 'status' => 'TJ'),

                               // HTML 7.1
                               'DoCoMo/2.0 SH905i(c100;TB;W24H16)' => array('model' => 'SH905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SH905i(c100;TB;W24H12)' => array('model' => 'SH905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SH905i(c100;TB;W20H13)' => array('model' => 'SH905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SH905i(c100;TB;W20H10)' => array('model' => 'SH905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SH905i(c100;TB;W30H20)' => array('model' => 'SH905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SH905i(c100;TB;W30H15)' => array('model' => 'SH905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SH905i(c100;TB;W16H10)' => array('model' => 'SH905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SH905i(c100;TB;W16H08)' => array('model' => 'SH905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SH905i(c100;TD)' => array('model' => 'SH905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 SH905i(c100;TJ)' => array('model' => 'SH905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 D905i(c100;TB;W24H17)' => array('model' => 'D905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D905i(c100;TB;W24H12)' => array('model' => 'D905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D905i(c100;TB;W20H14)' => array('model' => 'D905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D905i(c100;TB;W20H10)' => array('model' => 'D905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D905i(c100;TB;W30H22)' => array('model' => 'D905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D905i(c100;TB;W30H15)' => array('model' => 'D905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D905i(c100;TB;W17H12)' => array('model' => 'D905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D905i(c100;TB;W17H8)' => array('model' => 'D905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D905i(c100;TB;W40H29)' => array('model' => 'D905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D905i(c100;TB;W40H20)' => array('model' => 'D905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 D905i(c100;TD)' => array('model' => 'D905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '905i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 D905i(c100;TJ)' => array('model' => 'D905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'D', 'series' => '905i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 N905i(c100;TB;W24H16)' => array('model' => 'N905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N905i(c100;TB;W20H13)' => array('model' => 'N905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N905i(c100;TB;W30H20)' => array('model' => 'N905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N905i(c100;TB;W16H10)' => array('model' => 'N905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N905i(c100;TD)' => array('model' => 'N905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 N905i(c100;TJ)' => array('model' => 'N905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 P905i(c100;TB;W24H15)' => array('model' => 'P905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 P905i(c100;TB;W20H13)' => array('model' => 'P905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 P905i(c100;TB;W30H19)' => array('model' => 'P905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 P905i(c100;TD)' => array('model' => 'P905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '905i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 P905i(c100;TJ)' => array('model' => 'P905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '905i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 F905i(c100;TB;W24H17)' => array('model' => 'F905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905i(c100;TB;W24H12)' => array('model' => 'F905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905i(c100;TB;W20H14)' => array('model' => 'F905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905i(c100;TB;W20H10)' => array('model' => 'F905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905i(c100;TB;W30H22)' => array('model' => 'F905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905i(c100;TB;W30H15)' => array('model' => 'F905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905i(c100;TB;W17H12)' => array('model' => 'F905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905i(c100;TB;W17H8)' => array('model' => 'F905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905i(c100;TB;W40H29)' => array('model' => 'F905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905i(c100;TB;W40H20)' => array('model' => 'F905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905i(c100;TD)' => array('model' => 'F905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 F905i(c100;TJ)' => array('model' => 'F905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 SO905i(c100;TB;W24H18)' => array('model' => 'SO905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO905i(c100;TB;W20H15)' => array('model' => 'SO905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO905i(c100;TB;W30H23)' => array('model' => 'SO905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO905i(c100;TB;W16H12)' => array('model' => 'SO905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO905i(c100;TB;W12H9)' => array('model' => 'SO905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO905i(c100;TB;W20H10)' => array('model' => 'SO905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO905i(c100;TD)' => array('model' => 'SO905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 SO905i(c100;TJ)' => array('model' => 'SO905i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 N905imyu(c100;TB;W24H16)' => array('model' => 'N905imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N905imyu(c100;TB;W20H13)' => array('model' => 'N905imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N905imyu(c100;TB;W30H20)' => array('model' => 'N905imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N905imyu(c100;TB;W16H10)' => array('model' => 'N905imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N905imyu(c100;TD)' => array('model' => 'N905imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 N905imyu(c100;TJ)' => array('model' => 'N905imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 N905iBiz(c100;TB;W24H16)' => array('model' => 'N905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N905iBiz(c100;TB;W20H13)' => array('model' => 'N905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N905iBiz(c100;TB;W30H20)' => array('model' => 'N905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N905iBiz(c100;TB;W16H10)' => array('model' => 'N905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 N905iBiz(c100;TD)' => array('model' => 'N905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 N905iBiz(c100;TJ)' => array('model' => 'N905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '905i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 SH905iTV(c100;TB;W24H16)' => array('model' => 'SH905iTV', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH905iTV(c100;TB;W24H12)' => array('model' => 'SH905iTV', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH905iTV(c100;TB;W20H13)' => array('model' => 'SH905iTV', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH905iTV(c100;TB;W20H10)' => array('model' => 'SH905iTV', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH905iTV(c100;TB;W30H20)' => array('model' => 'SH905iTV', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH905iTV(c100;TB;W30H15)' => array('model' => 'SH905iTV', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH905iTV(c100;TB;W16H10)' => array('model' => 'SH905iTV', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH905iTV(c100;TB;W16H08)' => array('model' => 'SH905iTV', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TB'),
                               'DoCoMo/2.0 SH905iTV(c100;TD)' => array('model' => 'SH905iTV', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TD'),
                               'DoCoMo/2.0 SH905iTV(c100;TJ)' => array('model' => 'SH905iTV', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SH', 'series' => '905i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SO905iCS(c100;TB;W24H18)' => array('model' => 'SO905iCS', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO905iCS(c100;TB;W20H15)' => array('model' => 'SO905iCS', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO905iCS(c100;TB;W30H23)' => array('model' => 'SO905iCS', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO905iCS(c100;TB;W16H12)' => array('model' => 'SO905iCS', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO905iCS(c100;TB;W12H9)' => array('model' => 'SO905iCS', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO905iCS(c100;TB;W20H10)' => array('model' => 'SO905iCS', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 SO905iCS(c100;TD)' => array('model' => 'SO905iCS', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 SO905iCS(c100;TJ)' => array('model' => 'SO905iCS', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 368, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '905i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 F905iBiz(c100;TB;W24H17)' => array('model' => 'F905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905iBiz(c100;TB;W24H12)' => array('model' => 'F905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905iBiz(c100;TB;W20H14)' => array('model' => 'F905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905iBiz(c100;TB;W20H10)' => array('model' => 'F905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905iBiz(c100;TB;W30H22)' => array('model' => 'F905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905iBiz(c100;TB;W30H15)' => array('model' => 'F905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905iBiz(c100;TB;W16H12)' => array('model' => 'F905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905iBiz(c100;TB;W16H8)' => array('model' => 'F905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905iBiz(c100;TB;W40H29)' => array('model' => 'F905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905iBiz(c100;TB;W40H20)' => array('model' => 'F905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F905iBiz(c100;TD)' => array('model' => 'F905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 F905iBiz(c100;TJ)' => array('model' => 'F905iBiz', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 352, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '905i', 'status' => 'TJ', 'isGPS' => true),
                               'DoCoMo/2.0 P905iTV(c100;TB;W24H15)' => array('model' => 'P905iTV', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '905i', 'status' => 'TB'),
                               'DoCoMo/2.0 P905iTV(c100;TB;W20H13)' => array('model' => 'P905iTV', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '905i', 'status' => 'TB'),
                               'DoCoMo/2.0 P905iTV(c100;TB;W30H19)' => array('model' => 'P905iTV', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '905i', 'status' => 'TB'),
                               'DoCoMo/2.0 P905iTV(c100;TD)' => array('model' => 'P905iTV', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '905i', 'status' => 'TD'),
                               'DoCoMo/2.0 P905iTV(c100;TJ)' => array('model' => 'P905iTV', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '905i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P705i(c100;TB;W24H15)' => array('model' => 'P705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 P705i(c100;TB;W20H13)' => array('model' => 'P705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 P705i(c100;TB;W30H19)' => array('model' => 'P705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 P705i(c100;TB;W16H10)' => array('model' => 'P705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 P705i(c100;TD)' => array('model' => 'P705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TD'),
                               'DoCoMo/2.0 P705i(c100;TJ)' => array('model' => 'P705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N705i(c100;TB;W24H16)' => array('model' => 'N705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 N705i(c100;TB;W20H13)' => array('model' => 'N705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 N705i(c100;TB;W30H20)' => array('model' => 'N705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 N705i(c100;TB;W16H10)' => array('model' => 'N705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 N705i(c100;TD)' => array('model' => 'N705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '705i', 'status' => 'TD'),
                               'DoCoMo/2.0 N705i(c100;TJ)' => array('model' => 'N705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '705i', 'status' => 'TJ'),
                               'DoCoMo/2.0 N705imyu(c100;TB;W24H16)' => array('model' => 'N705imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 N705imyu(c100;TB;W20H13)' => array('model' => 'N705imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 N705imyu(c100;TB;W30H20)' => array('model' => 'N705imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 N705imyu(c100;TB;W16H10)' => array('model' => 'N705imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 N705imyu(c100;TD)' => array('model' => 'N705imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '705i', 'status' => 'TD'),
                               'DoCoMo/2.0 N705imyu(c100;TJ)' => array('model' => 'N705imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'N', 'series' => '705i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P705imyu(c100;TB;W24H15)' => array('model' => 'P705imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 P705imyu(c100;TB;W20H13)' => array('model' => 'P705imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 P705imyu(c100;TB;W30H19)' => array('model' => 'P705imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 P705imyu(c100;TB;W16H10)' => array('model' => 'P705imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 P705imyu(c100;TD)' => array('model' => 'P705imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TD'),
                               'DoCoMo/2.0 P705imyu(c100;TJ)' => array('model' => 'P705imyu', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TJ'),
                               'DoCoMo/2.0 SO705i(c100;TB;W24H16)' => array('model' => 'SO705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO705i(c100;TB;W20H13)' => array('model' => 'SO705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO705i(c100;TB;W30H20)' => array('model' => 'SO705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO705i(c100;TB;W16H10)' => array('model' => 'SO705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 SO705i(c100;TD)' => array('model' => 'SO705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '705i', 'status' => 'TD'),
                               'DoCoMo/2.0 SO705i(c100;TJ)' => array('model' => 'SO705i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 320, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'SO', 'series' => '705i', 'status' => 'TJ'),
                               'DoCoMo/2.0 P705iCL(c100;TB;W16H10)' => array('model' => 'P705iCL', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 P705iCL(c100;TB;W20H13)' => array('model' => 'P705iCL', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 P705iCL(c100;TB;W24H15)' => array('model' => 'P705iCL', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 P705iCL(c100;TB;W30H19)' => array('model' => 'P705iCL', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TB'),
                               'DoCoMo/2.0 P705iCL(c100;TD)' => array('model' => 'P705iCL', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TD'),
                               'DoCoMo/2.0 P705iCL(c100;TJ)' => array('model' => 'P705iCL', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 350, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'P', 'series' => '705i', 'status' => 'TJ'),
                               'DoCoMo/2.0 F884i(c100;TB;W20H11)' => array('model' => 'F884i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 364, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '884i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F884i(c100;TB;W16H11)' => array('model' => 'F884i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 364, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '884i', 'status' => 'TB', 'isGPS' => true),
                               'DoCoMo/2.0 F884i(c100;TD)' => array('model' => 'F884i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 364, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '884i', 'status' => 'TD', 'isGPS' => true),
                               'DoCoMo/2.0 F884i(c100;TJ)' => array('model' => 'F884i', 'htmlVersion' => '7.1', 'width' => 240, 'height' => 364, 'version' => '2.0', 'cacheSize' => 100, 'isFoma' => true, 'vendor' => 'F', 'series' => '884i', 'status' => 'TJ', 'isGPS' => true)
                               );

    /**#@-*/

    /**#@+
     * @access public
     */

    public function testShouldDetectUserAgentsAsDocomo()
    {
        reset($this->_profiles);
        while (list($userAgent, $profile) = each($this->_profiles)) {
            $agent = new Net_UserAgent_Mobile_DoCoMo($userAgent);

            $this->assertTrue($agent->isDoCoMo());
            $this->assertFalse($agent->isEZweb());
            $this->assertFalse($agent->isSoftBank());
            $this->assertFalse($agent->isWillcom());
            $this->assertFalse($agent->isNonMobile());
        }
    }

    public function testShouldProvideTheModelNameOfAUserAgent()
    {
        reset($this->_profiles);
        while (list($userAgent, $profile) = each($this->_profiles)) {
            $agent = new Net_UserAgent_Mobile_DoCoMo($userAgent);

            $this->assertEquals($profile['model'], $agent->getModel());
        }
    }

    public function testShouldProvideTheHtmlVersionOfAUserAgent()
    {
        reset($this->_profiles);
        while (list($userAgent, $profile) = each($this->_profiles)) {
            $agent = new Net_UserAgent_Mobile_DoCoMo($userAgent);

            $this->assertEquals($profile['htmlVersion'], $agent->getHTMLVersion());
        }
    }

    public function testShouldProvideTheScreenAreaOfAUserAgent()
    {
        reset($this->_profiles);
        while (list($userAgent, $profile) = each($this->_profiles)) {
            $agent = new Net_UserAgent_Mobile_DoCoMo($userAgent);
            $display = $agent->getDisplay();

            $this->assertEquals($profile['width'], $display->getWidth());
            $this->assertEquals($profile['height'], $display->getHeight());
        }
    }

    public function testShouldSupportYahooWebCrawler()
    {
        $agent = new Net_UserAgent_Mobile_DoCoMo('DoCoMo/2.0 SH902i (compatible; Y!J-SRD/1.0; http://help.yahoo.co.jp/help/jp/search/indexing/indexing-27.html)');

        $this->assertTrue($agent->isDoCoMo());
        $this->assertEquals('SH902i', $agent->getModel());
        $this->assertNull($agent->getStatus());
        $this->assertNull($agent->getBandwidth());
        $this->assertNull($agent->getSerialNumber());
        $this->assertTrue($agent->isFOMA());
        $this->assertNull($agent->getCardID());
        $this->assertEquals('compatible; Y!J-SRD/1.0; http://help.yahoo.co.jp/help/jp/search/indexing/indexing-27.html',
                            $agent->getComment()
                            );
        $this->assertEquals(5, $agent->getCacheSize());
        $this->assertEquals('DoCoMo', $agent->getName());
        $this->assertEquals('2.0', $agent->getVersion());
    }

    public function testShouldSupportDenaWebCrawler()
    {
        $agent = new Net_UserAgent_Mobile_DoCoMo('DoCoMo/2.0 N902iS(c100;TB;W24H12)(compatible; moba-crawler; http://crawler.dena.jp/)');

        $this->assertTrue($agent->isDoCoMo());
        $this->assertEquals('N902iS', $agent->getModel());
        $this->assertEquals('TB', $agent->getStatus());
        $this->assertNull($agent->getBandwidth());
        $this->assertNull($agent->getSerialNumber());
        $this->assertTrue($agent->isFOMA());
        $this->assertNull($agent->getCardID());
        $this->assertEquals('compatible; moba-crawler; http://crawler.dena.jp/',
                            $agent->getComment()
                            );
        $this->assertEquals(100, $agent->getCacheSize());
        $this->assertEquals('DoCoMo', $agent->getName());
        $this->assertEquals('2.0', $agent->getVersion());
    }

    /**
     * @since Method available since Release 1.0.0RC1
     */
    public function testShouldProvideTheUidOfASubscriber()
    {
        $uid = '1234567';
        $_SERVER['HTTP_X_DCMGUID'] = $uid;
        $agent = new Net_UserAgent_Mobile_DoCoMo('DoCoMo/2.0 SH905i(c100;TB;W24H16)');

        $this->assertEquals($uid, $agent->getUID());

        unset($_SERVER['HTTP_X_DCMGUID']);
        $agent = new Net_UserAgent_Mobile_DoCoMo('DoCoMo/2.0 SH905i(c100;TB;W24H16)');

        $this->assertNull($agent->getUID());
    }

    /**
     * @since Method available since Release 1.0.0RC1
     */
    public function testShouldProvideTheVersionOfAUserAgent()
    {
        reset($this->_profiles);
        while (list($userAgent, $profile) = each($this->_profiles)) {
            $agent = new Net_UserAgent_Mobile_DoCoMo($userAgent);

            $this->assertEquals($profile['version'], $agent->getVersion());
        }
    }

    /**
     * @since Method available since Release 1.0.0RC1
     */
    public function testShouldProvideTheCacheSizeOfAUserAgent()
    {
        reset($this->_profiles);
        while (list($userAgent, $profile) = each($this->_profiles)) {
            $agent = new Net_UserAgent_Mobile_DoCoMo($userAgent);

            $this->assertEquals($profile['cacheSize'], $agent->getCacheSize());
        }
    }

    /**
     * @since Method available since Release 1.0.0RC1
     */
    public function testShouldTellWhetherAUserAgentIsFomaOrNot()
    {
        reset($this->_profiles);
        while (list($userAgent, $profile) = each($this->_profiles)) {
            $agent = new Net_UserAgent_Mobile_DoCoMo($userAgent);

            $this->assertEquals($profile['isFoma'], $agent->isFoma());
        }
    }

    /**
     * @since Method available since Release 1.0.0RC1
     */
    public function testShouldProvideTheVendorOfAUserAgent()
    {
        reset($this->_profiles);
        while (list($userAgent, $profile) = each($this->_profiles)) {
            $agent = new Net_UserAgent_Mobile_DoCoMo($userAgent);

            $this->assertEquals($profile['vendor'], $agent->getVendor());
        }
    }

    /**
     * @since Method available since Release 1.0.0RC1
     */
    public function testShouldProvideTheSeriesOfAUserAgent()
    {
        reset($this->_profiles);
        while (list($userAgent, $profile) = each($this->_profiles)) {
            $agent = new Net_UserAgent_Mobile_DoCoMo($userAgent);

            $this->assertEquals($profile['series'], $agent->getSeries());
        }
    }

    /**
     * @since Method available since Release 1.0.0RC1
     */
    public function testShouldProvideTheStatusOfAUserAgent()
    {
        reset($this->_profiles);
        while (list($userAgent, $profile) = each($this->_profiles)) {
            $agent = new Net_UserAgent_Mobile_DoCoMo($userAgent);

            if (array_key_exists('status', $profile)) {
                $this->assertEquals($profile['status'], $agent->getStatus());
            } else {
                if (!is_null($agent->getStatus())) {
                    $this->fail($agent->getModel());
                }
            }
        }
    }

    /**
     * @since Method available since Release 1.0.0RC1
     */
    public function testShouldProvideTheSerialNumberOfAUserAgent()
    {
        $profiles = array('DoCoMo/1.0/P503i/c10/serNMABH200331' => array('serialNumber' => 'NMABH200331'),
                          'DoCoMo/2.0 N2001(c10;ser0123456789abcde;icc01234567890123456789)' => array('serialNumber' => '0123456789abcde'),
                          'DoCoMo/2.0 NM850iG(c100;TB;W22H10;ser123456789012345;icc)' => array('serialNumber' => '123456789012345')
                          );
        while (list($userAgent, $profile) = each($profiles)) {
            $agent = new Net_UserAgent_Mobile_DoCoMo($userAgent);

            $this->assertEquals($profile['serialNumber'], $agent->getSerialNumber());
        }
    }

    /**
     * @since Method available since Release 1.0.0RC1
     */
    public function testShouldProvideTheCardIdOfAUserAgent()
    {
        $profiles = array('DoCoMo/2.0 N2001(c10;ser0123456789abcde;icc01234567890123456789)' => array('cardID' => '01234567890123456789'));
        while (list($userAgent, $profile) = each($profiles)) {
            $agent = new Net_UserAgent_Mobile_DoCoMo($userAgent);

            $this->assertEquals($profile['cardID'], $agent->getCardID());
        }
    }

    /**
     * @since Method available since Release 1.0.0RC1
     */
    public function testShouldProvideTheBandwidthOfAUserAgent()
    {
        $profiles = array('DoCoMo/1.0/eggy/c300/s32/kPHS-K' => array('bandwidth' => 32),
                          'DoCoMo/1.0/P751v/c100/s64/kPHS-K' => array('bandwidth' => 64)
                          );
        while (list($userAgent, $profile) = each($profiles)) {
            $agent = new Net_UserAgent_Mobile_DoCoMo($userAgent);

            $this->assertEquals($profile['bandwidth'], $agent->getBandwidth());
        }
    }

    /**
     * @since Method available since Release 1.0.0RC1
     */
    public function testShouldTellWhetherAUserAgentIsAGpsModelOrNot()
    {
        while (list($userAgent, $profile) = each($this->_profiles)) {
            $agent = new Net_UserAgent_Mobile_DoCoMo($userAgent);

            if (!array_key_exists('isGPS', $profile)) {
                if ($agent->isGPS()) {
                    $this->fail($agent->getModel());
                }
            } else {
                $this->assertTrue($agent->isGPS(), $agent->getModel());
            }
        }
    }

    /**
     * @since Method available since Release 1.0.0RC1
     */
    public function testShouldProvideTheScreenInformationOfAUserAgent()
    {
        $agent = new Net_UserAgent_Mobile_DoCoMo('DoCoMo/2.0 P705iCL(c100;TB;W16H10)');
        $display = $agent->getDisplay();

        $this->assertEquals(240, $display->getWidth());
        $this->assertEquals(350, $display->getHeight());
        $this->assertTrue($display->isColor());
        $this->assertEquals(262144, $display->getDepth());
        $this->assertEquals(16, $display->getWidthBytes());
        $this->assertEquals(10, $display->getHeightBytes());
    }

    /**
     * @since Method available since Release 1.0.0RC1
     */
    public function testShouldUseAnExternalScreenInformationIfTheEnvironmentVariableIsGiven1()
    {
        $_SERVER['DOCOMO_MAP'] = dirname(__FILE__) . '/' . basename(__FILE__, '.php') . '/docomo-screen.xml';
        $agent = new Net_UserAgent_Mobile_DoCoMo('DoCoMo/2.0 P705iCL(c100;TB;W16H10)');
        $display = $agent->getDisplay();

        $this->assertEquals(999, $display->getWidth());
        $this->assertEquals(999, $display->getHeight());
        $this->assertFalse($display->isColor());
        $this->assertEquals(999, $display->getDepth());
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
