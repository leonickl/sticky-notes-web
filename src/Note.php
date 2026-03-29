<?php

namespace App;

use PXP\Ds\Vector;

class Note
{
    private function __construct(
        private string $uuid,
        private string $title,
        private string $content,
        private int $style,
        private string $modified,
    ) {}

    private static function fromJSON(string $json): Note
    {
        $object = json_decode($json);

        return new Note(
            uuid: $object->uuid,
            title: $object->title,
            content: $object->content,
            style: $object->style,
            modified: $object->modified,
        );
    }

    public static function all(): Vector
    {
        $dir = config('note.dir');

        return v(...scandir($dir))
            ->filter(fn ($file) => ! str_starts_with($file, '.'))
            ->map(fn ($file) => Note::fromJSON(file_get_contents("$dir/$file")));
    }

    public static function find(string $uid): Note
    {
        $dir = config('note.dir');

        return Note::fromJSON(file_get_contents("$dir/$uid.json"));
    }

    public function uuid(): string
    {
        return $this->uuid;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function content(): string
    {
        return str_replace("\n", "<br />", $this->content);
    }

    public function style(): int
    {
        return $this->style;
    }

    public function modified(): string
    {
        return date('Y-m-d H:i', strtotime($this->modified));
    }
}
