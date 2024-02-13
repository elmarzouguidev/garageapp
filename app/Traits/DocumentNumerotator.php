<?php

namespace App\Traits;

trait DocumentNumerotator
{
    public function getNextDocumentNumberNormal(string $for): string
    {
        if (in_array($for, ['estimate', 'invoice', 'bcommand', 'blivraison', 'transaction', 'invoice_avoir', 'compte', 'expense', 'expense_invoice'])) {
            $startColumn = $for.'_start';
            $prefixColumn = $for.'_prefix';
            $digitColumn = $for.'_digit';
            $dateFormatColumn = $for.'_date_format';
            $delimiterColumn = $for.'_delimiter';

            $prefix = getDocument()->{$prefixColumn};
            $delimiter = getDocument()->{$delimiterColumn};
            $dateFormat = getDocument()->{$dateFormatColumn};
            $next = getDocument()->{$startColumn};
            $digit = getDocument()->{$digitColumn};

            return $prefix.$delimiter.date($dateFormat).$delimiter.str_pad($next, $digit, '0', STR_PAD_LEFT);
        }
        if (in_array($for, ['affair'])) {
            $startColumn = $for.'_start';
            $prefixColumn = $for.'_prefix';
            $digitColumn = $for.'_digit';
            $dateFormatColumn = $for.'_date_format';
            $delimiterColumn = $for.'_delimiter';

            $prefix = getAffair()->{$prefixColumn};
            $delimiter = getAffair()->{$delimiterColumn};
            $dateFormat = getAffair()->{$dateFormatColumn};
            $next = getAffair()->{$startColumn};
            $digit = getAffair()->{$digitColumn};

            return $prefix.$delimiter.date($dateFormat).$delimiter.str_pad($next, $digit, '0', STR_PAD_LEFT);
        }
        if (in_array($for, ['project'])) {
            $startColumn = $for.'_start';
            $prefixColumn = $for.'_prefix';
            $digitColumn = $for.'_digit';
            $dateFormatColumn = $for.'_date_format';
            $delimiterColumn = $for.'_delimiter';

            $prefix = getProject()->{$prefixColumn};
            $delimiter = getProject()->{$delimiterColumn};
            $dateFormat = getProject()->{$dateFormatColumn};
            $next = getProject()->{$startColumn};
            $digit = getProject()->{$digitColumn};

            return $prefix.$delimiter.date($dateFormat).$delimiter.str_pad($next, $digit, '0', STR_PAD_LEFT);
        }

        return '00000';
    }
}
