<?php

namespace Anteris\Autotask\API\AttachmentInfo;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents AttachmentInfo entities.
 */
class AttachmentInfoEntity extends DataTransferObject
{
    public ?Carbon $attachDate;
    public ?int $attachedByContactID;
    public ?int $attachedByResourceID;
    public string $attachmentType;
    public ?string $contentType;
    public ?int $fileSize;
    public string $fullPath;
    public int $id;
    public ?int $impersonatorCreatorResourceID;
    public ?int $opportunityID;
    public ?int $parentID;
    public int $parentType;
    public int $publish;
    public string $title;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['attachDate'] = new Carbon($array['attachDate']);
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
