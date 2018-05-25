<?php

/** View for photos tab */
$photoCount = 1;
$photoList  = "";

$photoList .= '<ul class="slides">';
$totalPhotos = count($arrPhotos);

if (!empty($arrPhotos)) {   

  foreach ($arrPhotos as $photo) {

    $photoInd       = $photo['id'];
    $photoFullPath  = $photo['fullPath'];
    $photoThumbPath = $photo['thumbPath'];
    $captionHeading = $photo['captionHeading'];
    $caption        = $photo['caption'];
    $videoUrl       = $photo['videoUrl'];
    $altText        = $photo['altText'];
    $rank           = $photo['rank'];           


    // Get new dimensions
    $width  = 150;
    $height = 150;

    list($orgWidth, $orgHeight) = getimagesize(BASE_PATH.$photoFullPath);

    if($orgHeight!=0 && $orgWidth !=0) {

      $orgRatio = $orgWidth/$orgHeight;
      
      if ($width/$height > $orgRatio) {
      
        $width = $height*$orgRatio;
      
      } else {

        $height = $width/$orgRatio;
        
      }

      $photoList .= '
        <li id="photo_'.$photoCount.'">
          <div class="to-left">
            <div class="img-wrap">
              <img src="'.$photoFullPath.'" alt="Slide Image '.$photoCount.'">
              <input type="hidden"
               value="'.$photoFullPath.'" name="pg_full_path[]">
              <input type="hidden"
               value="'.$photoThumbPath.'" name="pg_thumb_path[]">
            </div>
          </div>
          <div class="to-left padded">
            <ul>
              <li>
                <label for="caption-'.$photoCount.'">Heading:</label>
                <input type="text" maxlength="150"
                 id="caption-heading-'.$photoCount.'"
                 name="pg_photo_caption_heading[]" 
                 value="'.$captionHeading.'" class="input-xxlrg">
              </li>
              <li>
                <label for="caption-'.$photoCount.'">Caption:</label>
                <input type="text" maxlength="150" 
                 id="caption-'.$photoCount.'" 
                 name="pg_photo_caption[]" 
                 value="'.$caption.'" class="input-xxlrg">
              </li>
              <li>
                <label for="photo-alt-'.$photoCount.'">Alt text:</label>
                <input type="text" maxlength="150" 
                 id="photo-alt-'.$photoCount.'" 
                 name="pg_photo_alt[]" 
                 value="'.$altText.'" class="input-xxlrg">
              </li>
              <li>
                <label for="pg-photo-alt-'.$photoCount.'">Video Id:</label>
                <input type="text" maxlength="150" 
                 id="pg-photo-video-url-'.$photoCount.'" 
                 name="pg_photo_video_url[]" 
                 value="'.$videoUrl.'" class="input-lrg">
              </li>
              <li>
                <label for="rank-'.$photoCount.'">Rank:</label>
                <input type="text" id="rank-'.$photoCount.'" 
                 name="pg_photo_rank[]" 
                 value="'.$rank.'" class="input-small">
                <input type="hidden" id="ind-'.$photoCount.'" 
                 name="pg_photo_ind[]" 
                 value="'.$photoInd.'" class="input-small">
                <a href="javascript:;"
                 onClick="removePhoto('.$photoCount.');">remove</a>
              </li>
            </ul>
          </div>
          <div class="clearfix clear"></div>
        </li>';

      $photoCount++;

    }

  }

}
$photoList .= '</ul>';

$photoCount = $photoCount - 1;

$tabPhotosContent = '<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td>
        <div style="margin-bottom:10px;">
          <a href="javascript:;" onClick="addPhoto();"
           class="btn btn-primary" style="color:#fff">
            <i class="glyphicon glyphicon-plus-sign"
             style="vertical-align:text-top;margin:0px 4px 0 0"></i> 
             Add New Photo
          </a>
        </div>
        '.$photoList.'
        <div id="newPhotos"></div>
        <input type="hidden" value="'.$photoCount.'" id="lineValue" />
        <input type="hidden" id="tempPhoto" name="tempPhoto" value="">
      </td>
    </tr>
  </table>';


