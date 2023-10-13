<?php
/**
 * NewAction
 *
 * @copyright Copyright © 2023 Kemana. All rights reserved.
 * @author    psureshvasan@kemana.com
 */

namespace Vasan\ExperimentThree\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;

class NewAction extends Action
{
    const ADMIN_RESOURCE = 'Vasan_ExperimentThree::stores';

    /**
     * @inheritdoc
     */
    public function execute()
    {
        return $this->resultRedirectFactory->create()->setPath('*/*/edit', ['_current' => true]);
    }
}
