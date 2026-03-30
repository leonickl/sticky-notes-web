<?php

namespace App;

use App\Models\User;
use Exception;
use League\Flysystem\Filesystem;
use League\Flysystem\WebDAV\WebDAVAdapter;
use PXP\Ds\Vector;
use PXP\Lib\Auth;
use Sabre\DAV\Client;

class Storage
{
    public function __construct(
        private string $url,
        private string $user,
        private string $password,
        private string $directory,
    ) {}

    public static function user(User $user): Storage
    {
        if (! isset(
            $user->nc_url,
            $user->nc_user,
            $user->nc_pass,
            $user->nc_dir,
        )) {
            throw new Exception('User has no connected Nextcloud');
        }

        return new Storage(
            url: $user->nc_url,
            user: $user->nc_user,
            password: $user->nc_pass,
            directory: $user->nc_dir,
        );
    }

    public static function current(): Storage
    {
        return Storage::user(Auth::user());
    }

    private function fileSystem()
    {
        $client = new Client([
            'baseUri' => "https://$this->url/remote.php/dav/files/$this->user/",
            'userName' => $this->user,
            'password' => $this->password,
        ]);

        return new Filesystem(new WebDAVAdapter($client));
    }

    public function list(): Vector
    {
        $files = $this->fileSystem()
            ->listContents($this->directory)
            ->filter(fn ($attributes) => $attributes->isFile())
            ->map(fn ($attributes) => $attributes->path())
            ->toArray();

        return v(...$files)
            ->map(fn ($path) => v(...explode('/', $path))->last());
    }

    public function read(string $path): string
    {
        return $this->fileSystem()->read("$this->directory/$path");
    }
}
