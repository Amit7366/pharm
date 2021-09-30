(function ($) {
	"use strict";

    jQuery(document).ready(function($){


    // header search =================
    
        //======== search modal js start here ========
        (function ($) {	

            $.fn.searchBox = function(ev) {
        
                var $searchEl = $('.search-elem');
                var $placeHolder = $('.placeholder');
                var $sField = $('#search-field');
        
                if ( ev === "open") {
                    $searchEl.addClass('search-open')
                };
        
                if ( ev === 'close') {
                    $searchEl.removeClass('search-open'),
                    $placeHolder.removeClass('move-up'),
                    $sField.val(''); 
                };
        
                var moveText = function() {
                    $placeHolder.addClass('move-up');
                }
        
                $sField.focus(moveText);
                $placeHolder.on('click', moveText);
                
                $('.submit').prop('disabled', true);
                $('#search-field').keyup(function() {
                    if($(this).val() != '') {
                       $('.submit').prop('disabled', false);
                    }
                });
            }	
        
        }(jQuery));
        
        $('.search-btn').on('click', function(e) {
            $(this).searchBox('open');
            e.preventDefault();
        });
        
        $('.search-close').on('click', function() {
            $(this).searchBox('close');
        });



       
     // sidebar area start =============
        $(".hamburger").click(function(){
            $(".wrapper").addClass("active");
        });

        $(".side-close, .bg_shadow").click(function(){
            $(".wrapper").removeClass("active");
        });


        $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(250);
            if (
                $(this)
                    .parent()
                    .hasClass("active")
            ) {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .parent()
                    .removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .next(".sidebar-submenu")
                    .slideDown(250);
                $(this)
                    .parent()
                    .addClass("active");
            }
        });






         // slider area js start here=================
         $('.product').owlCarousel({
            loop: true,
            center: false,
            items: 8,
            nav: true,
            margin:5,
            stagePadding: 0,
            autoplay: true,
            navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],

            responsive:{
                0:{
                    loop:true,
                    items:3,
                    nav:true,
                    autoplay: true,
                },
                600:{
                    loop: true,
                    items:3,
                    nav:false,
                    autoplay: true,
                },
                1000:{
                    loop: true,
                    items:8,
                    nav:true,
                    autoplay: true,
                }
            }
           
        });






        // home tab active bg start js==========

        // make the selected menu button active (give permanent color on the background tab not only on hover)
        
        $('.el-tab-menu .el-tab a').click( function(){
            if ( $(this).hasClass('active') ) {
                $(this).removeClass('active');
            } else {
                $('span a.active').removeClass('active');
                $(this).addClass('active');    
            }
        });
          



        



        // macros add option start
        $(".macros").click(function () {

           var mac_val = $(this).text();
           var dest_url = $("#dest_url").val();



            var $txt = $("#dest_url");
            var caretPos = $txt[0].selectionStart;


            $("#dest_url").val(dest_url.substring(0, caretPos) + mac_val+ dest_url.substring(caretPos));

        });
        // macros add option end
        // Revenue add option start
        $('#' + 'one').show();

        $('#rvnu_optn').change(function(){
            $('.rvnu_fld').hide();
            $('#' + $(this).val()).fadeIn(900);
        });
        // Revenue add option end

        // Payout add option start

        $('#' + 'one2').show();
        $('#rvnu_optn2').change(function(){
            $('.rvnu_fld2').hide();
            $('#' + $(this).val()).fadeIn(900);
        });

        // Payout add option end


        // multiselect js ==========
        $("#example").bsMultiSelect();

        $("#example1").bsMultiSelect();

        $("#example2").bsMultiSelect();

        $("#example3").bsMultiSelect();

       
        



        //======== images upload js start here =========
        
        $("#FileInput").on('change',function (e) {
            var labelVal = $(".title").text();
            var oldfileName = $(this).val();
                fileName = e.target.value.split( '\\' ).pop();

                if (oldfileName == fileName) {return false;}
                var extension = fileName.split('.').pop();

            if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
                $(".filelabel i").removeClass().addClass('fa fa-file-image-o');
                $(".filelabel i, .filelabel .title").css({'color':'#208440'});
                $(".filelabel").css({'border':' 2px solid #208440'});
            }
            else if(extension == 'pdf'){
                $(".filelabel i").removeClass().addClass('fa fa-file-pdf-o');
                $(".filelabel i, .filelabel .title").css({'color':'red'});
                $(".filelabel").css({'border':' 2px solid red'});

            }
  else if(extension == 'doc' || extension == 'docx'){
            $(".filelabel i").removeClass().addClass('fa fa-file-word-o');
            $(".filelabel i, .filelabel .title").css({'color':'#2388df'});
            $(".filelabel").css({'border':' 2px solid #2388df'});
        }
            else{
                $(".filelabel i").removeClass().addClass('fa fa-file-o');
                $(".filelabel i, .filelabel .title").css({'color':'black'});
                $(".filelabel").css({'border':' 2px solid black'});
            }

            if(fileName ){
                if (fileName.length > 10){
                    $(".filelabel .title").text(fileName.slice(0,4)+'...'+extension);
                }
                else{
                    $(".filelabel .title").text(fileName);
                }
            }
            else{
                $(".filelabel .title").text(labelVal);
            }
        });




        $('.owl-carousel').owlCarousel({
            stagePadding: 80,
            loop:true,
            dots:false,
            margin:20,
            nav:true,
            navText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
            navContainer: '.owl-container .custom-nav',
            navClass: ["owl-prev rounded-circle","owl-next rounded-circle"],
            items:1,
            autoWidth:false,
            center:true,
            URLhashListener:true,
            autoplayHoverPause:true,
            startPosition: 'URLHash',
            responsive:{
                0:{
                    items:1,
                    stagePadding:0
                },
                768:{
                    items:1,
                    stagePadding:0
                },
                992:{
                    items:2,
                    stagePadding:60
                },
                1200:{
                    items:1
                }
            }
    })

       



   


      

        









    });


    jQuery(window).load(function(){

        
    });


}(jQuery));





