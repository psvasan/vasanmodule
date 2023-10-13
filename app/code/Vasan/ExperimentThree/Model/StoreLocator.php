<?php
/**
 * StoreLocator
 *
 * @copyright Copyright © 2023 Kemana. All rights reserved.
 * @author    psureshvasan@kemana.com
 */

namespace Vasan\ExperimentThree\Model;


use Vasan\ExperimentThree\Api\Data\StoreLocatorInterface;
use Magento\Framework\Model\AbstractExtensibleModel;
use Vasan\ExperimentThree\Model\ResourceModel\StoreLocator as ResourceModel;
class StoreLocator extends AbstractExtensibleModel implements StoreLocatorInterface
{

    /**
     * @var string
     */
    protected $_eventPrefix = 'vasan_storelocator';

    /**
     * @var string
     */
    protected $_eventObject = 'vasan_storelocator';

    /**
     * Model construct that should be used for object initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }


    public function getName(): string
    {
        return $this->getData(self::KEY_NAME);
    }

    public function getDesc(): string
    {
        return $this->getData(self::KEY_DESC);
    }

    public function getLat(): int
    {
        return (int) $this->getData(self::KEY_LAT);
    }

    public function getLon(): int
    {
        return (int) $this->getData(self::KEY_LON);
    }

    public function getCreatedAt(): string
    {
        return $this->getData(self::KEY_CREATED_AT);
    }

    public function getUpdatedAt(): string
    {
        return $this->getData(self::KEY_UPDATED_AT);
    }

    public function setName(string $name): StoreLocatorInterface
    {
        $this->setData(self::KEY_NAME, $name);
        return $this;
    }

    public function setDesc(string $desc): StoreLocatorInterface
    {
        $this->setData(self::KEY_DESC, $desc);
        return  $this;
    }

    public function setLat(int $lat): StoreLocatorInterface
    {
        $this->setData(self::KEY_LAT, $lat);
        return $this;
    }

    public function setLon(int $lon): StoreLocatorInterface
    {
        $this->setData(self::KEY_LON, $lon);
        return $this;
    }

    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    public function setExtensionAttributes(\Vasan\ExperimentThree\Api\Data\StoreLocatorExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
