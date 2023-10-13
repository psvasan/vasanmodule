<?php
/**
 * Actions
 *
 * @copyright Copyright © 2023 Kemana. All rights reserved.
 * @author    psureshvasan@kemana.com
 */

namespace Vasan\ExperimentThree\Ui\Component\Listing\StoreLocator\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;
use Vasan\ExperimentThree\Api\Data\StoreLocatorInterface;

class Actions extends Column
{

    /** Url path */
    const PATH_EDIT = 'experimentthree/index/edit';
    const PATH_DELETE = 'experimentthree/index/delete';

    /** @var UrlInterface */
    protected $urlBuilder;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item[StoreLocatorInterface::KEY_ID])) {
                    $item[$name]['edit'] = [
                        'href'  => $this->urlBuilder->getUrl(self::PATH_EDIT, ['id' => $item[StoreLocatorInterface::KEY_ID]]),
                        'label' => __('Edit')
                    ];
                    $item[$name]['delete'] = [
                        'href'    => $this->urlBuilder->getUrl(self::PATH_DELETE, ['id' => $item[StoreLocatorInterface::KEY_ID]]),
                        'label'   => __('Delete'),
                        'confirm' => [
                            'title'   => __('Delete') . ' ' . $item[StoreLocatorInterface::KEY_ID],
                            'message' => __(
                                'Are you sure you wan\'t to delete the StoreLocator?'
                            )
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}
