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

    private static function fromJSON(string|false $json): Note
    {
        if ($json === false) {
            return Note::empty();
        }

        $object = json_decode($json);

        if ($object === null || $object === false || $object === '') {
            return Note::empty();
        }

        return new Note(
            uuid: $object->uuid,
            title: $object->title,
            content: $object->content,
            style: $object->style,
            modified: $object->modified,
        );
    }

    public static function empty(): Note
    {
        return new Note(
            uuid: '---',
            title: '---',
            content: '---',
            style: 1,
            modified: date('Y-m-d H:i:s', time()),
        );
    }

    public static function all(): Vector
    {
        $dir = config('note.dir');

        // TODO: handle filesystem exception
        return Storage::current()
            ->list()
            ->map(fn ($file) => Note::find(explode('.', $file)[0]))
            ->filter();
    }

    public static function find(string $uid): Note
    {
        $dir = config('note.dir');
        // TODO: handle filesystem exception
        return Note::fromJSON(file_get_contents("$dir/$uid.json"));
    }

    public function uuid(): string
    {
        return $this->uuid;
    }

    public function title(): string
    {
        return $this->title ?: '---';
    }

    public function content(): string
    {
        return str_replace("\n", '<br />', $this->content);
    }

    public function style(): string
    {
        return match ($this->style) {
            1 => 'yellow',
            2 => 'pink',
            3 => 'green',
            4 => 'purple',
            5 => 'blue',
            6 => 'grey',
            7 => 'black',
            8 => 'white',
        };
    }

    public function modified(): string
    {
        return date('Y-m-d H:i', strtotime($this->modified));
    }
}
