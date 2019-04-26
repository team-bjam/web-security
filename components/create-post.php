<!-- <link rel="stylesheet" type="text/css" media="screen" href="css/components/createPost.css"> -->
<?php
    $data = file_get_contents('../data.txt');
    $data = json_decode($data);
    $user = $data->user;
?>

<div class="createPost">
    <div class="grid">
        <div></div>
        <div class="fw-semibold">Create post</div>
    </div>
    <div class="grid mt-2">
        <div class="userImg" style="background-image: url('<?php echo $user->profileImg ?>')"></div>
        <input type="text" placeholder="What's on your mind?">
    </div>
    <div class="d-flex align-items-center justify-content-end mt-2">
        <button class="btnMain mr-2">Cancel</button>
        <button class="btnMain">Post</button>
    </div>
</div>