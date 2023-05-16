<?php
/**
 * LoggerService
 *
 * @copyright Copyright © 2023 Kemana. All rights reserved.
 * @author    psureshvasan@kemana.com
 */

namespace Vasan\Base\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Psr\Log\LoggerInterface;

class LoggerService
{
    const XML_PATH_DEBUG = 'vasanbase/general/debug_mode';

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param LoggerInterface $logger
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        LoggerInterface $logger,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->logger = $logger;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Log the message
     *
     * @param string $message
     * @return void
     */
    public function log(string $message): void
    {
        $isDebugEnabled = $this->scopeConfig->getValue(self::XML_PATH_DEBUG);
        if ($isDebugEnabled) {
            $this->logger->debug($message);
        }
    }
}
