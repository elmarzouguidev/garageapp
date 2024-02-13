<?php

namespace App\Enums\CRM\Client;

enum ClientType: string
{
    case PERSONNE = 'PERSONNE';
    case ORGANISATION = 'ORGANISATION';

    public function getColor(): string
    {
        return match ($this) {
            self::PERSONNE => 'Particulier',
            self::ORGANISATION => 'Société',
        };
    }

    public function getName(): string
    {
        return match ($this) {

            self::PERSONNE => 'Particulier',
            self::ORGANISATION => 'Société',
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
