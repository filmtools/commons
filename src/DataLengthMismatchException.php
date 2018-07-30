<?php
namespace FilmTools\Commons;

class DataLengthMismatchException extends FilmToolsInvalidArgumentException
{
    protected $message = "Exposure and density arrays are not of same length.";
}
