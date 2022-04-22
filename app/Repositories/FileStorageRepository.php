<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileStorageRepository
{
    /**
     * Upload file to system.
     * Returning hash of filename.
     *
     * @param Request $request
     * @param string $key key of the file input name.
     * @param string $driver
     * @param string $path path to upload.
     * @return string
     */
    public function uploadTo(Request $request, string $key, string $driver = 'local', string $path): string
    {
        $file = $request->file($key);

        Storage::disk($driver)->put($path, $file);

        return $file->hashName();
    }

    /**
     * Remove file by path.
     *
     * @param string $path
     * @return void
     */
    public function remove(string $path): void
    {
        if (Storage::get($path)) {
            Storage::delete($path);
        }
    }
}
