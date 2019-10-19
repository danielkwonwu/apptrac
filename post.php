<?php
session_start();
if(!isset($_SESSION["user_id"]) || !isset($_SESSION["token"])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>[AppTrac] Sign in</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="page-wrapper">
        <div class="header">
            <a class="logo" href="index.php"><h1 class="title">AppTrac</h1></a>
            <div class="user-container">
                <?php if (isset($_SESSION['user_id'])): ?>
                <p class="welcome body">Welcome, <?=htmlspecialchars($_SESSION['user_id'])?></p>
                <form action="logout.php" method="POST">
                    <input class="user-button" type="submit" value="LOGOUT">
                </form>
                <?php else: ?>
                <p class="welcome body">Welcome, guest</p>
                <a class="user-button" href="login.php">LOGIN</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="content">
            <form id="apps" class="form-container" action="savepost.php" method="POST">
                <div class="grid">
                    <label class="input-label" for="company_name">Company Name:</label>
                    <input class="text-input" type="text" name="company_name" id="company_name" />
                    <label class="input-label" for="contact">Contact Information:</label>
                    <input class="text-input" type="text" name="contact" id="contact" />
                    <label class="input-label" for="notes">Notes:</label>
                    <textarea form="apps" rows="20" name="notes" id="notes"></textarea>
                </div>
                <input class="button" type="submit" value="POST" />
                <a class="button" href="index.php">BACK</a>
                <input type="hidden" name="token" value="<?=htmlspecialchars($_SESSION['token'])?>" />
                <?php if (!empty($_GET['error'])): ?>
                <div class="error">
                    <?=htmlspecialchars($_GET['error']);?>
                </div>
                <?php endif;?>
            </form>
        </div>
    </div>
</body>
</html>