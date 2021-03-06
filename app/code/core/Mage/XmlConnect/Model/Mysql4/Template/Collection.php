<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_XmlConnect
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Template resource collection
 *
 * @category   Mage
 * @package    Mage_XmlConnect
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Mage_XmlConnect_Model_Mysql4_Template_Collection
    extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    /**
     * Internal constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('xmlconnect/template');
    }

    /**
     * Initialize collection select
     *
     * @return Mage_XmlConnect_Model_Mysql4_Template_Collection
     */
    protected function _initSelect()
    {
        parent::_initSelect();
        $this->_joinApplicationName();
        return $this;
    }

    /**
     * Join Application Name to collection
     *
     * @return Mage_XmlConnect_Model_Mysql4_Template_Collection
     */
    protected function _joinApplicationName()
    {
        $this->getSelect()
            ->joinLeft(array('app' => $this->getTable('xmlconnect/application')), 'app.code = app_code', array(
                'app_name' => 'app.name',
            ));
        return $this;
    }
}
