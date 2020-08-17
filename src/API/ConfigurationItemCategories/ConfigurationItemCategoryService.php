<?php

namespace Anteris\Autotask\API\ConfigurationItemCategories;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ConfigurationItemCategories.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ConfigurationItemCategoriesEntity.htm Autotask documentation.
 */
class ConfigurationItemCategoryService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new configurationitemcategory.
     *
     * @param  ConfigurationItemCategoryEntity  $resource  The configurationitemcategory entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ConfigurationItemCategoryEntity $resource)
    {
        $this->client->post("ConfigurationItemCategories", $resource->toArray());
    }


    /**
     * Finds the ConfigurationItemCategory based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ConfigurationItemCategoryEntity
    {
        return ConfigurationItemCategoryEntity::fromResponse(
            $this->client->get("ConfigurationItemCategories/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ConfigurationItemCategoryQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ConfigurationItemCategoryQueryBuilder
    {
        return new ConfigurationItemCategoryQueryBuilder($this->client);
    }

    /**
     * Updates the configurationitemcategory.
     *
     * @param  ConfigurationItemCategoryEntity  $resource  The configurationitemcategory entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ConfigurationItemCategoryEntity $resource): void
    {
        $this->client->put("ConfigurationItemCategories/$resource->id", $resource->toArray());
    }
}
