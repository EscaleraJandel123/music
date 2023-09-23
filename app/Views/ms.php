<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Management</title>
</head>
<body>
    <h1>Music Management</h1>
    
    <!-- Music List -->
    <h2>Music List</h2>
    <ul>
        <?php foreach ($music as $song): ?>
            <li>
                <?= $song['title'] ?>
                <a href="<?= site_url('music/play/' . $song['id']) ?>">Play</a>
                <a href="<?= site_url('music/delete/' . $song['id']) ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
    
    <!-- Music Upload -->
    <h2>Upload Music</h2>
    <?= form_open_multipart('music/upload') ?>
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        <label for="music_file">Select Music:</label>
        <input type="file" name="music_file" accept=".mp3, .ogg" required>
        <button type="submit">Upload</button>
    <?= form_close() ?>

    <!-- Music Play -->
    <?php if (isset($music_to_play)): ?>
        <h2>Play Music</h2>
        <audio controls>
            <source src="<?= base_url('path_to_music_directory/' . $music_to_play['file_name']) ?>" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    <?php endif; ?>

    <!-- Music Delete -->
    <?php if (isset($music_to_delete)): ?>
        <h2>Delete Music</h2>
        <p>Are you sure you want to delete this music?</p>
        <p><strong>Title:</strong> <?= $music_to_delete['title'] ?></p>
        <a href="<?= site_url('music/delete_confirm/' . $music_to_delete['id']) ?>">Yes, Delete</a>
        <a href="<?= site_url('music') ?>">No, Cancel</a>
    <?php endif; ?>

</body>
</html>
