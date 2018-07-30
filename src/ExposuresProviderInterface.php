<?php
namespace FilmTools\Commons;

interface ExposuresProviderInterface
{
    /**
     * @return ExposuresInterface
     */
    public function getExposures() : ExposuresInterface;
}
