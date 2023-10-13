<?php
/**
 * Edit
 *
 * @copyright Copyright © 2023 Kemana. All rights reserved.
 * @author    psureshvasan@kemana.com
 */

namespace Vasan\ExperimentThree\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use Vasan\ExperimentThree\Api\Data\StoreLocatorInterface;
use Vasan\ExperimentThree\Model\StoreLocatorRepository;
use Vasan\ExperimentThree\Model\StoreLocatorFactory;

class Edit extends Action
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
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->storeLocatorFactory->create();
        if ($id) {
            /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
            $resultRedirect = $this->resultRedirectFactory->create();
            try {
                /** @var StoreLocatorInterface $model */
                $model = $this->storeLocatorRepository->getById($id);
                if (!$model->getId()) {
                    $this->messageManager->addErrorMessage(__('This StoreLocator no longer exists.'));
                    return $resultRedirect->setPath('*/*/');
                }
            } catch (\Exception $exception) {
                return $resultRedirect->setPath('*/*/');
            }
        }

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
//        $resultPage->setActiveMenu('Vasan_ExperimentThree::stores')
//            ->addBreadcrumb(__('StoreLocator'), __('StoreLocator'));

        $resultPage->getConfig()->getTitle()->prepend(__('StoreLocator'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getName() : __('New StoreLocator'));
        return $resultPage;
    }
}
