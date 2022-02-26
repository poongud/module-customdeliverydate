<?php
/**
 * Copyright © Adobe All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Adobe\CustomDeliveryDate\Plugin\Checkout\Model;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Quote\Model\QuoteRepository;
use Magento\Checkout\Api\Data\ShippingInformationInterface;
use Magento\Checkout\Model\ShippingInformationManagement;

/**
 * ShippingInformationManagement
 */
class ShippingInformationManagementPlugin
{
    /**
     * @var QuoteRepository
     */
    protected $quoteRepository;

    /**
     * @param QuoteRepository $quoteRepository
     */
    public function __construct(
        QuoteRepository $quoteRepository
    )
    {
        $this->quoteRepository = $quoteRepository;
    }

    /**
     * @param ShippingInformationManagement $subject
     * @param $cartId
     * @param ShippingInformationInterface $addressInformation
     * @return void
     * @throws NoSuchEntityException
     */
    public function beforeSaveAddressInformation(
        ShippingInformationManagement $subject,
                                      $cartId,
        ShippingInformationInterface  $addressInformation
    )
    {
        $extAttributes = $addressInformation->getExtensionAttributes();
        $customdeliveryDate = $extAttributes->getShippingDatetime();
        $quote = $this->quoteRepository->getActive($cartId);
        $quote->setShippingDatetime($customdeliveryDate);
    }
}
