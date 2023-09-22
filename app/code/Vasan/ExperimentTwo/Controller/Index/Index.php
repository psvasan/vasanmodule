<?php
/**
 * Index
 *
 * @copyright Copyright © 2023 Kemana. All rights reserved.
 * @author    psureshvasan@kemana.com
 */

namespace Vasan\ExperimentTwo\Controller\Index;


use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use Vasan\Base\Model\LoggerService;
use Magento\Framework\EntityManager\EventManager;
use Vasan\ExperimentTwo\Model\Two;
use Vasan\ExperimentTwo\Model\TwoFactory;
class Index implements ActionInterface
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var LoggerService
     */
    protected $loggerService;

    /**
     * @var EventManager
     */
    protected $eventManager;


    protected $twoFactory;

    /**
     * @param PageFactory $pageFactory
     * @param LoggerService $loggerService
     * @param EventManager $eventManager
     */
    public function __construct(
        PageFactory $pageFactory,
        LoggerService $loggerService,
        EventManager $eventManager,
        TwoFactory $twoFactory
    ) {
        $this->pageFactory = $pageFactory;
        $this->loggerService = $loggerService;
        $this->eventManager = $eventManager;
        $this->twoFactory = $twoFactory;
    }

    /**
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->set('Experiment Two ');
        /** @var Two $two */
        $two = $this->twoFactory->create();
        $two->setName('Vasan');
        $two->setDescription('Testing Event data changes');
        $this->eventManager->dispatch('experiment_two_event', ['two' => $two]);
        $this->loggerService->log('Experiment Two Frontend Controller executed');
        $this->loggerService->log('Status ' . $two->getStatus());
        return $page;
    }
}
