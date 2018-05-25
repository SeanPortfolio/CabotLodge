<?php
/**
 * Page Navigation 
 *
 * @package    NetZone Base CMS 2.0
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management Ltd.
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since version 2.0
 */

// MENU BAR

function buildSiteMenu()
{

  global $do, $disableMenu;
  
  $mainMenuView = "";

  $menuPages = array(
    array(
      'group_label' => 'General',
      'items' => array(
        array(
          'label' => 'Dashboard',
          'uri' => 'dashboard',
          'icon_cls' => 'fa fa-dashboard'
        ),
        array(
          'label' => 'Pages',
          'uri' => 'pages',
          'icon_cls' => 'glyphicon glyphicon-list-alt'
        ),
        array(
          'label' => 'File Manager',
          'uri' => 'files',
          'icon_cls' => 'fa fa-folder'
        ),
        array(
          'label' => 'Contact Enquiries',
          'uri' => 'enquiries',
          'icon_cls' => 'fa fa-envelope'
        ),
        array(
          'label' => 'Reviews',
          'uri' => 'reviews',
          'icon_cls' => 'fa fa-comments'
        )
      )
    ),
    array(
      'group_label' => 'Photos',
      'items' => array(
        array(
          'label' => 'Slideshows',
          'uri' => 'slideshows',
          'icon_cls' => 'glyphicon glyphicon-picture'
        ),
        array(
          'label' => 'Photo Gallery',
          'uri' => 'galleries',
          'icon_cls' => 'fa fa-camera-retro'
        )          
      )
    ),
    array(
      'group_label' => 'Blog',
      'items' => array(
        array(
          'label' => 'Categories',
          'uri' => 'blogcategories',
          'icon_cls' => 'fa fa-rss'
        ),
        array(
          'label' => 'Posts',
          'uri' => 'blogposts',
          'icon_cls' => 'glyphicon glyphicon-list-alt'
        )          
      ),
    ),
    array(
      'group_label' => 'Modules',
      'items' => array(
        array(
          'label' => 'Accommodation',
          'uri' => 'accommodation',
          'icon_cls' => 'glyphicon glyphicon-list-alt'
        )      
      ),
    ),
    array(
      'group_label' => 'General Settings',
      'items' => array(
        array(
          'label' => (ACCESS_SETTINGS == FLAG_YES) ? 'Settings' : NULL,
          'uri' => (ACCESS_SETTINGS == FLAG_YES) ? 'settings' : NULL,
          'icon_cls' => (ACCESS_SETTINGS == FLAG_YES) ? 'fa fa-cog' : NULL
        ),
        array(
          'label' => (ACCESS_SETTINGS == FLAG_YES) ? 'Redirects': NULL,
          'uri' => (ACCESS_SETTINGS == FLAG_YES) ? 'redirects': NULL,
          'icon_cls' => (ACCESS_SETTINGS == FLAG_YES) ? 'fa fa-mail-forward': NULL
        ),
        array(
          'label' => (ACCESS_USERS == FLAG_YES) ? 'Users': NULL,
          'uri' => (ACCESS_USERS == FLAG_YES) ? 'users': NULL,
          'icon_cls' => (ACCESS_USERS == FLAG_YES) ? 'fa fa-user': NULL
        ),
        array(
          'label' => (ACCESS_ACCESSGROUPS == FLAG_YES) ? 'Usergroups': NULL,
          'uri' => (ACCESS_ACCESSGROUPS == FLAG_YES) ? 'accessgroups': NULL,
          'icon_cls' => (ACCESS_ACCESSGROUPS == FLAG_YES) ? 'fa fa-group': NULL
        ),
        // array(
        //   'label' => (ACCESS_CMSSETTINGS == FLAG_YES) ? 'CMS Settings': NULL,
        //   'uri' => (ACCESS_CMSSETTINGS == FLAG_YES) ? 'cmssettings': NULL,
        //   'icon_cls' => (ACCESS_CMSSETTINGS == FLAG_YES) ? 'fa fa-wrench': NULL
        // )
      )
    )    
  );
  
  $mainMenuView = '<ul class="main-navigator">';

  foreach ($menuPages as $menu) {
      
    $mainMenuView .= '<li><span>'.$menu['group_label'].'</span>';
    $mainMenuView .= '<ul class="nav nav-pills nav-stacked navi">';

    foreach ($menu['items'] as $menuItem) {

      $menuLink = ADMIN_BASE_URL."?do=".$menuItem['uri'];
  
      $isDisabled = ($disableMenu == FLAG_YES || $menuDisable == FLAG_YES) ? ' disabled' : '';
      $isActive   = ($menuItem['uri'] == $do) ? ' active' : '';
      $href       = ($disableMenu == FLAG_YES || $menuDisable == FLAG_YES) ? '' : ' href="'.$menuLink.'"';
      $icon       = ($menuItem['icon_cls']) ? ' <i class="'.$menuItem['icon_cls'].'"></i> ' : '';

      $mainMenuView .= '<li class="'.$isDisabled.$isActive.'"><a'.$href.'>'.$icon.$menuItem['label'].'</a></li>';
    }
    $mainMenuView .= '</ul>';
    $mainMenuView .= '</li>';
    $mainMenuView .= '<li class="nav-divider"></li>';

  }

  $mainMenuView .= '</ul>';

  return $mainMenuView;
}

?>