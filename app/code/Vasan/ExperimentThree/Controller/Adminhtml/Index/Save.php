<?php
/**
 * Save
 *
 * @copyright Copyright © 2023 Kemana. All rights reserved.
 * @author    psureshvasan@kemana.com
 */

namespace Vasan\ExperimentThree\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Vasan\ExperimentThree\Api\Data\StoreLocatorInterface;
use Vasan\ExperimentThree\Model\StoreLocatorFactory;
use Vasan\ExperimentThree\Model\StoreLocatorRepository;

class Save extends Action
{
    const ADMIN_RESOURCE = 'Vasan_ExperimentThree::stores';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var StoreLocatorFactory
     */
    protected $storeLocatorFactory;

    /**
     * @var StoreLocatorRepository
     */
    protected $storeLocatorRepository;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param StoreLocatorFactory $storeLocatorFactory
     * @param StoreLocatorRepository $storeLocatorRepository
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        StoreLocatorFactory $storeLocatorFactory,
        StoreLocatorRepository $storeLocatorRepository
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->storeLocatorFactory = $storeLocatorFactory;
        $this->storeLocatorRepository = $storeLocatorRepository;
    }

    /**
     * @inheritdoc
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $id = $this->getRequest()->getParam('id');
        $data = $this->getRequest()->getParams();

        if ($id) {
            $storeLocator = $this->storeLocatorRepository->getById($id);
        } else {
            unset($data[StoreLocatorInterface::KEY_ID]);
            $storeLocator = $this->storeLocatorFactory->create();
        }

        unset($data[StoreLocatorInterface::KEY_UPDATED_AT]);
        $map = $data['map'];
        $general = $data['general'];
        $data = array_merge($data, $general, $map);
        unset($data['map']);
        unset($data['general']);
        $storeLocator->setData($data);

        try {
            $this->storeLocatorRepository->save($storeLocator);
            $this->messageManager->addSuccessMessage(' StoreLocator is saved successfully');
            if (key_exists('back', $data) && $data['back'] == 'edit') {

                return $resultRedirect->setPath('*/*/edit', ['id' => $id, '_current' => true]);
            }

            return $resultRedirect->setPath('*/*/');
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage(__("StoreLocator is not saved"));

            return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
        }
    }
}
