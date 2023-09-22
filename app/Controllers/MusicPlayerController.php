<?php

namespace App\Controllers;

use App\Models\MusicModel;
use App\Models\PlaylistModel;
use CodeIgniter\Controller;

class MusicPlayerController extends Controller
{
    public function index()
    {
        // Load music playlist data and pass it to the view
        $musicModel = new MusicModel();
        $playlistModel = new PlaylistModel();
        
        $data = [
            'musicPlaylist' => $musicModel->findAll(),
            'playlists' => $playlistModel->findAll(),
        ];

        return view('music_player', $data);
    }

    public function addToPlaylist()
    {
        // Handle adding music to a playlist
        $musicId = $this->request->getPost('music_id');
        $playlistId = $this->request->getPost('playlist_id');

        // Add the music to the selected playlist (implement this logic)

        // Redirect back to the music player page
        return redirect()->to('/');
    }

    // Implement more methods for other functionality like creating playlists, removing music, etc.
}
