<?php

namespace Piggy\Api\Models\Loyalty\Receptions;

use DateTime;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Contacts\ContactIdentifier;
use Piggy\Api\Models\Loyalty\Rewards\DigitalReward;
use Piggy\Api\Models\Loyalty\Rewards\DigitalRewardCode;
use Piggy\Api\Models\Loyalty\Rewards\Reward;
use Piggy\Api\Models\Shops\Shop;

/**
 * Class CreditReception
 * @package Piggy\Api\Models
 */
class DigitalRewardReception
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var int
     */
    protected $credits;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var Shop
     */
    protected $shop;

    /**
     * @var ContactIdentifier|null
     */
    protected $contactIdentifier;

    /**
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var DigitalReward
     */
    protected $digitalReward;

    /**
     * @var DigitalRewardCode
     */
    protected $digitalRewardCode;

    /**
     * @param string $type
     * @param int $credits
     * @param string $uuid
     * @param Contact $contact
     * @param Shop $shop
     * @param ContactIdentifier|null $contactIdentifier
     * @param string $createdAt
     * @param DigitalReward $digitalReward
     * @param DigitalRewardCode $digitalRewardCode
     */
    public function __construct(string $type, int $credits, string $uuid, Contact $contact, Shop $shop, ?ContactIdentifier $contactIdentifier, string $createdAt, DigitalReward $digitalReward, DigitalRewardCode $digitalRewardCode)
    {
        $this->type = $type;
        $this->credits = $credits;
        $this->uuid = $uuid;
        $this->contact = $contact;
        $this->shop = $shop;
        $this->contactIdentifier = $contactIdentifier;
        $this->createdAt = $createdAt;
        $this->digitalReward = $digitalReward;
        $this->digitalRewardCode = $digitalRewardCode;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getCredits(): int
    {
        return $this->credits;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @return Shop
     */
    public function getShop(): Shop
    {
        return $this->shop;
    }

    /**
     * @return ContactIdentifier
     */
    public function getContactIdentifier(): ContactIdentifier
    {
        return $this->contactIdentifier;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return DigitalReward
     */
    public function getDigitalReward(): DigitalReward
    {
        return $this->digitalReward;
    }

    /**
     * @return DigitalRewardCode
     */
    public function getDigitalRewardCode(): DigitalRewardCode
    {
        return $this->digitalRewardCode;
    }

}
