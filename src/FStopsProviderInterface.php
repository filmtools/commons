<?php
namespace FilmTools\Commons;

interface FStopsProviderInterface
{
    /**
     * @return FStopsInterface
     */
    public function getFStops() : FStopsInterface;
}
