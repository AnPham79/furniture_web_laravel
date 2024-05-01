<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class InvoiceStatusEnum extends Enum
{
    public const CHO_XAC_NHAN = 0;
    public const DA_XAC_NHAN = 1;
    public const DANG_GIAO = 2;
    public const DA_NHAN = 3;
    public const DA_HUY = 4;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::CHO_XAC_NHAN:
                return 'Pending confirmation';
            case self::DA_XAC_NHAN:
                return 'Confirmed';
            case self::DANG_GIAO:
                return 'Being delivered';
            case self::DA_NHAN:
                return 'Received';
            case self::DA_HUY:
                return 'Cancelled';
            default:
                return parent::getDescription($value);
        }
    }

    public static function toSelectArray(): array
    {
        return [
            self::CHO_XAC_NHAN => self::getDescription(self::CHO_XAC_NHAN),
            self::DA_XAC_NHAN => self::getDescription(self::DA_XAC_NHAN),
            self::DANG_GIAO => self::getDescription(self::DANG_GIAO),
            self::DA_NHAN => self::getDescription(self::DA_NHAN),
            self::DA_HUY => self::getDescription(self::DA_HUY),
        ];
    }
}
