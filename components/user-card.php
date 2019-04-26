<!-- <link rel="stylesheet" type="text/css" media="screen" href="css/components/userCard.css"> -->

<?php
    $data = file_get_contents('../data.txt');
    $data = json_decode($data);
    $user = $data->user;
?>

<div class="userCardSmall">
    <div class="background" style="background-image: url('<?php echo $user->coverImg ?>')"></div>
    <div class="user">
        <div class="userImgWrapper">
            <div class="userImg" style="background-image: url('<?php echo $user->profileImg ?>')"></div>
        </div>
        <div class="userInfo">
            <h3><?php echo $user->name ?></h3>
            <p class="fw-light"><?php echo $user->department ?></p>
        </div>
    </div>
</div>


