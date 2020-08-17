<?php

namespace Anteris\Autotask\API\InternalLocations;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents InternalLocation entities.
 */
class InternalLocationEntity extends DataTransferObject
{
    public ?string $additionalAddressInfo;
    public ?string $address1;
    public ?string $address2;
    public ?string $city;
    public ?string $country;
    public ?int $holidaySetId;
    public int $id;
    public ?bool $isDefault;
    public string $name;
    public ?string $postalCode;
    public ?string $state;
    public ?string $timeZone;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
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
