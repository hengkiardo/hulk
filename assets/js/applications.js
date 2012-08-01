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

    $('#username').change(function () {
        $('#hashtag').val('');
    });

    $('#hashtag').change(function () {
        $('#username').val('');
    });
    $("#is_slideshow").change(function (){
        var cekValue = $(this).val();
        console.log(cekValue);
        if(cekValue == 'yes'){
            $("#blockLayout").fadeOut("fast");
        }else{
            $("#blockLayout").fadeIn("fast");
        }
    })

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
        //console.log(e);
        var postDataObj = $("#formCreateWidget").serializeObject();
        console.log(postDataObj);
        return false;
    });

    function generateSnippit() {
    var snippit, $username = $('#username'),
      $hashtag = $('#hashtag'),
      $thumbnailSize = $('#thumbnail_size'),
      $layoutX = $('#layoutX'),
      $layoutY = $('#layoutY'),
      $backgroundColor = $('#backgroundColor'),
      $photoPadding = $('#photo_padding'),
      $photoBorder = $('#photo_border'),
      $slideShow = $('#is_slideshow'),
      id = '',
      error = false,
      width = 0,
      height = 0;
    // Check for any errors
    $('#settings').find('.validate').each(function () {
      $(this).parent().parent().parent().removeClass('error');
      if ($(this).val() == '') {
        $(this).parent().parent().parent().addClass('error');
        error = true;
      }
    });
    if (!error) {
      if ($username.val() != '') {
        snippit = '&lt;iframe src="http://snapwidget.com/' + ($slideShow.val().toLowerCase() == 'yes' ? 'sl' : 'in') + '/?u=';
        id = $username.val().toLowerCase();
      } else {
        snippit = '&lt;iframe src="http://snapwidget.com/' + ($slideShow.val().toLowerCase() == 'yes' ? 'sl' : 'in') + '/?h=';
        id = $hashtag.val().toLowerCase();
      }
      snippit += Base64.encode(id + '|in|' + $thumbnailSize.val() + '|' + $layoutX.val() + '|' + $layoutY.val() + '|' + $backgroundColor.val() + '|' + $photoBorder.val() + '|' + $photoPadding.val());
      width = parseInt($layoutX.val()) * (parseInt($thumbnailSize.val()) + parseInt($photoPadding.val()) + ($photoBorder.val() == 'yes' ? 10 : 0));
      height = parseInt($layoutY.val()) * (parseInt($thumbnailSize.val()) + parseInt($photoPadding.val()) + ($photoBorder.val() == 'yes' ? 10 : 0));
      if ($slideShow.val().toLowerCase() == 'yes') {
        width = width / parseInt($layoutX.val());
        height = height / parseInt($layoutY.val());
      }
      snippit += '" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:' + width + 'px; height: ' + height + 'px" &gt;&lt;/iframe&gt;';
      return snippit;
    }
    return '';
  }

  // Base64 Encoding of Options
  var Base64 = {
    // private property
    _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
    // public method for encoding
    encode: function (input) {
      var output = "";
      var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
      var i = 0;
      input = Base64._utf8_encode(input);
      while (i < input.length) {
        chr1 = input.charCodeAt(i++);
        chr2 = input.charCodeAt(i++);
        chr3 = input.charCodeAt(i++);
        enc1 = chr1 >> 2;
        enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
        enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
        enc4 = chr3 & 63;
        if (isNaN(chr2)) {
          enc3 = enc4 = 64;
        } else if (isNaN(chr3)) {
          enc4 = 64;
        }
        output = output + this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) + this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);
      }
      return output;
    },
    // private method for UTF-8 encoding
    _utf8_encode: function (string) {
      string = string.replace(/\r\n/g, "\n");
      var utftext = "";
      for (var n = 0; n < string.length; n++) {
        var c = string.charCodeAt(n);
        if (c < 128) {
          utftext += String.fromCharCode(c);
        } else if ((c > 127) && (c < 2048)) {
          utftext += String.fromCharCode((c >> 6) | 192);
          utftext += String.fromCharCode((c & 63) | 128);
        } else {
          utftext += String.fromCharCode((c >> 12) | 224);
          utftext += String.fromCharCode(((c >> 6) & 63) | 128);
          utftext += String.fromCharCode((c & 63) | 128);
        }
      }
      return utftext;
    }
  }

    $("a[rel=fancybox_group]").fancybox({
            'transitionIn'      : 'elastic',
            'transitionOut'     : 'elastic',
            'titlePosition'     : 'over',
            'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
                return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
            }
    });
});

$.fn.serializeObject = function()
{
   var o = {};
   var a = this.serializeArray();
   $.each(a, function() {
       if (o[this.name]) {
           if (!o[this.name].push) {
               o[this.name] = [o[this.name]];
           }
           o[this.name].push(this.value || '');
       } else {
           o[this.name] = this.value || '';
       }
   });
   return o;
};