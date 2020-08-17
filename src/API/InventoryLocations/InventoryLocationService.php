<?php

namespace Anteris\Autotask\API\InventoryLocations;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask InventoryLocations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/InventoryLocationsEntity.htm Autotask documentation.
 */
class InventoryLocationService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new inventorylocation.
     *
     * @param  InventoryLocationEntity  $resource  The inventorylocation entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(InventoryLocationEntity $resource)
    {
        $this->client->post("InventoryLocations", $resource->toArray());
    }


    /**
     * Finds the InventoryLocation based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): InventoryLocationEntity
    {
        return InventoryLocationEntity::fromResponse(
            $this->client->get("InventoryLocations/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see InventoryLocationQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): InventoryLocationQueryBuilder
    {
        return new InventoryLocationQueryBuilder($this->client);
    }

    /**
     * Updates the inventorylocation.
     *
     * @param  InventoryLocationEntity  $resource  The inventorylocation entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(InventoryLocationEntity $resource): void
    {
        $this->client->put("InventoryLocations/$resource->id", $resource->toArray());
    }
}
