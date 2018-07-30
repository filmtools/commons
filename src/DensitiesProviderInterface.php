<?php
namespace FilmTools\Commons;

interface DensitiesProviderInterface
{
    /**
     * @return DensitiesInterface
     */
    public function getDensities() : DensitiesInterface;
}
