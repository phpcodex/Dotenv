<?php

namespace Phpcodex\Dotenv\Interfaces;

interface DotenvLoader
{
    public function getData();
    public function load($file_path, $file_name);
    public function overload($file_path, $file_name);
}