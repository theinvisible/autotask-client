<?php

namespace Anteris\Autotask\API\Appointments;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Appointments.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/AppointmentsEntity.htm Autotask documentation.
 */
class AppointmentService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new appointment.
     *
     * @param  AppointmentEntity  $resource  The appointment entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(AppointmentEntity $resource)
    {
        $this->client->post("Appointments", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the Appointment to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("Appointments/$id");
    }

    /**
     * Finds the Appointment based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): AppointmentEntity
    {
        return AppointmentEntity::fromResponse(
            $this->client->get("Appointments/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see AppointmentQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): AppointmentQueryBuilder
    {
        return new AppointmentQueryBuilder($this->client);
    }

    /**
     * Updates the appointment.
     *
     * @param  AppointmentEntity  $resource  The appointment entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(AppointmentEntity $resource): void
    {
        $this->client->put("Appointments/$resource->id", $resource->toArray());
    }
}
