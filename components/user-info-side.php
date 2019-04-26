
<?php
    $data = file_get_contents('../data.txt');
    $data = json_decode($data);
    $user = $data->friends[0];
?>

<div class="userInfoSide">
    <!-- <div class="background" style="background-image: url('<?php //echo $user->coverImg ?>')"></div> -->
    <div class="user pr-3">
        <div class="userImgWrapper">
            <div class="userImg" style="background-image: url('<?php echo $user->profileImg ?>')"></div>
        </div>
        <div class="userInfo mt-4">
            <h3><?php echo $user->name ?></h3>
            <p class="fw-light mt-2"><?php echo $user->department ?></p>
            <p class="fw-light mt-2"><?php echo $user->joinDate ?></p>
        </div>
    </div>
</div>


