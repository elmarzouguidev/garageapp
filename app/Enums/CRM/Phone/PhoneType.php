<?php

namespace App\Enums\CRM\Phone;

enum PhoneType: int
{
    case FIX = 1;
    case FAX = 2;
    case PORTABLE = 3;

    public function getColor(): string
    {
        return match ($this) {
            PhoneType::FIX => 'bg-secondary',
            PhoneType::FAX => 'bg-success',
            PhoneType::PORTABLE => 'bg-success',
        };
    }

    public function getName(): string
    {
        return match ($this) {

            self::FIX => 'Fix',
            self::FAX => 'Fax',
            self::PORTABLE => 'Portable',
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
