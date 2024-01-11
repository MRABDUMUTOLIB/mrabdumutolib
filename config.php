<!-- index.php -->

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $level = $_POST['level'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Release variables from $_POST (optional)
    extract($_POST);

    // Open the file in read mode
    $file = fopen("accounts.php", "r");

    // Read the existing content
    $existingContent = fread($file, filesize("accounts.php"));

    // Close the file
    fclose($file);

    // Extract the contents of an existing array from a PHP file
    $matches = [];
    preg_match('/\$akkArray = \[(.*?)\];/s', $existingContent, $matches);

    $existingArrayContent = isset($matches[1]) ? $matches[1] : '';

    // Open the file in write mode (shrink the file)
    $file = fopen("accounts.php", "w");

    // Write the updated content back to the file
    fwrite($file, '<?php $akkArray = [' . $existingArrayContent . ' "Level=>\'' . $level . '\', Email=>\'' . $email . '\', Password=>\'' . $password . '\'" ,]; ?>');


    // Close the file
    fclose($file);
}

// Read the updated content to display
include("accounts.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MRABDUMUTOLIB</title>
    <link rel="stylesheet" href="/style/style.css">
    <link rel="shortcut icon" href="/sources/favicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="/style/style.css">

</head>
<body id="bod">
    <a href="index.php" class="home">Home</a>
    <div id="displayText">
    <p id="text">
    <?php
// Tasodifiy tartibda massivni generatsiya qilish
$randomElementKey = array_rand($akkArray);
$randomElement = $akkArray[$randomElementKey];

// Chiqarish
echo "$randomElementKey => $randomElement";
?>

    </p>
        <button id="copyButton" title="Copy">Copy</button>
    </div>
    <script>
    document.getElementById('copyButton').addEventListener('click', function () {
        // Tekstni tanlash
        var textToCopy = document.getElementById('text').innerText;

        // Clipboardga matnni joylash
        navigator.clipboard.writeText(textToCopy)
            .then(function () {
                alert('Matn nusxa olindi: ' + textToCopy);
            })
            .catch(function (err) {
                console.error('Clipboardga nusxalashda xatolik yuz berdi:', err);
            });
    });
</script>
</body>
</html>