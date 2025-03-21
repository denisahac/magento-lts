<?php

/**
 * OpenMage
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available at https://opensource.org/license/osl-3-0-php
 *
 * @category   Mage
 * @package    Mage_Paypal
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://www.magento.com)
 * @copyright  Copyright (c) 2022-2024 The OpenMage Contributors (https://www.openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $this */
$installer = $this;
$connection = $installer->getConnection();
$installer->startSetup();
$data = [
    ['paypal_reversed', 'PayPal Reversed'],
    ['paypal_canceled_reversal', 'PayPal Canceled Reversal'],
];
$connection = $installer->getConnection()->insertArray(
    $installer->getTable('sales/order_status'),
    ['status', 'label'],
    $data,
);
/**
 * Set default value for "skip order review page" option for Express Checkout for new installations
 */
$ecSkipOrderReviewStepFlagPath = 'payment/paypal_express/skip_order_review_step';
Mage::getConfig()->saveConfig($ecSkipOrderReviewStepFlagPath, '1');

/**
 * Set default value for "Mobile Optimized" option for Payflow Link/Advanced/Hosted Pro for new installations
 */
$paymentCode = ['payflow_link', 'payflow_advanced', 'hosted_pro'];
foreach ($paymentCode as $value) {
    Mage::getConfig()->saveConfig("payment/{$value}/mobile_optimized", '1');
}
$installer->endSetup();
