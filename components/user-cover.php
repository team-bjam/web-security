<?php
    $data = file_get_contents('../data.txt');
    $data = json_decode($data);
    $cover = $data->friends[0]->coverImg;
?>

<div class="userCover">
    <div class="background" style="background-image: url('<?php echo $cover ?>')"></div>
</div>


