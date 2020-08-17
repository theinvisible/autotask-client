<?php

namespace Anteris\Autotask\API\QuoteLocations;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents QuoteLocation entities.
 */
class QuoteLocationEntity extends DataTransferObject
{
    public ?string $address1;
    public ?string $address2;
    public ?string $city;
    public int $id;
    public ?string $postalCode;
    public ?string $state;
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
