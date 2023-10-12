<?php

namespace App\Http\BookingApp\Trait;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasPhoto
{
    /**
     * Update the user's  photo.
     *
     * @param  \Illuminate\Http\UploadedFile  $photo
     * @param  string  $storagePath
     * @return void
     */
    public function updatePhoto(UploadedFile $photo, $storagePath = 'profile-photos')
    {
        tap($this->photo_path, function ($previous) use ($photo, $storagePath) {
            $this->forceFill([
                'photo_path' => $photo->storePublicly(
                    $storagePath, ['disk' => $this->photoDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->photoDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the user's  photo.
     *
     * @return void
     */
    public function deletePhoto()
    {


        if (is_null($this->photo_path)) {
            return;
        }

        Storage::disk($this->photoDisk())->delete($this->photo_path);

        $this->forceFill([
            'photo_path' => null,
        ])->save();
    }

    /**
     * Get the URL to the user's  photo.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function photoUrl(): Attribute
    {
        return Attribute::get(function () {
            return $this->photo_path
                    ? Storage::disk($this->photoDisk())->url($this->photo_path)
                    : $this->defaultPhotoUrl();
        });
    }

    /**
     * Get the default  photo URL if no  photo has been uploaded.
     *
     * @return string
     */
    protected function defaultPhotoUrl()
    {
        $name = trim(collect(explode(' ', $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=7F9CF5&background=EBF4FF';
    }



    /**
     * Get the disk that  photos should be stored on.
     *
     * @return string
     */
    protected function photoDisk()
    {
        return 'public';
    }
}

