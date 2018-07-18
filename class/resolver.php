<?php
class resolver {
    public $rootDir;
    public $folder;
    public $name;

    public function __construct($rootDir, $folder, $name)
    {
        $this->rootDir = $rootDir;
        $this->folder = $folder;
        $this->name = $name;
    }

    public function requireFile() {
        return require sprintf('%s/%s/%s.php', $this->rootDir, $this->folder, $this->name);
    }
}