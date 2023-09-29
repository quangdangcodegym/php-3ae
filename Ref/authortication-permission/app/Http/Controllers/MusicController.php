<?php

namespace App\Http\Controllers;

use App\Exceptions\MusicNotFoundException;
use App\Http\Requests\ValidationMusic;
use App\Http\Services\MusicService;
use App\Models\Author;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MusicController extends Controller
{
    private MusicService $musicService;
    public function __construct(MusicService $musicService)
    {
        $this->musicService = $musicService;
    }
    public function index()
    {
        $musics = $this->musicService->getAll();
        $authors = Author::all();

        return view('musics.index', compact('musics'));
    }
    public function create()
    {
        $authors = Author::all();
        return view('musics.create', compact('authors'));
    }
    public function save(ValidationMusic $validateMusicRequest)
    {
        $music = new Music();
        $music->name = $validateMusicRequest->name;
        $music->description = $validateMusicRequest->description;
        $music->author_id = $validateMusicRequest->author_id;


        // $music->user_created_id = $validateMusicRequest->user()->id;
        // $music->user_updated_id = $validateMusicRequest->user()->id;


        $this->musicService->updateMusic($music);
        return redirect()->route('musics.index')->with("msg", "Add music success")->with('msgAction', 'success');
    }

    public function edit($id = 0, Request $request)
    {

        $authors = Author::all();
        $music = null;
        if (!empty($id)) {
            $music = $this->musicService->findMusicById($id);
            if ($music == null) {
                return redirect()->route('musics.index')->with("msg", "Music not found")->with('msgAction', 'error');
            } else {
                // dd($request->user()->can('update', $music));
                if ($request->user() != null && $request->user()->can('update', $music)) {
                    // Người dùng có quyền cập nhật bản ghi Music này.
                    return view('musics.edit', compact('music', 'authors'));
                } else {
                    // Người dùng không có quyền cập nhật bản ghi Music này.
                    return redirect()->route('musics.index')->with("msg", "User not access this music article")->with('msgAction', 'error');
                }
            }
        } else {
            return redirect()->route('musics.index')->with("msg", "Id Music not valid")->with('msgAction', 'error');
        }
    }
    public function update(ValidationMusic $request, $id)
    {
        $music = null;
        if (!empty($id)) {
            $music = $this->musicService->findMusicById($id);
            if ($music == null) {
                return redirect()->route('musics.index')->with("msg", "Music not found")->with('msgAction', 'error');
            } else {
                $music->name = $request->name;
                $music->description = $request->description;
                $music->author_id = $request->author_id;

                $this->musicService->updateMusic($music);
                return redirect()->route('musics.index')->with("msg", "Edit Music success")->with('msgAction', 'success');
            }
        } else {
            return redirect()->route('musics.index')->with("msg", "Id Music not valid")->with('msgAction', 'error');
        }
    }

    public function destroy($id)
    {
        $music = $this->musicService->findMusicById($id);
        if (Gate::allows('edit-music', $music)) {
            $music->delete();
            abort(200);
        } else {
            abort(404);
        }
    }
}
