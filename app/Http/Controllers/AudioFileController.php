<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AudioFile;
use Illuminate\Support\Facades\Storage;

class AudioFileController extends Controller
{
    public function index()
    {
        $audioFiles = AudioFile::all();
        return view('Audio.index', compact('audioFiles'));
    }

    public function create()
    {
        return view('Audio.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'language' => 'required',
        ]);

        $audioFile = new AudioFile();
        $audioFile->title = $request->title;
        $audioFile->language = $request->language;
        if ($request->file('audio')) {
            $file = $request->file('audio');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('mp3s', $fileName);
            $audioFile->filepath = $fileName;
        }
        $audioFile->save();
        return redirect()->route('index')->with('message', "Data Inserted Success fully");
    }


    public function show($id)
    {

        $audioFile = AudioFile::findOrFail($id);
        return view('Audio.view', compact('audioFile'));
    }
    public function edit($id)
    {
        $audioFile = AudioFile::findOrFail($id);
        return view('Audio.edit', compact('audioFile'));
    }

    public function update(Request $request, $id)
    {
        $audioFile = AudioFile::findOrFail($id);
        $request->validate([
            'title' => 'required|string',
            'language' => 'required|string',
        ]);

        if ($request->file('audio')) {
            unlink(storage_path('app/mp3s/' . $audioFile->filepath));
            $file = $request->file('audio');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('mp3s', $fileName);
            $audioFile->filepath = $fileName;
        }
        $audioFile->title = $request->title;
        $audioFile->language = $request->language;
        $audioFile->save();
        return redirect()->route('index')->with('message', "Data updated Success fully");
    }

    public function destroy($id)
    {
        $audioFile = AudioFile::findOrFail($id);
        unlink(storage_path('app/mp3s/' . $audioFile->filepath));
        $audioFile->delete();
        return redirect()->route('index')->with('message', "Data Deleted Success fully");
    }
}
