<?php
/**
 * StoreLocatorRepository
 *
 * @copyright Copyright © 2023 Kemana. All rights reserved.
 * @author    psureshvasan@kemana.com
 */

namespace Vasan\ExperimentThree\Model;


use Vasan\ExperimentThree\Api\Data\StoreLocatorInterface;

use Vasan\ExperimentThree\Api\StoreLocatorRepositoryInterface;
use Vasan\ExperimentThree\Api\Data\StoreLocatorSearchResultsInterfaceFactory as SearchResultFactory;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Vasan\ExperimentThree\Model\ResourceModel\StoreLocator\CollectionFactory;
use Vasan\ExperimentThree\Model\StoreLocatorFactory;
use Vasan\ExperimentThree\Model\ResourceModel\StoreLocator as ResourceModel;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
class StoreLocatorRepository implements StoreLocatorRepositoryInterface
{
    /**
     * @var array
     */
    protected $instances = [];

    /**
     * @var SearchResultFactory
     */
    protected $searchResultFactory;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var JoinProcessorInterface
     */
    protected $joinProcessor;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var StoreLocatorFactory
     */
    protected $storeLocatorFactory;

    /**
     * @var ResourceModel
     */
    protected $resourceModel;

    public function __construct(
        SearchResultFactory $searchResultFactory,
        CollectionFactory $collectionFactory,
        JoinProcessorInterface $joinProcessor,
        CollectionProcessorInterface $collectionProcessor,
        StoreLocatorFactory $storeLocatorFactory,
        ResourceModel $resourceModel
    ) {
        $this->searchResultFactory = $searchResultFactory;
        $this->collectionFactory = $collectionFactory;
        $this->joinProcessor = $joinProcessor;
        $this->collectionProcessor = $collectionProcessor;
        $this->storeLocatorFactory = $storeLocatorFactory;
        $this->resourceModel = $resourceModel;
    }

    public function getById(int $id)
    {
        if (!isset($this->instances[$id])) {
            $storeLocator = $this->storeLocatorFactory->create();
            $this->resourceModel->load($storeLocator, $id);

            if (!$storeLocator->getId()) {
                throw new NoSuchEntityException(__('StoreLocator does not exist'));
            }

            $this->instances[$id] = $storeLocator;
        }

        return $this->instances[$id];

    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $searchResult = $this->searchResultFactory->create();
        $collection = $this->collectionFactory->create();
        $this->joinProcessor->process($collection, StoreLocatorInterface::class);
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setItems($collection->getItems());
        return $searchResult;
    }

    public function save(StoreLocatorInterface $storeLocator)
    {
        try {
            $this->resourceModel->save($storeLocator);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__('Could not save the StoreLocator : %1', $exception->getMessage()));
        }

        return $storeLocator;
    }

    public function deleteById(int $id): bool
    {
        return $this->delete($this->getById($id));
    }

    public function delete(StoreLocatorInterface $storeLocator): bool
    {
        $id = $storeLocator->getId();

        try {
            $this->resourceModel->delete($storeLocator);
            unset($this->instances[$id]);
        } catch (\Exception $e) {
            throw new LocalizedException(__('Unable to remove StoreLocator %1', $id));
        }

        return true;
    }
}
