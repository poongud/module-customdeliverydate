<?php
/**
 * Copyright © Adobe All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Adobe\CustomDeliveryDate\Observer;

use Magento\Framework\DataObject\Copy;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * SaveOrderBeforeSalesModelQuoteObserver Copy Quote to Sales
 */
class SaveOrderBeforeSalesModelQuoteObserver implements ObserverInterface
{

    /**
     * @var Copy
     */
    protected $objectCopyService;

    /**
     * @param Copy $objectCopyService
     */
    public function __construct(
        Copy $objectCopyService
    )
    {
        $this->objectCopyService = $objectCopyService;
    }

    /**
     * @param Observer $observer
     * @return $this|void
     */
    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getData('order');
        $quote = $observer->getEvent()->getData('quote');
        $this->objectCopyService->copyFieldsetToTarget('sales_convert_quote', 'to_order', $quote, $order);
        return $this;
    }
}
