<?php

namespace App\Enums\Roles;

enum RolesEnumAdmin: string
{
    case SUPER_ADMIN = 'SuperAdmin';
    case COMMERCIAL = 'Commercial';
    case SUPPORT = 'Support';
    case COMPTABLE = 'Comptable';

    case DEVELOPER = 'Developer';

    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    public function label(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'Administrateur',
            self::COMMERCIAL => 'Commercial',
            self::SUPPORT => 'Support Client',
            self::COMPTABLE => 'Comptable',

            self::DEVELOPER => 'Developer',
        };
    }

    public static function options()
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $type) => [
                $type->value => $type->label(),
            ])
            ->toArray();
    }
}
