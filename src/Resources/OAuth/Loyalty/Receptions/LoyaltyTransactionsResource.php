<?php

namespace Piggy\Api\Resources\OAuth\Loyalty\Receptions;

use Piggy\Api\Enum\LoyaltyTransactionType;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\LoyaltyTransactionMapper;
use Piggy\Api\Resources\BaseResource;

/**
 * Class CreditReceptionsResource
 * @package Piggy\Api\Resources\OAuth\Loyalty\Receptions
 */
class LoyaltyTransactionsResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/loyalty-transactions";

    /**
     * @param int $page
     * @param string|null $contactUuid
     * @param LoyaltyTransactionType|null $type
     * @param string|null $shopUuid
     * @param int $limit
     *
     * @return array
     * @throws PiggyRequestException
     */
    public function list(int $page = 1, ?string $contactUuid = null, ?LoyaltyTransactionType $type = null, ?string $shopUuid = null, int $limit = 10): array
    {
        $response = $this->client->get($this->resourceUri, [
            "limit" => $limit,
            "page" => $page,
            "contact_uuid" => $contactUuid,
            "type" => $type,
            "shop_uuid" => $shopUuid
        ]);

        $mapper = new LoyaltyTransactionMapper();

        return $mapper->map($response->getData());
    }
}
