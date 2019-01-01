<?php
/*
 * @package    SussexDev_CustomerHandles
 * @copyright  Copyright (c) 2019 Scott Parsons
 * @license    https://github.com/ScottParsons/module-customerhandles/blob/master/LICENSE.md
 * @version    1.0.1
 */
namespace SussexDev\CustomerHandles\Observer;

use Magento\Customer\Model\Session;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddCustomerHandlesObserver implements ObserverInterface
{
    /**
     * @var Session
     */
    private $customerSession;

    /**
     * AddCustomerHandlesObserver constructor.
     *
     * @param Session $customerSession
     */
    public function __construct(
        Session $customerSession
    )
    {
        $this->customerSession = $customerSession;
    }

    /**
     * @param Observer $observer
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute(Observer $observer)
    {
        $layout = $observer->getEvent()->getLayout();

        if ($this->customerSession->isLoggedIn()) {
            $layout->getUpdate()->addHandle('customer_logged_in');
        } else {
            $layout->getUpdate()->addHandle('customer_logged_out');
        }
    }
}
