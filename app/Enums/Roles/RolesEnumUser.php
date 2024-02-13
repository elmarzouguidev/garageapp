<?php

namespace App\Enums\Roles;

enum RolesEnumUser: string
{
    case PARTNER = 'PARTNER';
    case CONTACT = 'CONTACT';
    case MANAGER = 'MANAGER';
    case DECLARANT = 'DECLARANT';
    case INTERVENANT = 'INTERVENANT';

    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    public function label(): string
    {
        return match ($this) {
            self::PARTNER => 'Partenaire',
            self::CONTACT => 'Contact',
            self::MANAGER => 'Manager',
            self::DECLARANT => 'Déclarant',
            self::INTERVENANT => 'Intervenant',
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
