<?php

/**
 * OpenMage
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available at https://opensource.org/license/osl-3-0-php
 *
 * @category   Mage
 * @package    Mage_Uploader
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://www.magento.com)
 * @copyright  Copyright (c) 2022-2024 The OpenMage Contributors (https://www.openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * @category   Mage
 * @package    Mage_Uploader
 */
class Mage_Uploader_Block_Single extends Mage_Uploader_Block_Abstract
{
    /**
     * Prepare layout, change button and set front-end element ids mapping
     *
     * @return Mage_Core_Block_Abstract
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->getChild('browse_button')->setLabel(Mage::helper('uploader')->__('...'));

        return $this;
    }

    public function __construct()
    {
        parent::__construct();

        $this->getUploaderConfig()->setSingleFile(true);
        $this->getButtonConfig()->setSingleFile(true);
    }
}
