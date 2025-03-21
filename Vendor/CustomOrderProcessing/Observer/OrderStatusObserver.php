<?php
namespace Vendor\CustomOrderProcessing\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;

class OrderStatusObserver implements ObserverInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $this->logger->info(sprintf('Order %d status changed to %s', $order->getId(), $order->getStatus()));
    }
}