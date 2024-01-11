<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MRABDUMUTOLIB</title>
    <link rel="shortcut icon" href="/sources/favicon.jpg" type="image/x-icon">
</head>
<body>
<a href="accounts.php" download>Download</a>
</body>
<?php 

if (!empty($_GET['file'])) {
    $filename = basename($_GET['file']);
    $filepath = $filename; // Fayl skriptning o'zida bo'lishi mumkin

    if (!empty($filename) && file_exists($filepath)) {
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: binary");

        readfile($filepath);
        exit;
    }
}



session_start();

// Sessionda "authenticated" bo'lsa vaqiatsiz qaytadan kirish bo'lmagan bo'lsa, qaytadan kirish sahifasiga qaytaymiz
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: index.php");
    exit();
}
?>
</html>