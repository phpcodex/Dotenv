<?php

namespace Phpcodex\Dotenv\Adaptor;

use Phpcodex\Dotenv\Interfaces\DotenvLoader;

class IniLoaderService implements DotenvLoader
{
    protected $data = [];

    public function getData()
    {
        return $this->data;
    }

    public function load($file_path, $file_name)
    {
        $this->store(parse_ini_file($file_path . '/' . $file_name, true));
    }

    public function overload($file_path, $file_name)
    {
        $this->store(parse_ini_file($file_path . '/' . $file_name, true), true);
    }

    private function store(array $data, $overwrite = false)
    {
        foreach ($data as $key => $value) {
            $key = strtoupper($key);

            if ($overwrite || !getenv($key)) {
                $storeValue = is_array($value) ? json_encode($value) : $value;

                putenv($key . '=' . $storeValue);
                $this->data[$key] = $value;
            }
        }
    }
}