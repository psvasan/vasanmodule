<?php

declare(strict_types=1);

namespace Vasan\ExperimentThree\Api;


use Vasan\ExperimentThree\Api\Data\StoreLocatorInterface;
use Vasan\ExperimentThree\Api\Data\StoreLocatorSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
interface StoreLocatorRepositoryInterface
{
    /**
     * Get StoreLocator using id.
     *
     * @param int $id
     * @return StoreLocatorInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById(int $id);

    /**
     * Get StoreLocator list.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return StoreLocatorSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Save the StoreLocator.
     *
     * @param StoreLocatorInterface $storeLocator
     * @return StoreLocatorInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(StoreLocatorInterface $storeLocator);

    /**
     * Delete the StoreLocator by id.
     *
     * @param int $id
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById(int $id): bool;

    /**
     * Delete the StoreLocator.
     *
     * @param StoreLocatorInterface $storeLocator
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(StoreLocatorInterface $storeLocator): bool;

}
