<?php

namespace Piggy\Api\Resources\OAuth\WebhookSubscriptions;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\WebhookSubscriptions\WebhookSubscriptionMapper;
use Piggy\Api\Mappers\WebhookSubscriptions\WebhookSubscriptionsMapper;
use Piggy\Api\Models\WebhookSubscriptions\WebhookSubscription;
use Piggy\Api\Resources\BaseResource;

/**
 * Class WebhookSubscriptionsResource
 * @package Piggy\Api\Resources\OAuth\Giftcards
 */
class WebhookSubscriptionsResource extends BaseResource
{

    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/webhook-subscriptions";

    /**
     * @param string $webhookUuid
     * @param string|null $name
     * @param string|null $url
     * @param array|null $attributes
     * @param string|null $status
     * @return WebhookSubscription
     * @throws PiggyRequestException
     */
    public function update(string $webhookUuid, ?string $name, ?string $url, ?array $attributes, ?string $status)
    {
        $response = $this->client->put("$this->resourceUri/{$webhookUuid}", [
            "name" => $name,
            "url" => $url,
            "attributes" => $attributes,
            "status" => $status
        ]);

        $mapper = new WebhookSubscriptionMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @throws PiggyRequestException
     */
    public function list(?string $eventType = null, ?string $status = null): array
    {
        $response = $this->client->get("$this->resourceUri", [
            "event_type" => $eventType,
            "status" => $status
        ]);

        $mapper = new WebhookSubscriptionsMapper();

        return $mapper->map((array)$response->getData());
    }

    public function create(string $name, string $url, string $eventType): WebhookSubscription
    {
        $response = $this->client->post($this->resourceUri, [
            "name" => $name,
            "url" => $url,
            "event_type" => $eventType,
        ]);

        $mapper = new WebhookSubscriptionMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $webhookUuid
     * @return WebhookSubscription
     * @throws PiggyRequestException
     */
    public function get(string $webhookUuid): WebhookSubscription
    {
        $response = $this->client->get("$this->resourceUri/$webhookUuid");

        $mapper = new WebhookSubscriptionMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $webhookUuid
     * @throws PiggyRequestException
     */
    public function destroy(string $webhookUuid): string
    {
        $this->client->destroy("$this->resourceUri/$webhookUuid", []);

        return 'Webhook deleted';
    }
}
