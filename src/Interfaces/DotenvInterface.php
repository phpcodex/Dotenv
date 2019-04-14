<?php

namespace Phpcodex\Dotenv\Interfaces;

interface DotenvInterface
{
    public static function create($dotenv_path = null, $dotenv_filename = null, $dotenv_loader);
    public function load();
    public function overload();
}