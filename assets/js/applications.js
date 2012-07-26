$(document).ready(function () {
    /*
    var wallInstagram = $('section#wall').instagramPictures({
                                accessToken: '915887.f59def8.e035a237540e41788101771cabc2c2f9'
                        });
    $('#search').bind('webkitspeechchange', function (data) {
        var searchData = $(this).val();
        $('section#wall').html('');
        wallInstagram.search(searchData);
    });

    $('#search').keyup(function (data) {
        var searchData = $(this).val();
        clearTimeout($.data(this, 'timer'));
        var wait = setTimeout(function () {
            $('section#wall').html('');
            wallInstagram.search(searchData);
        }, 500);
    
        $(this).data('timer', wait);
    });
    */

    $('#backgroundColor').ColorPicker({
        onSubmit: function (hsb, hex, rgb, el) {
          $(el).val(hex);
          $(el).ColorPickerHide();
        },
        onBeforeShow: function () {
          $(this).ColorPickerSetColor(this.value);
        }
    }).bind('keyup', function(){
        $(this).ColorPickerSetColor(this.value);
    });

    $("#btnPreviewWidget").click(function(e){
        alert(e);
        return false;
    });

    $("a[rel=fancybox_group]").fancybox({
            'transitionIn'      : 'elastic',
            'transitionOut'     : 'elastic',
            'titlePosition'     : 'over',
            'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
                return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
            }
    });
});