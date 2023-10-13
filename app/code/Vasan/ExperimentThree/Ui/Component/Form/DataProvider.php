<?php
/**
 * DataProvider
 *
 * @copyright Copyright © 2023 Kemana. All rights reserved.
 * @author    psureshvasan@kemana.com
 */

namespace Vasan\ExperimentThree\Ui\Component\Form;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Vasan\ExperimentThree\Model\ResourceModel\StoreLocator\CollectionFactory;

class DataProvider extends AbstractDataProvider
{


    /**
     * @var array
     */
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get Rate items.
     *
     * @return array
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getData()
    {
        $generalKeys = ['id', 'name', 'desc'];
        $mapKeys = ['lat', 'lon'];
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        foreach ($items as $item) {
            foreach ($generalKeys as $key) {
                $this->loadedData[$item->getId()]['general'][$key] = $item->getData()[$key];
            }
            foreach ($mapKeys as $key) {
                $this->loadedData[$item->getId()]['map'][$key] = $item->getData()[$key];
            }

        }

        return $this->loadedData;
    }
}
