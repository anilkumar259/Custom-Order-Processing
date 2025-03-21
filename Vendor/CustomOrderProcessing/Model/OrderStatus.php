<?php
namespace Vendor\CustomOrderProcessing\Model;

use Vendor\CustomOrderProcessing\Api\OrderStatusInterface;
use Magento\Sales\Model\OrderRepository;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\LocalizedException;

class OrderStatus implements OrderStatusInterface
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function updateStatus($orderId, $status)
    {
        try {
            $order = $this->orderRepository->get($orderId);
            if (!$order->getId()) {
                throw new NoSuchEntityException(__('Order not found.'));
            }
            $order->setStatus($status);
            $this->orderRepository->save($order);
            return ['success' => true, 'message' => 'Order status updated successfully.'];
        } catch (NoSuchEntityException $e) {
            throw new LocalizedException(__('Order not found.'));
        }
    }
}