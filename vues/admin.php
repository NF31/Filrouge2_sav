<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include('./gabarit.php'); ?>
    <h1 style="text-align: center;">Bonjour <?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?></h1>
</body>

</html>