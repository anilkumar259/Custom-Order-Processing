
<?php
namespace Vendor\CustomOrderProcessing\Api;

interface OrderStatusInterface
{
    public function updateStatus($orderId, $status);
}