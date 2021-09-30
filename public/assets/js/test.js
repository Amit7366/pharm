$(document).ready(function () {
    $('.en').hide();
    $(".flg_itm").click(function(){
        var text = $(this).find('.dfd').html();

        $('.flgs').html(text);
        // Set a cookie
        Cookies.set('name', $(this).attr('amit'));

         if (Cookies.get('name') == 'en'){
             //$('.heading').text('Customer');
             $('.en').show();
             $('.bn').hide();
        }
         if(Cookies.get('name') == 'bn'){
            //$('.heading').text('গ্রাহক পরিচিতি');
             $('.en').hide();
             $('.bn').show();
         }


    });

});


$(document).ready(function() {
    $('#example').DataTable();
});
  document.getElementById('UploadBtn').addEventListener('click', openDialog);

function openDialog() {
  document.getElementById('fileid').click();
}

