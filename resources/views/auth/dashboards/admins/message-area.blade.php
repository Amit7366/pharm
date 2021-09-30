<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dataTables.bootstrap5.min.js')}}" rel="stylesheet">
    <link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <title>Medix</title>
</head>
<body>
<div id="mySidenav" class="sidenav">

    <div class="chat-top">
        <audio id="audio" src="{{asset('assets/noti.mp3')}}" style="display: none"></audio>
        <h3>Pharmeex Support Team</h3>
        <p>We help your business grow by connecting you to your customers.</p>
    </div>
    <div class="user-massage-widget">
        @foreach($data as $data)
            @if($data->user_id == $data->from_id)

        <div class="chat-content-lft chrtdiv">
            <div class="chat-content-widget ">
                <p>{{$data->message}}</p>
            </div>
        </div>
            @elseif($data->user_id == $data->to_id)
                <div class="chat-content-rgt chrtdiv">
                    <div class="chat-profile-widget">
                        <img src="{{asset('assets/img/profile.jpg')}}">
                    </div>
                    <div class="chat-content-widget ">
                        <p>{{$data->message}}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="user-message-input w-100">
        <pre></pre>
        <input type="hidden" id="userid" value="{{$data->user_id}}">
        <textarea placeholder="Type Your Message Here....." id="my_msg"></textarea>
    </div>

</div>




<span class="side_btn" onclick="openNav()"><i class="fab fa-telegram-plane"></i></span>
<span class="side_btn2" onclick="closeNav()"><i class="fas fa-chevron-down"></i></span>


<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>

<!--Popper JS-->
<script src="{{asset('assets/js/popper.min.js')}}"></script>

<!--Bootstrap JS-->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script>
    function openNav() {

        $('#mySidenav').animate({height:561},200);
        $('.side_btn2').css('display','block');
        $('.side_btn').css('display','none');

        $(".user-massage-widget").stop().animate({ scrollTop: $(".user-massage-widget")[0].scrollHeight}, 1000);
    }

    function closeNav() {
        $('#mySidenav').css({height:0},200);
        $('.side_btn2').css('display','none');
        $('.side_btn').css('display','block');

    }

</script>
<script>
    $(document).ready(function() {
        $(".user-massage-widget").stop().animate({ scrollTop: $(".user-massage-widget")[0].scrollHeight}, 1000);



        setInterval(function() {

            var numItems = $('.chrtdiv').length;

            // var numItems = numItems -10;
            //
            for (var i =1; i<=numItems; i++) {
                $('.user-massage-widget').find('.chrtdiv').remove();
            }

            //console.log(numItems);
            get_message();
            var objDiv = document.getElementsByClassName("user-massage-widget");
            objDiv.scrollTop = objDiv.scrollHeight;
        }, 5000);



        $(document).on('keypress',function(e) {
            if(e.which == 13) {

                var msg = $("#my_msg").val();
                var userid = $("#userid").val();
                $("#my_msg").val('');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var url = "/admin/messages";
                $.ajax({
                    type:'post',
                    url:url,
                    data:{
                        messages:msg,
                        userid:userid,
                    },
                    dataType: 'json',
                    success:function(dataResult){
                        get_message();
                    }
                });

                $(".user-massage-widget").stop().animate({ scrollTop: $(".user-massage-widget")[0].scrollHeight}, 1000);



            }
        });

        function get_message(){
            //$(".user-massage-widget").empty();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var userid = $("#userid").val();
            var url = "/admin/get-messages";
            $.ajax({
                type:'get',
                url:url,
                data:{
                    userid:userid,
                },
                dataType: 'json',
                success:function(dataResult){
                    //console.log(dataResult);
                    var test = dataResult.data;

                    var bodyData = '';

                    $.each(test,function(index,row){

                        if(row.from_id == row.user_id){
                            $(".user-massage-widget").append('<div class="chat-content-rgt chrtdiv">\n' +
                                '\n' +
                                '                        <div class="chat-content-widget-rgt">\n' +
                                '                            <p>'+row.message +'</p>\n' +
                                '                        </div>\n' +
                                '\n' +
                                '\n' +
                                '                    </div>');

                        }else if (row.to_id == row.user_id){
                            $(".user-massage-widget").append('<div class="chat-content-lft chrtdiv">\n' +
                                '                        <div class="chat-profile-widget">\n' +
                                '                            <img src="../assets/img/profile.jpg">\n' +
                                '                        </div>\n' +
                                '                        <div class="chat-content-widget">\n' +
                                '                            <p>'+row.message+'</p>\n' +
                                '                        </div>\n' +
                                '                    </div>');

                        }
                    });
                    //$('.user-massage-widget').animate({scrollTop: $('.user-massage-widget').prop("scrollHeight")}, 100);
                    var dfdf = $('.user-massage-widget').prop("scrollHeight")

                    //console.log(dfdf);
                    $( ".user-massage-widget" ).scrollTop(dfdf);



                }
            });

        }
    } );
</script>
</body>
</html>
