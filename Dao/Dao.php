<?php
namespace Dao;

interface Dao
{
    /**
     * Finds all entities about linked model.
     * @return Model[]|null
     */
    function findAll();
}