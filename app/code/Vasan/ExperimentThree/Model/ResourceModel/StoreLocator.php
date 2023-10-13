<?php
/**
 * StoreLocator
 *
 * @copyright Copyright © 2023 Kemana. All rights reserved.
 * @author    psureshvasan@kemana.com
 */

namespace Vasan\ExperimentThree\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Vasan\ExperimentThree\Api\Data\StoreLocatorInterface;

class StoreLocator extends AbstractDb
{
    /**
     * @inheritdoc
     */
    public function _construct()
    {
        $this->_init('vasan_storelocator', StoreLocatorInterface::KEY_ID);
    }
}
