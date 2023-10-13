<?php

namespace Vasan\ExperimentThree\Api\Data;

interface StoreLocatorSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get the list of StoreLocator.
     *
     * @return \Vasan\ExperimentThree\Api\Data\StoreLocatorInterface[]
     */
    public function getItems();

    /**
     * @param \Vasan\ExperimentThree\Api\Data\StoreLocatorInterface[] $items
     * @return StoreLocatorSearchResultsInterface
     */
    public function setItems(array $items);
}
