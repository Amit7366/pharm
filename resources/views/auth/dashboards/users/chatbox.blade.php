<div id="mySidenav" class="sidenav">

    <div class="chat-top">
        <audio id="audio" src="{{asset('assets/noti.mp3')}}" style="display: none"></audio>
        <h3>Pharmeex Support Team</h3>
        <p>We help your business grow by connecting you to your customers.</p>
    </div>
    <div class="user-massage-widget">

        <div class="chat-content-lft">
            <div class="chat-profile-widget">
                <img src="{{asset('assets/img/profile.jpg')}}">
            </div>
            <div class="chat-content-widget">
                <p>We help your business grow by connecting you to your customers. We help your business grow by connecting you to your customers.</p>
            </div>
        </div>


    </div>
    <div class="user-message-input w-100">
        <pre></pre>
        <textarea placeholder="Type Your Message Here....." id="my_msg"></textarea>
        <i class="fas fa-share" id="send_btn"></i>
    </div>

</div>




<span class="side_btn" onclick="openNav()"><i class="fab fa-telegram-plane"></i></span>
<span class="side_btn2" onclick="closeNav()"><i class="fas fa-chevron-down"></i></span>
