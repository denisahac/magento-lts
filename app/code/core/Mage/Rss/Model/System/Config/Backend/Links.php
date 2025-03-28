<?php

/**
 * OpenMage
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available at https://opensource.org/license/osl-3-0-php
 *
 * @category   Mage
 * @package    Mage_Rss
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://www.magento.com)
 * @copyright  Copyright (c) 2022-2024 The OpenMage Contributors (https://www.openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Cache cleaner backend model
 *
 * @category   Mage
 * @package    Mage_Rss
 */
class Mage_Rss_Model_System_Config_Backend_Links extends Mage_Core_Model_Config_Data
{
    /**
     * Invalidate cache type, when value was changed
     */
    protected function _afterSave()
    {
        if ($this->isValueChanged()) {
            Mage::app()->getCacheInstance()->invalidateType(Mage_Core_Block_Abstract::CACHE_GROUP);
        }
        return $this;
    }
}
