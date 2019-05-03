/* ------------- */
/*      NAV      */
/* ------------- */

// show hide navigation dropdowns
$(document).on('click','.btnNav',function(e){
    if ($(this).siblings('.nav-dropdown').is(':visible')) {
        $('.nav-dropdown').fadeOut('fast')
    } else {
        $('.nav-dropdown').fadeOut('fast')
        $(this).siblings('.nav-dropdown').fadeIn('fast')
    }
    e.stopPropagation()
})

// hide nav dropdown when click outside
$(document).on('click', function (e) {
    if (!$(e.target).hasClass('nav-dropdown') && !$(e.target).parents().hasClass('nav-dropdown')) {
        $('.nav-dropdown').fadeOut('fast')
    }
});

/* -------------- */
/*      POST      */
/* -------------- */

// display buttons on focus
$(document).on('focus','#txtPost',function(){
    $('.createPost .buttons').fadeIn('fast')
})

// hide buttons on focus out
$(document).on('blur','#txtPost',function(){
    if (!$(this).val()) $('.createPost .buttons').fadeOut('fast')
})

// cancel post
$(document).on('click','#btnPostCancel',function(){
    $('#txtPost').val('')
    $('#txtPost').blur()
    $('.createPost .buttons').fadeOut('fast')
})

// share post and add to DOM
$(document).on('click','#btnPostShare',function(){
    console.log($(this).parents('.createPost').find('#txtPost').val())
    const post = $(this).parents('.createPost').find('#txtPost').val()
    const date = new Date()
    const hours = date.getHours() < 10 ? '0' + date.getHours().toString() : date.getHours().toString()
    const minutes = date.getMinutes() < 10 ? '0' + date.getMinutes().toString() : date.getMinutes().toString()

    let html = `
    <div class="singlePost">
        <div class="grid">
            <div class="userImg" style="background-image: url('../assets/baddie.png')"></div>
            <div>
                <div class="post-top">
                    <a href="friend-profile.php" class="fw-semibold">USER</a>
                    <div class="dot"></div>
                    <p class="fw-light tc-light">${hours + ':' + minutes}</p>
                </div>
                
                <p>${post}</p>
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
                   
                </div>
            </button>
        </div>
        <div class="commentContainer">
            <div class="commentWrapper">
                
            </div>
            <div class="grid commentInput">
                <div class="userImg" style="background-image: url('../assets/baddie.png')"></div>
                <input class="txtComment" type="text" placeholder="Comment on this post">
            </div>
            <div class="buttons">
                <div class="d-flex align-items-center justify-content-end mt-2">
                    <button type="button" class="btnMain btnCommentCancel mr-2">Cancel</button>
                    <button type="button" class="btnMain btnCommentShare">Post</button>
                </div>
            </div>
        
        </div>
    </div>`

    $('.postsContainer').prepend(html)
    $(this).parents('.createPost').find('#txtPost').val('')
    $('.createPost .buttons').fadeOut('fast')
})


/* ----------------- */
/*      COMMENT      */
/* ----------------- */

// show buttons on focus
$(document).on('focus','.txtComment',function(){
    $(this).parents('.commentContainer').children('.buttons').fadeIn('fast')
})

// hide buttons on focus out
$(document).on('blur','.txtComment',function(){
    if (!$(this).val()) $(this).parents('.commentContainer').children('.buttons').fadeOut('fast')
})

// cancel comment
$(document).on('click','.btnCommentCancel',function(){
    $(this).parents('.commentContainer').find('.txtComment').val('')
    $(this).parents('.commentContainer').find('.buttons').fadeOut('fast')
})

// post comment + display in DOM
$(document).on('click','.btnCommentShare',function(){
    const comment = $(this).parents('.commentContainer').find('.txtComment').val()
    const date = new Date()
    const hours = date.getHours() < 10 ? '0' + date.getHours().toString() : date.getHours().toString()
    const minutes = date.getMinutes() < 10 ? '0' + date.getMinutes().toString() : date.getMinutes().toString()

    let html = `
    <div class="grid comment">
        <div class="userImg" style="background-image: url('../assets/baddie.png')"></div>
        <div>
            <div class="">
                <p><a href="friend-profile.php" class="fw-semibold">USER</a> ${comment}</p>
                <p class="fw-light tc-light">${hours + ':' + minutes}</p>
            </div>
        </div>
    </div>`

    $(this).parents('.commentContainer').find('.commentWrapper').append(html)
    $(this).parents('.commentContainer').find('.txtComment').val('')
    $(this).parents('.commentContainer').find('.buttons').fadeOut('fast')

    const counter = $(this).parents('.singlePost').find('.commentsCount')
    const count = parseInt($(this).parents('.singlePost').find('.commentsCount').text()) > 0 ? parseInt($(this).parents('.singlePost').find('.commentsCount').text()) : 0
    counter.text(count + 1)
})

/* -------------- */
/*      LIKE      */
/* -------------- */

// change like button and change like count on click
$(document).on('click','.btnLike',function(){
    const counter = $(this).children('.likesCount')
    const count = parseInt($(this).children('.likesCount').text()) > 0 ? parseInt($(this).children('.likesCount').text()) : 0
    if($(this).hasClass('liked')) {
        $(this).removeClass('liked')
        count - 1 > 0 ? counter.text(count - 1) : counter.text('')
    } else {
        $(this).addClass('liked')
        counter.text(count + 1)
    }
})


/* --------------------------- */
/*      ELASTIC TEXTAREAS      */
/* --------------------------- */

function autoExpand(target) {
    if ($(target).val() !== '') {
        var height = target.scrollHeight
        target.style.height = height + 'px';    
    } else {
        target.style.height = 0 + 'px';    
    }

};

// FOR POST

$(document).on('keyup','#txtPost',function(e){
    e.target.style.height = 'inherit';
    autoExpand(e.target)
})

$(document).on('focus','#txtPost',function(e){
    e.target.style.height = 'inherit';
    autoExpand(e.target)
})

$(document).on('blur','#txtPost',function(e){
    e.target.style.height = 'inherit';
    autoExpand(e.target)
})

// FOR COMMENTS

$(document).on('keyup','.txtComment',function(e){
    autoExpand(e.target)
})

$(document).on('focus','.txtComment',function(e){
    autoExpand(e.target)
})

$(document).on('blur','.txtComment',function(e){
    autoExpand(e.target)
})
