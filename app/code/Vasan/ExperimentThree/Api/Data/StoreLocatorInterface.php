<?php

declare(strict_types=1);

namespace Vasan\ExperimentThree\Api\Data;

interface StoreLocatorInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    const KEY_ID                   = 'id';
    const KEY_NAME                 = 'name';
    const KEY_DESC                 = 'desc';
    const KEY_LAT                  = 'lat';
    const KEY_LON                  = 'lon';

    const KEY_CREATED_AT           = 'created_at';
    const KEY_UPDATED_AT           = 'updated_at';

    /**
     * Get the id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Get the desc.
     *
     * @return string
     */
    public function getDesc(): string;

    /**
     * Get the lat.
     *
     * @return int
     */
    public function getLat(): int;

    /**
     * Get the lon.
     *
     * @return int
     */
    public function getLon(): int;

    /**
     * Get the created at
     *
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * Get the updated at
     *
     * @return string
     */
    public function getUpdatedAt(): string;

    /**
     * Set the name.
     *
     * @param string $name
     * @return StoreLocatorInterface
     */
    public function setName(string $name): StoreLocatorInterface;

    /**
     * Set the desc.
     *
     * @param string $desc
     * @return StoreLocatorInterface
     */
    public function setDesc(string $desc): StoreLocatorInterface;

    /**
     * Set the lat.
     *
     * @param int $lat
     * @return StoreLocatorInterface
     */
    public function setLat(int $lat): StoreLocatorInterface;

    /**
     * Set the lon.
     *
     * @param int $lon
     * @return StoreLocatorInterface
     */
    public function setLon(int $lon): StoreLocatorInterface;

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Vasan\ExperimentThree\Api\Data\StoreLocatorExtensionInterface
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Vasan\ExperimentThree\Api\Data\StoreLocatorExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Vasan\ExperimentThree\Api\Data\StoreLocatorExtensionInterface $extensionAttributes);
}
