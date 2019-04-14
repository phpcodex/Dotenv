<?php

namespace Phpcodex\Dotenv;

use Phpcodex\Dotenv\Interfaces\DotenvInterface;
use Phpcodex\Dotenv\Interfaces\DotenvLoader;
use Phpcodex\Dotenv\Adaptor\IniLoaderService;

class Dotenv implements DotenvInterface
{

    const DOTENV_DEFAULT_FILEPATH = '.';
    const DOTENV_DEFAULT_FILENAME = '.env';

    const DOTENV_INI_LOADER = IniLoaderService::class;

    private static $instance = null;

    protected $dotenv_path;
    protected $dotenv_file;
    protected $dotenv_loader;

    private function __construct($path, $filename, DotenvLoader $loader)
    {
        $this->dotenv_path = $path != null ? $path : self::DOTENV_DEFAULT_FILEPATH;
        $this->dotenv_file = $filename != null ? $filename : self::DOTENV_DEFAULT_FILENAME;
        $this->dotenv_loader = $loader;
    }

    public static function create($dotenv_path = null, $dotenv_filename = null, $dotenv_loader = self::DOTENV_INI_LOADER)
    {
        if (self::$instance == null) {
            self::$instance = new self($dotenv_path, $dotenv_filename, new $dotenv_loader);
        }

        return self::$instance;
    }

    public function load()
    {
        $this->dotenv_loader->load($this->dotenv_path, $this->dotenv_file);
    }

    public function overload()
    {
        $this->dotenv_loader->overload($this->dotenv_path, $this->dotenv_file);
    }
}