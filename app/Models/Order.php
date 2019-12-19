<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public static function statusTypes($typeId = null): array
    {
        $types = [
            0 => ['name' => __('Sipariş Alındı')],
            1 => ['name' => __('Siparişiniz Hazırlanıyor')],
            2 => ['name' => __('Sipariş Yola Çıktı')],
            3 => ['name' => __('Sipariş Teslim Edildi')],
        ];

        if (null === $typeId) {
            return $types;
        }

        return $types[$typeId];
    }

    public static function paymentTypes(): array
    {
        return [
            0 => ['name' => __('Kapıda Nakit')],
            1 => ['name' => __('Kapıda Kredi Kartı')],
            2 => ['name' => __('Kapıda Ticket Kart')],
        ];
    }
}
