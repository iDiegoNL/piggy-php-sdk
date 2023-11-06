<?php

namespace Piggy\Api\Models\Shops;

use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Shops\ShopMapper;
use Piggy\Api\Mappers\Shops\ShopsMapper;

/**
 * Class Shop
 * @package Piggy\Api\Models\Shops
 */
class Shop
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var null|int
     */
    protected $id;

    /**
     * @var string
     */
    protected static $mapper = ShopMapper::class;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/shops";


    /**
     * @param string $uuid
     * @param string $name
     * @param int | null $id
     */
    public function __construct(string $uuid, string $name, ?int $id)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param array $params
     * @return array
     * @throws PiggyRequestException
     */
    public static function list(array $params = []): array
    {
        $response = Environment::get(self::$resourceUri, []);

        $mapper = new ShopsMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param string $shopUuid
     * @param array $params
     * @return Shop
     * @throws PiggyRequestException
     */
    public static function get(string $shopUuid, array $params = []): Shop
    {
        $response = Environment::get(self::$resourceUri . "/$shopUuid", $params);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }
}
