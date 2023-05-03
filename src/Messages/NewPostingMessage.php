<?php

namespace Muscobytes\OzonSeller\Messages;

use Carbon\Carbon;
use Muscobytes\OzonSeller\Messages\Properties\Product;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class NewPostingMessage extends Data
{
    public function __construct(
        #[In(['TYPE_NEW_POSTING'])]
        public string $message_type,

        public string $posting_number,

        #[DataCollectionOf(Product::class)]
        public DataCollection $products,

        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d\TH:i:s.vP')]
        public Carbon $in_process_at,

        public int $warehouse_id,

        public int $seller_id
    ) {
    }
}