$scriptsOnLoad .= <<<HTML
  function removePhoto(id) 
  {
    var id;
    id = 'photo_' + id;
    $('#'+id).remove();
  }

  function addPhoto() 
  {
    var winl   = (screen.width - 1000) / 2;
    var wint   = (screen.height - 700) / 2;
    var mypage = jsVars.dataManagerUrl+"&NetZone=tempPhoto";
    var myname = 'imageSelector';

    winprops = 'status=yes,height=700,width=1000,scrollbars=auto,resizable';
    winprops += ',top='+wint+',left='+winl;
    
    win = window.open(mypage, myname, winprops);
    
    if (parseInt(navigator.appVersion) >= 4) { 
    
      win.window.focus(); 
    
    }
  }

  function SetUrl(p,w,h) 
  {
    var p, w, h;

    document.getElementById('tempPhoto').value = p;
    
    setNewPhoto();
  }

  function setNewPhoto() 
  {
    var ni = $('.slides');
    
    var numi = parseInt(ni.find('[id^="photo_"]').size(), 10);
    
    var num = (document.getElementById('lineValue').value -1)+ 2;
  
    numi.value = num;
  
    var newDiv = document.createElement('div');
    
    $('#lineValue').val(num);

    var divIdName = 'photo_'+num;
    var divStyle  = '';

    divStyle  = 'float:left; width:160px; height:180px;';
    divStyle += ' margin-right:10px; margin-bottom:10px;';

    newDiv.setAttribute('id',divIdName);
    newDiv.setAttribute('style', divStyle);

    var newPhotoUrl = document.getElementById('tempPhoto').value;

    var newSlide = '<li id="photo_'+num+'">\
        <div class="to-left">\
          <div class="img-wrap">\
            <img src="'+newPhotoUrl+'" alt="Slide Image '+num+'">\
            <input type="hidden"\
             value="'+document.getElementById('tempPhoto').value + '"\
              name="pg_full_path[]">\
            <input type="hidden" value="" name="pg_thumb_path[]">\
          </div>\
        </div>\
        <div class="to-left padded">\
          <ul>\
            <li>\
              <label for="caption-'+num+'">Heading:</label>\
              <input type="text" id="caption-heading-'+num+'"\
               maxlength="150"\
               name="pg_photo_caption_heading[]" value="" class="input-xxlrg">\
            </li>\
            <li>\
              <label for="caption-'+num+'">Caption:</label>\
              <input type="text" id="caption-'+num+'"\
               maxlength="150"\
               name="pg_photo_caption[]" value="" class="input-xxlrg">\
            </li>\
            <li>\
              <label for="pg-photo-alt-'+num+'">Video Id:</label>\
              <input type="text" id="pg-photo-video-url-'+num+'"\
               maxlength="150"\
               name="pg_photo_video_url[]" value="" class="input-xxlrg">\
            </li>\
            <li>\
              <label for="photo-alt-'+num+'">Alt text:</label>\
              <input type="text" id="photo-alt-'+num+'" maxlength="150"\
                name="pg_photo_alt[]" value="" class="input-xxlrg">\
            </li>\
            <li>\
              <label for="rank-'+num+'" >Rank:</label>\
              <input type="text" id="rank-'+num+'" name="pg_photo_rank[]"\
                value="" class="input-small">\
              <input type="hidden" id="ind-$photoCount"\
                name="pg_photo_ind[]" value="0" class="input-small">\
              <a href="javascript:;"\
                onClick="removePhoto('+num+');">remove</a>\
            </li>\
          </ul>\
        </div>\
        <div class="clearfix clear"></div>\
      </li>';

    ni.append(newSlide);
  }
HTML;

?>