<?php

declare(strict_types=1);

namespace Pronko\TierPrice\ViewModel;

use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class TierPrice implements ArgumentInterface
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * TierPrice constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @return string
     */
    public function getJsonConfig(): string
    {
        return $this->serializer->serialize([
            'qtyIdentifier' => '.product-add-form #qty',
            'priceIdentifier' => '.price-container.price-final_price [data-price-type="finalPrice"] .price',
            'tierPrices' => [
                ['qty' => 3, 'price' => "$40.00"],
                ['qty' => 5, 'price' => "$35.99"],
                ['qty' => 10, 'price' => "$30.00"],
            ]
        ]);
    }
}
