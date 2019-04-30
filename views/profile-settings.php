<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/views/profile-settings.css">
</head>
<body>
    <?php include_once '../components/nav.php' ?>
    <div class="container main">
        <div class="row">
            <div class="col-12">
                <?php
                    $data = file_get_contents('../data.txt');
                    $data = json_decode($data);
                    $user = $data->user;
                ?>

                <div class="userCover">
                    <div class="background" style="background-image: url('<?php echo $user->coverImg ?>')"></div>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="profile-settings-side">
                    <div class="user pr-3">
                        <div class="userImgWrapper">
                            <div class="userImg" style="background-image: url('<?php echo $user->profileImg ?>')"></div>
                        </div>
                        <div class="mt-4">
                            <form action="">
                                <p class="mb-1">Change profile photo</p>
                                <input class="btnUpload" id="btnUploadProfile" type="file" name="profileImg" accept="image/*">
                                <label for="btnUploadProfile">Select</label>
                            </form>
                        </div>
                        <div class="mt-4">
                            <form action="">
                                <p class="mb-1">Change cover photo</p>
                                <input class="btnUpload" id="btnUploadCover" type="file" name="coverImg" accept="image/*">
                                <label for="btnUploadCover">Select</label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-9 mt-3 side-border">
                <div class="profile-settings">
                    <h2>Profile Settings</h2>
                    <form>
                        <div class="profile-settings-row">
                            <label for="" class="d-block mb-1">Name</label>
                            <input class="col-12 col-md-6" type="text" placeholder="Name" value="<?php echo $user->name ?>">
                        </div>
                        <div class="profile-settings-row">
                            <label for="" class="d-block mb-1">Department</label>
                            <select  class="col-12 col-md-6" name="" id="">
                                <option disabled>Select</option>
                                <option value="" <?php echo $user->department == 'Computer Science' ? 'selected' : '' ?>>Computer Science</option>
                                <option value="" <?php echo $user->department == 'Software Development' ? 'selected' : '' ?>>Software Development</option>
                                <option value="" <?php echo $user->department == 'Web Development' ? 'selected' : '' ?>>Web Development</option>
                            </select>
                        </div>
                        <div class="profile-settings-row">
                            <label for="" class="d-block mb-1">Location</label>
                            <input class="col-12 col-md-6"  type="text" placeholder="Location" value="<?php echo $user->location ?>">
                        </div>
                        <div class="profile-settings-row">
                            <label for="" class="d-block mb-1">Website</label>
                            <input class="col-12 col-md-6"  type="text" placeholder="Website" value="<?php echo $user->website ?>">
                        </div>
                        <div class="profile-settings-row">
                            <label for="" class="d-block mb-1">Phone</label>
                            <input class="col-12 col-md-6"  type="text" placeholder="Phone" value="<?php echo $user->phone ?>">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btnLarge btnRed mt-3">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='main.js'></script>
</body>
</html>