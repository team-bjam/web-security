<!-- <link rel="stylesheet" type="text/css" media="screen" href="css/components/nav.css"> -->

<div class="nav-container">
    <div class="container">
        <div class="nav">
            <a href="index.php" class="btnHome d-block">
                <img src="../assets/logo-small-white.png" alt="">
            </a>
            <input type="text" placeholder="Search Keabook">
            <div class="link-container">
                <a href="index.php"><button id="btnHome" class="btnNav"><div class="btnNavInner" style="background-image: url('../assets/icon-home.png')" alt=""></div></button></a>
                <!-- <div class="nav-dropdown">
                    <h1>drop it</h1>
                </div> -->
            </div>
            <div class="link-container">
                <button id="btnMessages" class="btnNav"><div class="btnNavInner" style="background-image: url('../assets/icon-messages.png')" alt=""></div></button>
                <div class="nav-dropdown">
                    <h1>drop it</h1>
                </div>
            </div>
            <div class="link-container">
                <div class="nav-alert">10</div>
                <button id="btnNotifications" class="btnNav"><div class="btnNavInner" style="background-image: url('../assets/icon-notifications.png')" alt=""></div></button>
                <div class="nav-dropdown">
                    <h1>drop it</h1>
                </div>
            </div>
            <div class="link-container">
                <button id="btnFriendRequests" class="btnNav"><div class="btnNavInner" style="background-image: url('../assets/icon-friendRequests.png')" alt=""></div></button>
                <div class="nav-dropdown">
                    <h1>drop it</h1>
                </div>
            </div>
            <div class="link-container">
                <button id="btnArrow" class="btnNav"><div class="btnNavInner" style="background-image: url('../assets/icon-arrowDown.png')" alt=""></div></button>
                <div id="btnArrowDropdown" class="nav-dropdown">
                    <a href="profile-settings.php">Settings</a>
                    <a href="#">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php //include_once 'nav-dropdown.php' ?>
</div>
