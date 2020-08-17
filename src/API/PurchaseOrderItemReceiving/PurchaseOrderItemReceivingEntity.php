<?php

namespace Anteris\Autotask\API\PurchaseOrderItemReceiving;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents PurchaseOrderItemReceiving entities.
 */
class PurchaseOrderItemReceivingEntity extends DataTransferObject
{
    public int $id;
    public int $purchaseOrderItemID;
    public ?int $quantityBackOrdered;
    public int $quantityNowReceiving;
    public ?int $quantityPreviouslyReceived;
    public ?Carbon $receiveDate;
    public ?int $receivedByResourceID;
    public ?string $serialNumber;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['receiveDate'] = new Carbon($array['receiveDate']);
        parent::__construct($array);
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response)
    {
        $responseArray = json_decode($response->getBody(), true);

        if (isset($responseArray['item']) === false) {
            throw new \Exception('Missing item key in response.');
        }

        return new self($responseArray['item']);
    }
}
