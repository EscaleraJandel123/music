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
    <!-- Music Upload -->
    <div class="mb-4">
        <h2 class="text-center">Upload Music</h2>
        <form action="<?= site_url('music/upload') ?>" method="post" enctype="multipart/form-data">
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
        <br>
        <a class="btn btn-primary" href="/music">Go Back</a>
    </div>
    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>