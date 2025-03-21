<?php

/**
 * OpenMage
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available at https://opensource.org/license/osl-3-0-php
 *
 * @category   Mage
 * @package    Mage_Sales
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://www.magento.com)
 * @copyright  Copyright (c) 2020-2024 The OpenMage Contributors (https://www.openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Sales_Model_Resource_Setup $installer */
$installer = $this;

$tablePaymentTransaction = $this->getTable('sales/payment_transaction');
$tableOrders = $this->getTable('sales_order');
$tableOrderPayment = $this->getTable('sales_order_entity');

$installer->run("
CREATE TABLE `{$tablePaymentTransaction}` (
  `transaction_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `payment_id` int(10) unsigned NOT NULL DEFAULT '0',
  `txn_id` varchar(100) NOT NULL DEFAULT '',
  `parent_txn_id` varchar(100) DEFAULT NULL,
  `txn_type` varchar(15) NOT NULL DEFAULT '',
  `is_closed` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `additional_information` blob,
  PRIMARY KEY (`transaction_id`),
  UNIQUE KEY `UNQ_ORDER_PAYMENT_TXN` (`order_id`,`payment_id`,`txn_id`),
  KEY `IDX_ORDER_ID` (`order_id`),
  KEY `IDX_PARENT_ID` (`parent_id`),
  KEY `IDX_PAYMENT_ID` (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$installer->getConnection()->addConstraint(
    'SALES_PAYMENT_TRANSACTION_PARENT',
    $tablePaymentTransaction,
    'parent_id',
    $tablePaymentTransaction,
    'transaction_id',
);

$installer->getConnection()->addConstraint(
    'SALES_PAYMENT_TRANSACTION_ORDER',
    $tablePaymentTransaction,
    'order_id',
    $tableOrders,
    'entity_id',
);

$installer->getConnection()->addConstraint(
    'SALES_PAYMENT_TRANSACTION_PAYMENT',
    $tablePaymentTransaction,
    'payment_id',
    $tableOrderPayment,
    'entity_id',
);
