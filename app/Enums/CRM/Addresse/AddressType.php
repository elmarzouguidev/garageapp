<?php

namespace App\Enums\CRM\Addresse;

enum AddressType: int
{
    case INVOICEING = 1;
    case DELIVERING = 2;
    case NORMAL = 3;

    public function getColor(): string
    {
        return match ($this) {
            AddressType::INVOICEING => 'bg-secondary',
            AddressType::DELIVERING => 'bg-success',
            AddressType::NORMAL => 'bg-success',
        };
    }

    public function getName(): string
    {
        return match ($this) {

            self::INVOICEING => 'Adresse de facturation',
            self::DELIVERING => 'Adresse de livraison',
            self::NORMAL => 'Adresse',
        };
    }

    public static function options()
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $type) => [
                $type->value => $type->getName(),
            ])
            ->toArray();
    }
}
