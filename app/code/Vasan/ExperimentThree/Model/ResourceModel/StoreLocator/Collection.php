<?php
/**
 * Collection
 *
 * @copyright Copyright © 2023 Kemana. All rights reserved.
 * @author    psureshvasan@kemana.com
 */

namespace Vasan\ExperimentThree\Model\ResourceModel\StoreLocator;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Vasan\ExperimentThree\Model\ResourceModel\StoreLocator as ResourceModel;
use Vasan\ExperimentThree\Model\StoreLocator as Model;
class Collection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
