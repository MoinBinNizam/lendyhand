<?php
require ('top.inc.php');

?>
    <body>

<div class="main-container">

    <!-- HEADER -->
    <header class="block">
        <ul class="header-menu horizontal-list">
            <li>
                <a class="header-menu-tab" href="#1"><span class="icon entypo-cog scnd-font-color"></span>Settings</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#2"><span class="icon fontawesome-user scnd-font-color"></span>Account</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#3"><span class="icon fontawesome-envelope scnd-font-color"></span>Messages</a>
                <a class="header-menu-number" href="#4">5</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#5"><span class="icon fontawesome-star-empty scnd-font-color"></span>Favorites</a>
            </li>
        </ul>
        <div class="profile-menu">
            <p>Me <a href="#26"><span class="entypo-down-open scnd-font-color"></span></a></p>
            <div class="profile-picture small-profile-picture">
                <img width="40px" alt="Anne Hathaway picture" src="http://upload.wikimedia.org/wikipedia/commons/e/e1/Anne_Hathaway_Face.jpg">
            </div>
        </div>
    </header>

    <!-- LEFT-CONTAINER -->
    <div class="left-container container">
        <div class="menu-box block"> <!-- MENU BOX (LEFT-CONTAINER) -->
            <h2 class="titular">MENU BOX</h2>
            <ul class="menu-box-menu">
                <li>
                    <a class="menu-box-tab" href="#6"><span class="icon fontawesome-envelope scnd-font-color"></span>Messages<div class="menu-box-number">24</div></a>                            
                </li>
                <li>
                    <a class="menu-box-tab" href="#8"><span class="icon entypo-paper-plane scnd-font-color"></span>Invites<div class="menu-box-number">3</div></a>                            
                </li>
                <li>
                    <a class="menu-box-tab" href="#10"><span class="icon entypo-calendar scnd-font-color"></span>Events<div class="menu-box-number">5</div></a>                            
                </li>
                <li>
                    <a class="menu-box-tab" href="#12"><span class="icon entypo-cog scnd-font-color"></span>Account Settings</a>
                </li>
                <li>
                    <a class="menu-box-tab" href="#13"><sapn class="icon entypo-chart-line scnd-font-color"></sapn>Statistics</a>
                </li>                        
            </ul>
        </div>
       
        
        
        <ul class="social horizontal-list block"> <!-- SOCIAL (LEFT-CONTAINER) -->
            <li class="facebook"><p class="icon"><span class="zocial-facebook"></span></p><p class="number">248k</p></li>
            <li class="twitter"><p class="icon"><span class="zocial-twitter"></span></p><p class="number">30k</p></li>
            <li class="googleplus"><p class="icon"><span class="zocial-googleplus"></span></p><p class="number">124k</p></li>
            <li class="mailbox"><p class="icon"><span class="fontawesome-envelope"></span></p><p class="number">89k</p></li>
        </ul>
    </div>

    <!-- MIDDLE-CONTAINER -->
    <div class="middle-container container">
        <div class="profile block"> <!-- PROFILE (MIDDLE-CONTAINER) -->
            <a class="add-button" href="#28"><span class="icon entypo-plus scnd-font-color"></span></a>
            <div class="profile-picture big-profile-picture clear">
                <img width="150px" alt="Anne Hathaway picture" src="http://upload.wikimedia.org/wikipedia/commons/e/e1/Anne_Hathaway_Face.jpg" >
            </div>
            <h1 class="user-name">Anne Hathaway</h1>
            <div class="profile-description">
                <p class="scnd-font-color">Lorem ipsum dolor sit amet consectetuer adipiscing</p>
            </div>
            <ul class="profile-options horizontal-list">
                <li><a class="comments" href="#40"><p><span class="icon fontawesome-comment-alt scnd-font-color"></span>23</li></p></a>
                <li><a class="views" href="#41"><p><span class="icon fontawesome-eye-open scnd-font-color"></span>841</li></p></a>
                <li><a class="likes" href="#42"><p><span class="icon fontawesome-heart-empty scnd-font-color"></span>49</li></p></a>
            </ul>
        </div>
        <ul class="social block"> <!-- SOCIAL (MIDDLE-CONTAINER) -->
            <li><a href="#50"><div class="facebook icon"><span class="zocial-facebook"></span></div><h2 class="facebook titular">SHARE TO FACEBOOK</h2></li></a>
            <li><a href="#51"><div class="twitter icon"><span class="zocial-twitter"></span></div><h2 class="twitter titular">SHARE TO TWITTER</h2></li></a>
            <li><a href="#52"><div class="googleplus icon"><span class="zocial-googleplus"></span></div><h2 class="googleplus titular">SHARE TO GOOGLE+</h2></li></a>
        </ul>
    </div>

    <!-- RIGHT-CONTAINER -->
    <div class="right-container container">
    <div class="line-chart-block block clear"> <!-- LINE CHART BLOCK (LEFT-CONTAINER) -->
            <div class="line-chart">
              <!-- LINE-CHART by @kseso https://codepen.io/Kseso/pen/phiyL -->
                <div class='grafico'>
                   <ul class='eje-y'>
                     <li data-ejeY='30'></li>
                     <li data-ejeY='20'></li>
                     <li data-ejeY='10'></li>
                     <li data-ejeY='0'></li>
                   </ul>
                   <ul class='eje-x'>
                     <li>Apr</li>
                     <li>May</li>
                     <li>Jun</li>
                   </ul>
                     <span data-valor='25'>
                       <span data-valor='8'>
                         <span data-valor='13'>
                           <span data-valor='5'>   
                             <span data-valor='23'>   
                             <span data-valor='12'>
                                 <span data-valor='15'>
                                 </span></span></span></span></span></span></span>
                </div>
                <!-- END LINE-CHART by @kseso https://codepen.io/Kseso/pen/phiyL -->
            </div>
            
        </div>
        
    </div> <!-- end right-container -->
</div> <!-- end main-container -->
</body>

<?php
require ('footer.inc.php');

?>