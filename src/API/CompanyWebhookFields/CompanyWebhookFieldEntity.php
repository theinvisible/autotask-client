<?php

namespace Anteris\Autotask\API\CompanyWebhookFields;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents CompanyWebhookField entities.
 */
class CompanyWebhookFieldEntity extends DataTransferObject
{
    public int $fieldID;
    public int $id;
    public bool $isDisplayAlwaysField;
    public bool $isSubscribedField;
    public int $webhookID;
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
