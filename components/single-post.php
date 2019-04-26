<!-- <link rel="stylesheet" type="text/css" media="screen" href="css/components/singlePost.css"> -->

<?php
    $data = file_get_contents('../data.txt');
    $data = json_decode($data);
    $posts = $data->posts;

    foreach ($posts as $key => $post) {
        echo '<div class="singlePost">
            <div class="grid">
                <div class="userImg" style="background-image: url('.$post->img.')"></div>
                <div>
                    <div class="post-top">
                        <a href="friend-profile.php" class="fw-semibold">'.$post->user.'</a>
                        <div class="dot"></div>
                        <p class="fw-light tc-light">'.$post->time.'</p>
                    </div>
                    
                    <p>'.$post->post.'</p>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-end mt-2">
                <button class="btnPost btnLike">
                    <svg width="25px" height="22px" viewBox="0 0 25 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linejoin="round">
                        <g id="feed" transform="translate(-965.000000, -487.000000)" fill="#FFFFFF" fill-rule="nonzero" stroke="#979797">
                            <path d="M977.40559,507.686252 C991.786057,497.843126 989.277966,490.926744 986.253908,488.97259 C983.229849,487.018436 979.35229,487.905714 977.40559,492.576675 C975.443283,487.905714 970.779776,486.846757 968.05202,489.322003 C965.324265,491.79725 962.954076,497.843126 977.40559,507.686252 Z" id="Path-2"></path>
                        </g>
                    </g>
                    </svg>
                </button>
                <button class="btnPost btnComment">
                    <svg width="24px" height="21px" viewBox="0 0 24 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linejoin="round">
                        <g id="feed" transform="translate(-995.000000, -487.000000)" fill="#FFFFFF" fill-rule="nonzero" stroke="#979797">
                            <path d="M1007,503 C1013.07513,503 1018,499.642136 1018,495.5 C1018,491.357864 1013.07513,488 1007,488 C1000.92487,488 996,491.357864 996,495.5 C996,497.934077 997.700648,500.09733 1000.33599,501.46752 C1000.33599,502.662626 999.271801,504.855417 997.629138,506.553245 C1002.40571,505.799553 1004.08038,503.53862 1004.85574,502.857585 C1005.54928,502.951017 1006.26625,503 1007,503 Z" id="Oval"></path>
                        </g>
                    </g>
                    </svg>
                </button>
            </div>
        </div>';
        }
?>



<!-- 
<div class="singlePost">
    <div class="grid">
        <div class="userImg" style="background-image: url('<?php //echo $user->profileImg ?>')"></div>
        <div>
            <div class="post-top">
                <p class="fw-semibold">User Name</p>
                <div class="dot"></div>
                <p class="fw-light tc-light">March 17 at 10:28</p>
            </div>
            
            <p>Post message tamari soy sauce. Läkerol salmiak choco chili. Teapigs up beat. No added sugar crunchy musli.</p>
        </div>
    </div>
</div> -->