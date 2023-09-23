<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Management</title>
</head>
<style>
    /* Apply basic styling to the page */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    h1 {
        color: #333;
    }

    h2 {
        margin-top: 20px;
        color: #555;
    }

    /* Style the music list */
    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    li a {
        text-decoration: none;
        color: #333;
        margin-left: 10px;
    }

    /* Style the upload form */
    form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    button[type="submit"] {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #555;
    }

    /* Style the play and delete sections */
    audio {
        width: 100%;
        margin-top: 20px;
    }

    .confirm {
        margin-top: 20px;
        padding: 10px;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
        border-radius: 5px;
    }

    /* Style the music player controls */
    .audio-controls {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    .audio-controls button {
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin: 0 10px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .audio-controls button:hover {
        background-color: #555;
    }
</style>
<!-- Music Upload -->
<script>
    // JavaScript function to set the title field based on the selected file
    function setFileNameAsTitle() {
        var fileInput = document.getElementById('music_file');
        var titleInput = document.getElementById('title');

        // Check if a file is selected
        if (fileInput.files.length > 0) {
            // Set the title input field to the file name (without extension)
            titleInput.value = fileInput.files[0].name.replace(/\.[^/.]+$/, "");
        }
    }
</script>

<body>
    <h1>Music Management</h1>

    <!-- Music List -->
    <?php if (isset($music)): ?>
        <h2>Music List</h2>
        <ul>
    <?php foreach ($music as $song): ?>
        <li>
            <?= $song['title'] ?>
            <a href="<?= site_url('music/play/' . $song['id']) ?>">Play</a>
            <a href="<?= site_url('music/delete/' . $song['id']) ?>">Delete</a>
            <span>Playlist: <?= $song['playlist'] ?></span>
        </li>
    <?php endforeach; ?>
</ul>

    <?php endif; ?>


    <!-- Music Upload -->
<h2>Upload Music</h2>
<form action="<?= site_url('music/upload') ?>" method="post" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" name="title" required>
    <label for="music_file">Select Music:</label>
    <input type="file" name="music_file" accept=".mp3, .ogg" required>
    
    <!-- Playlist Dropdown -->
    <label for="playlist">Select Playlist:</label>
    <select name="playlist" id="playlist">
        <option value="none">Select a Playlist</option>
        <option value="playlist1">Playlist 1</option>
        <option value="playlist2">Playlist 2</option>
        <!-- Add more options as needed -->
    </select>
    <button type="submit">Upload</button>
</form>



    <!-- Music Play -->
    <?php if (isset($music_to_play)): ?>
        <h2>Play Music</h2>
        <audio controls>
            <source src="<?= base_url('uploads/' . $music_to_play['file_name']) ?>" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    <?php endif; ?>

    <!-- Music Delete -->
    <?php if (isset($music_to_delete)): ?>
        <h2>Delete Music</h2>
        <p>Are you sure you want to delete this music?</p>
        <p><strong>Title:</strong>
            <?= $music_to_delete['title'] ?>
        </p>
        <a href="<?= site_url('music/delete_confirm/' . $music_to_delete['id']) ?>">Yes, Delete</a>
        <a href="<?= site_url('music') ?>">No, Cancel</a>
    <?php endif; ?>

</body>

</html>