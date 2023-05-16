<?php
/**
 * Index
 *
 * @copyright Copyright © 2023 Kemana. All rights reserved.
 * @author    psureshvasan@kemana.com
 */

namespace Vasan\ExperimentOne\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use Vasan\Base\Model\LoggerService;

class Index implements ActionInterface
{

    /**
     * @var PageFactory
     */
    protected $pageFactory;

    protected $loggerService;


    /**
     * Constructor.
     *
     * @param PageFactory $pageFactory
     */
    public function __construct(PageFactory $pageFactory, LoggerService $loggerService)
    {
        $this->pageFactory = $pageFactory;
        $this->loggerService = $loggerService;
    }

    /**
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->set('Experiment One ');
        $this->loggerService->log('Experiment One Frontend Controller executed');
        return $page;
    }
}
