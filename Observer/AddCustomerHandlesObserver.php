<?php
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
