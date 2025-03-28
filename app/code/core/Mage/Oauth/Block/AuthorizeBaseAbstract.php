<?php

/**
 * OpenMage
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available at https://opensource.org/license/osl-3-0-php
 *
 * @category   Mage
 * @package    Mage_Oauth
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://www.magento.com)
 * @copyright  Copyright (c) 2020-2024 The OpenMage Contributors (https://www.openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * OAuth authorization block
 *
 * @category   Mage
 * @package    Mage_Oauth
 */
abstract class Mage_Oauth_Block_AuthorizeBaseAbstract extends Mage_Oauth_Block_Authorize_Abstract
{
    /**
     * Retrieve user authorize form posting url
     *
     * @return string
     */
    abstract public function getPostActionUrl();

    /**
     * Retrieve reject authorization url
     *
     * @return string
     */
    public function getRejectUrl()
    {
        return $this->getUrl(
            $this->getRejectUrlPath() . ($this->getIsSimple() ? 'Simple' : ''),
            ['_query' => ['oauth_token' => $this->getToken()]],
        );
    }

    /**
     * Retrieve reject URL path
     *
     * @return string
     */
    abstract public function getRejectUrlPath();

    /**
     * Get form identity label
     *
     * @return string
     */
    abstract public function getIdentityLabel();

    /**
     * Get form identity label
     *
     * @return string
     */
    abstract public function getFormTitle();
}
