<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/styles.css">
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <?php include_once '../components/nav.php' ?>
    <div class="container main">
        <div class="row">
            <div class="col-sm-12 col-md-5 col-lg-4">
                <?php include_once '../components/user-card.php' ?>
                <div class="mt-3">
                    <?php include_once '../components/people-card.php' ?>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-8">
                <?php include_once '../components/create-post.php' ?>
                <br>
                <?php include_once '../components/single-post.php' ?>
                

            </div>
        </div>
    </div>
</body>
</html>