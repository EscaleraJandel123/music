<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Management</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Music Management</h1>

        <!-- Music List -->
        <div class="mb-4">
            <h2 class="text-center">Music List</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Playlist</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($music) && count($music) > 0): ?>
                        <?php foreach ($music as $song): ?>
                            <tr>
                                <td>
                                    <?= $song['title'] ?>
                                </td>
                                <td>
                                    <?= $song['playlist'] ?>
                                </td>
                                <td>
                                    <a href="<?= site_url('music/play/' . $song['id']) ?>"
                                        class="btn btn-primary btn-sm">Play</a>
                                    <a href="<?= site_url('music/delete/' . $song['id']) ?>"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">No music available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Music Upload -->
        <div class="mb-4">
            <h2 class="text-center">Upload Music</h2>
            <form action="<?= site_url('music/upload') ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="music_file" class="form-label">Select Music:</label>
                    <input type="file" name="music_file" class="form-control" accept=".mp3, .ogg" required>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="playlist" class="form-label">Select Playlist:</label>
                        <select name="playlist" class="form-select">
                            <option value="none">Select a Playlist</option>
                            <?php if (isset($playlist)): ?>
                                <?php foreach ($playlist as $pl): ?>
                                    <option value="<?= $pl['playlist_name'] ?>">
                                        <?= $pl['playlist_name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Upload</button>
            </form>
        </div>

        <!-- Music Play -->
        <?php if (isset($music_to_play)): ?>
            <div class="mb-4">
                <h2>Play Music</h2>
                <audio controls>
                    <source src="<?= base_url('uploads/' . $music_to_play['file_name']) ?>" type="audio/mpeg">
                    <!-- Specify the correct MIME type for the audio file -->
                    Your browser does not support the audio element.
                </audio>
            </div>
            <a href="javascript:history.back()" class="btn btn-primary">Go Back</a>
        <?php endif; ?>

        <!-- Music Delete -->
        <?php if (isset($music_to_delete)): ?>
            <div class="mb-4">
                <h2>Delete Music</h2>
                <p>Are you sure you want to delete this music?</p>
                <p><strong>Title:</strong>
                    <?= $music_to_delete['title'] ?>
                </p>
                <a href="<?= site_url('music/delete_confirm/' . $music_to_delete['id']) ?>" class="btn btn-danger">Yes,
                    Delete</a>
                <a href="<?= site_url('music') ?>" class="btn btn-secondary">No, Cancel</a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>