<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface
{
    /**
     * Get all
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     *
     * @return mixed
     */
    public function find(int $id);

    /**
     * Create
     *
     * @return mixed
     */
    public function create(array $attributes = []);

    /**
     * Update
     *
     * @return mixed
     */
    public function update(int $id, array $attributes = []);

    /**
     * Delete
     *
     * @return mixed
     */
    public function delete($id);
}
