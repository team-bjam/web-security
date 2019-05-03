<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/views/index.css">
</head>
<body>
    <?php include_once '../components/nav.php' ?>
    <div class="container main">
        <div class="row">
            <div class="col-sm-12 col-md-5 col-lg-4">

                <?php
                    $data = file_get_contents('../data.txt');
                    $data = json_decode($data);
                    $user = $data->user;
                ?>

                <div class="userCard">
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

                <div class="mt-3">

                    <div class="peopleCard">
                    <p class="tc-light mb-2">People you may know</p>

                    <div class="person mb-3">
                        <div class="personImg"></div>
                        <div class="personInfo">
                            <a href="views/not-profile.php" class="fw-semibold d-block">Donald Trump</a>
                            <button class="btnMain btnRedOutline">Add friend</button>
                        </div>
                    </div>

                    <div class="person mb-3">
                        <div class="personImg"></div>
                        <div class="personInfo">
                            <a href="views/not-profile.php" class="fw-semibold d-block">Pamela Anderson</a>
                            <button class="btnMain btnRedOutline">Add friend</button>
                        </div>
                    </div>

                    <div class="person mb-3">
                        <div class="personImg"></div>
                        <div class="personInfo">
                            <a href="views/not-profile.php" class="fw-semibold d-block">Mr. Bean</a>
                            <button class="btnMain btnRedOutline">Add friend</button>
                        </div>
                    </div>
                </div>

                </div>
            </div>
            <div class="col-sm-12 col-md-7 col-lg-8">

                <div class="createPost">
                    <div class="grid">
                        <div></div>
                        <div class="fw-semibold">Create post</div>
                    </div>
                    <div class="grid mt-2">
                        <div class="userImg" style="background-image: url('<?php echo $user->profileImg ?>')"></div>
                        <textarea id="txtPost" type="text" placeholder="What's on your mind?"></textarea>
                    </div>
                    <div class="buttons">
                        <div class="d-flex align-items-center justify-content-end mt-2">
                            <button type="button" id="btnPostCancel" class="btnMain btnBlue mr-2">Cancel</button>
                            <button type="button" id="btnPostShare" class="btnMain btnBlue">Share</button>
                        </div>
                    </div>
                </div>

                <br>

                <div class="postsContainer">
                <?php
                    $posts = $data->posts;
                    
                    function getPost($post, $user) {
                        echo '<div class="singlePost">
                            <div class="grid">
                                <div class="userImg" style="background-image: url('.$post->img.')"></div>
                                <div>
                                    <div class="post-top">
                                        <a href="profile.php" class="fw-semibold">'.$post->user.'</a>
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
                                    <g class="heartSvgOuter" stroke="none" stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linejoin="round">
                                        <g class="heartSvgInner" transform="translate(-965.000000, -487.000000)" fill="#FFFFFF" fill-rule="nonzero" stroke="#979797">
                                            <path d="M977.40559,507.686252 C991.786057,497.843126 989.277966,490.926744 986.253908,488.97259 C983.229849,487.018436 979.35229,487.905714 977.40559,492.576675 C975.443283,487.905714 970.779776,486.846757 968.05202,489.322003 C965.324265,491.79725 962.954076,497.843126 977.40559,507.686252 Z" id="Path-2"></path>
                                        </g>
                                    </g>
                                    </svg>
                                    <div class="likesCount">
                                        '.$post->likes.'
                                    </div>
                                </button>
                                <button class="btnPost btnComment">
                                    <svg width="24px" height="21px" viewBox="0 0 24 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs></defs>
                                    <g class="commentSvgOuter" stroke="none" stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linejoin="round">
                                        <g class="commentSvgInner" transform="translate(-995.000000, -487.000000)" fill="#FFFFFF" fill-rule="nonzero" stroke="#979797">
                                            <path d="M1007,503 C1013.07513,503 1018,499.642136 1018,495.5 C1018,491.357864 1013.07513,488 1007,488 C1000.92487,488 996,491.357864 996,495.5 C996,497.934077 997.700648,500.09733 1000.33599,501.46752 C1000.33599,502.662626 999.271801,504.855417 997.629138,506.553245 C1002.40571,505.799553 1004.08038,503.53862 1004.85574,502.857585 C1005.54928,502.951017 1006.26625,503 1007,503 Z" id="Oval"></path>
                                        </g>
                                    </g>
                                    </svg>
                                    <div class="commentsCount">
                                        '.$post->commentCount.'
                                    </div>
                                </button>
                            </div>
                            <div class="commentContainer">
                                <div class="commentWrapper">
                                    '.$post->commentsHtml.'
                                </div>
                                <div class="grid commentInput">
                                    <div class="userImg" style="background-image: url('.$user->profileImg.')"></div>
                                    <textarea class="txtComment" type="text" placeholder="Comment on this post"></textarea>
                                </div>
                                <div class="buttons">
                                    <div class="d-flex align-items-center justify-content-end mt-2">
                                        <button type="button" class="btnMain btnBlue btnCommentCancel mr-2">Cancel</button>
                                        <button type="button" class="btnMain btnBlue btnCommentShare">Post</button>
                                    </div>
                                </div>
                            
                            </div>
                        </div>';
                    }
                    
                    foreach ($posts as $key => $post) {
                        $post->commentCount = !empty($post->comments) ? count($post->comments) : '';
                        $comments = $post->comments;
                        $post->commentsHtml = '';

                        foreach ($post->comments as $key => $comment) {
                            $post->commentsHtml = $post->commentsHtml . '
                                <div class="grid comment">
                                    <div class="userImg" style="background-image: url('.$post->img.')"></div>
                                    <div>
                                        <div class="">
                                            
                                            <p><a href="profile.php" class="fw-semibold">'.$comment->user.'</a> '.$comment->comment.'</p>
                                            
                                            <p class="fw-light tc-light">'.$comment->time.'</p>
                                        </div>
                                        
                                    </div>
                                
                            </div>';
                        }
                        
                        getPost($post, $user);
                    }
                ?>
                </div>
            </div>
        </div>
    </div>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='main.js'></script>
</body>
</html>