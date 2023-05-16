<?php
/**
 * Index
 *
 * @copyright Copyright © 2023 Kemana. All rights reserved.
 * @author    psureshvasan@kemana.com
 */

namespace Vasan\ExperimentOne\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Vasan\Base\Model\LoggerService;

class Index extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'Vasan_ExperimentOne::index';

    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var LoggerService
     */
    protected $logger;

    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param LoggerService $logger
     */
    public function __construct(Context $context, PageFactory $pageFactory, LoggerService $logger)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->logger = $logger;
    }

    public function execute()
    {
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->prepend('Experiment One Index');
        $this->logger->log('Experiment One Index controller is executed');
        return $page;
    }
}
