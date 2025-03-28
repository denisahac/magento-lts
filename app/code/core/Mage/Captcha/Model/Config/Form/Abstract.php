<?php

/**
 * OpenMage
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available at https://opensource.org/license/osl-3-0-php
 *
 * @category   Mage
 * @package    Mage_Captcha
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://www.magento.com)
 * @copyright  Copyright (c) 2020-2024 The OpenMage Contributors (https://www.openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Data source to fill "Forms" field
 *
 * @category   Mage
 * @package    Mage_Captcha
 */
abstract class Mage_Captcha_Model_Config_Form_Abstract extends Mage_Core_Model_Config_Data
{
    /**
     * @var string
     */
    protected $_configPath;

    /**
     * Returns options for form multiselect
     *
     * @return array
     */
    public function toOptionArray()
    {
        $optionArray = [];
        /** @var Mage_Core_Model_Config_Element $backendNode */
        $backendNode = Mage::getConfig()->getNode($this->_configPath);
        if ($backendNode) {
            foreach ($backendNode->children() as $formNode) {
                /** @var Mage_Core_Model_Config_Element $formNode */
                if (!empty($formNode->label)) {
                    $optionArray[] = ['label' => (string) $formNode->label, 'value' => $formNode->getName()];
                }
            }
        }
        return $optionArray;
    }
}
