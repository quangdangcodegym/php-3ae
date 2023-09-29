<?php

namespace App\Http\Services;

use App\Exceptions\MusicNotFoundException;
use App\Models\Music;

class MusicService
{

    public function getAll()
    {
        return Music::all();
    }
    public function findMusicById($id)
    {
        $music = Music::where('id', $id)->first();
        if ($music == null) {
            throw new MusicNotFoundException('Not found music in the database');
        }
        return $music;
    }
    public function updateMusic($music)
    {
        $music->save();
    }
}
