<?php

namespace Anteris\Autotask\API\PriceListProducts;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask PriceListProducts.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/PriceListProductsEntity.htm Autotask documentation.
 */
class PriceListProductService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the PriceListProduct based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): PriceListProductEntity
    {
        return PriceListProductEntity::fromResponse(
            $this->client->get("PriceListProducts/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see PriceListProductQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): PriceListProductQueryBuilder
    {
        return new PriceListProductQueryBuilder($this->client);
    }

    /**
     * Updates the pricelistproduct.
     *
     * @param  PriceListProductEntity  $resource  The pricelistproduct entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(PriceListProductEntity $resource): void
    {
        $this->client->put("PriceListProducts/$resource->id", $resource->toArray());
    }
}
