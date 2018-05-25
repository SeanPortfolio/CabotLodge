<?php

###############################################################################
## CLASS TO CERATE PHOTO GROUPS & CREATE THUMBNAILS
###############################################################################

class PhotoGroup
{
	/**
 	* @var integer -  Sets photo group id
 	*/
	public $id;

	/**
 	* @var var - Sets photo group type
 	*/
	public $name 					= 'Untitled';

	/**
 	* @var var - Sets photo menu label
 	*/
	public $menuLabel 				= '';

	/**
 	* @var ENUM(S|G) - Sets photo group type
 	*/
	public $type 					= 'S';

	/**
 	* @var ENUM(Y|N) - Sets value for show in CMS
 	*/
	public $showInCms 				= FLAG_NO;

	/**
 	* @var ENUM(Y|N) Sets value for show on gallery page
 	*/
	public $showOnGalleryPage 		= FLAG_NO;
	
	/**
 	* Sets new images - array of images to save
 	*/
	public $photos 				    = array();

	/**
 	* @var ENUM(Y|N) - Sets value for creating thumbnail file
 	*/
	public $createThumbs			= FLAG_NO;


	/**
 	* @var ENUM(Y|N) - Sets value for deleting photogroup
 	*/
	public $deletePhotoGroup  	   = FLAG_NO;

	/**
 	* @var integer - Sets value for thumbnail width and Height
 	*/
	public $thumbWidth 				= 550;
	
	public $thumbHeight 			= 680;

	
	
	public function __construct($id = null)
	{	
		global $rootfull, $rootadmin, $root, $upload_dir;

		$this->id       			= $id;
	
		$this->set();
	}

	/**
   	* 
   	* Get photo group data
    *
	* @return array of photo group data
	*/


	public function get()
	{

		if (!empty($this->id)) {

			$arrPhotoGroupData = fetchRow("SELECT `name`, 
				`menu_label`, 
				`type`, 
				`show_in_cms`, 
				`show_on_gallery_page` 
			FROM `photo_group` 
			WHERE `id` = '{$this->id}' 
			LIMIT 1");

			if (!empty($arrPhotoGroupData)) {

				$arrPhotos = fetchAll("SELECT
				  `id`,
				  `full_path` AS fullPath,
				  `thumb_path` AS thumbPath,
				  `caption_heading` AS captionHeading,
				  `caption`,
				  `alt_text` AS altText,
				  `button_label` AS buttonLabel,
				  `url`,
				  `video_url` AS videoUrl,
				  `width`,
				  `height`,
				  `rank`
				FROM
				  `photo`
				WHERE `photo_group_id` = '{$this->id}'
				ORDER BY `rank`");

				$arrPhotoGroupData['photos'] = $arrPhotos;

			}

			return $arrPhotoGroupData;

		}

		return false;

	}

	/**
   	* 
   	* Set photo group properties
    *
	* @return boolean
	*/

	private function set()
	{

		$data = $this->get();

		if (!empty($data)) {

			$this->name              = $data['name'];
			$this->menuLabel         = $data['menu_label'];
			$this->type              = $data['type'];
			$this->showInCms         = $data['show_in_cms'];
			$this->showOnGalleryPage = $data['show_on_gallery_page'];
			$this->photos            = $data['photos'];
		}

	}

	/**
   	* 
   	* Set raw photo data
    *
	* @param array $photos, Description - create and set images to be saved in photo group
	* @return boolean
	*/

	public function setPhotosFromRawData($photos)
	{
		$arrPhotos = array();

		$photoIds            = $photos['ind'];
		$photoPath           = $photos['images'];	
		$photoRank           = $photos['rank'];
		
		$photoThumbs         = $photos['thumbs'];
		$photoCaption        = $photos['caption'];
		$photoCaptionHeading = $photos['heading'];
		$photoAltText        = $photos['altText'];
		$photoButtonLabel    = $photos['buttonLabel'];
		$photoUrl            = $photos['url'];
		$photoVideoUrl       = $photos['videoUrl'];

		if (!empty($photoPath)) {

			for($i=0; $i < count($photoPath); $i++)
			{
				$arrPhotos[] = array(
					'id'             => $photoIds[$i],
					'fullPath'       => $photoPath[$i],
					'thumbPath'      => getNullIfEmpty($photoThumbs[$i]),
					'rank'			 		 => $photoRank[$i],
					'photoCaption'   => getNullIfEmpty($photoCaption[$i]),
					'captionHeading' => getNullIfEmpty($photoCaptionHeading[$i]),
					'altText'        => getNullIfEmpty($photoAltText[$i]),
					'buttonLabel'    => getNullIfEmpty($photoButtonLabel[$i]),
					'url'    		 		 => getNullIfEmpty($photoUrl[$i]),
					'videoUrl'       => getNullIfEmpty($photoVideoUrl[$i])
					);
			}
		}

		$this->photos = $arrPhotos;
	}

	/**
   	* 
   	* Get All photogroups
	* @return array of file path of photos available in photo group and needs to be removed
	*/
	public function getAll($arrWhere)
	{

		if(!empty($arrWhere)) {

			$where = '';

			$i = 0;

			foreach ($arrWhere as $column => $value) {

				$where .= (($i === 0) ? ' WHERE ' : ' AND ')."`{$column}` = '{$value}' ";

				$i++;
			}
		} else {

			$where = " WHERE 1 ";

		}

		$photoGroups =  fetchAll("SELECT `id`, 
			MD5(`id`) AS hashedKey,
			`name`, 
			`menu_label`,
			`show_on_gallery_page`,
			`rank`
        FROM `photo_group`
        {$where}
        ORDER BY `rank`");

   
		return $photoGroups;
	}


	/**
   	* 
   	* Save a photo group data
    *
	* @param array $photoGroupId, Description - Photo group id as integer or null
	* @return integer (new photo group id) / boolean (update photo group data)
	*/

	public function save()
	{   
		
		//! Create/Update photo group data
			
		$photoGroupData = array();

		$photoGroupData['name']                 = getNullIfEmpty($this->name);
		$photoGroupData['type']                 = getNullIfEmpty($this->type);
		$photoGroupData['menu_label']           = getNullIfEmpty($this->menuLabel);
		$photoGroupData['show_in_cms']          = (empty($this->showInCms)) ? FLAG_NO : $this->showInCms;
		$photoGroupData['show_on_gallery_page'] = (empty($this->showOnGalleryPage)) ? FLAG_NO : $this->showOnGalleryPage;

		if (empty($this->id)) {

			$this->id = insertRow($photoGroupData, 'photo_group');

		} else {

			updateRow($photoGroupData, 'photo_group', "WHERE `id` = '{$this->id}' LIMIT 1");

		}
		
		$photoGroupId = $this->id;

		if (!empty($photoGroupId)) {			
		
			//! Update photos and repective data

			$photoArr = $this->photos;
			$photoIds = array_column($photoArr, 'id');
			
			//! Remove previous photos uploaded to photo group
			$this->removeThumbPhotos($photoIds);
			
			if (!empty($photoArr)) {

				foreach ($photoArr AS $photo) { 

				  $photoData = array();

		      $photoId       = $photo['id'];
					$photoPath     = $photo['fullPath'];
					$prevThumbPath = $photo['thumbPath'];
					$photoFullPath = BASE_PATH.$photoPath;
				
					if (Helper::isFile($photoPath)) {

						$photoDetails = getimagesize($photoFullPath);

						//! Create photo thumbnail file

						$photoThumbPath = '';

						if ($this->createThumbs === FLAG_YES) {

							$photoThumbPath = Helper::createImageThumb($photoPath, $this->thumbWidth, $this->thumbHeight, $prevThumbPath);

						} 

		                //! Create array to save data
		                
						$photoData['full_path']       = $photo['fullPath'];
						$photoData['thumb_path']      = $photoThumbPath;
						$photoData['caption_heading'] = $photo['captionHeading']; 
						$photoData['caption']         = $photo['photoCaption']; 						
						$photoData['alt_text']        = $photo['altText']; 
						$photoData['button_label']    = $photo['buttonLabel']; 
						$photoData['url']             = $photo['url']; 
						$photoData['video_url']       = $photo['videoUrl']; 
						$photoData['width']           = $photoDetails[0];
						$photoData['height']          = $photoDetails[1];
						$photoData['rank']            = getNullIfEmpty(sanitizeVar($photo['rank'], FILTER_SANITIZE_NUMBER_INT));
						$photoData['photo_group_id']  = $photoGroupId;
						
						if ($photoId == 0) {
		                
		                	//! Insert photo data photo id = 0
						   	insertRow($photoData, 'photo');

		                } else {

		                	//! Update photo data
		                	updateRow($photoData, 'photo', "WHERE `id` = '{$photoId}' LIMIT 1");

		                }
		            }
		        }
			}

			return true;

		}
	}


	/**
   	* 
   	* Delete a photo group data
    *
	* @param array $photoGroupIds, Description - Photo group id as integer
	* @return integer (new photo group id) / boolean (update photo group data)
	*/

	public function delete($PhotoGroupIds)
	{   
		//! Check if array of photo group ids is empty or not
		$photoGroupIds = (!empty($PhotoGroupIds)) ? $PhotoGroupIds : array('0');
		$photoGroupCsv = implode(',', $photoGroupIds);
		
		$photoIdsCsv = fetchValue("SELECT GROUP_CONCAT(`id`)
			FROM `photo` 
			WHERE `photo_group_id` IN ({$photoGroupCsv})");
		
		if (!empty($photoIdsCsv)) {

			$photos =  fetchAll("SELECT `thumb_path` AS photoPath
				FROM `photo` 
				WHERE `id` IN ({$photoIdsCsv}) 
				AND `thumb_path` != ''");

			//! Delete thumnails 
			$this->deleteThumbFiles($photos);
	
		}
		
		runQuery("DELETE FROM `photo` WHERE `photo_group_id` IN ($photoGroupCsv)");

		if ($this->deletePhotoGroup === FLAG_YES) {

			runQuery("DELETE FROM `photo_group` WHERE `id` IN ($photoGroupCsv)");
			
		}        
		
		return true;
	}

	/**
   	* 
   	* Save a photo group data
    *
	* @param array $data, Description - array of ranks as value with photo group id as key
	* @return boolean 
	*/

	public function saveRank($data)
	{   
		if (!empty($data)) {

			foreach ($data as $id => $rank) {
				runQuery("UPDATE `photo_group` SET `rank`= '{$rank}' WHERE `id` = '{$id}' LIMIT 1");
			}

		}	

		return true;
	}

	/**
   	* 
   	* remove photos
   	*
	* @param array $photoIds, Description - array of photo ids
	* @return boolean
	*/
	private function removeThumbPhotos($photoIds)
	{	
		//! Check if array of photo ids is empty or not
		$photoIds = (!empty($photoIds)) ? $photoIds : array('0');

		//! Get array of previous images which so ever removed from the photogroup
		$photos = $this->getThumbPhotos($photoIds);
		$this->deleteThumbFiles($photos);
		
		//! Delete previous images which so ever removed from the photogroup
		$this->deletePhotos($photoIds);

		return true;
	}


	/**
   	* 
   	* Delete previous images which so ever removed from the photogroup
	*
	* @param array $photos, Description - array of photo path
	* @return boolean 
	*/
	private function deleteThumbFiles($photos)
	{	
		//! Delete thumnails 
		if (!empty($photos)) {
			
			foreach ($photos as $photo) {
	            
	            $photoFullPath = BASE_PATH.$photo['photoPath'];

	            if ( is_file($photoFullPath) ) {
	                unlink($photoFullPath);
	            
	            }
	        }
		}
		return true;
	}


	/**
   	* 
   	* Delete previous images which so ever removed from the photogroup
	*
	* @param array $photoIds, Description - array of photo ids
	* @return boolean 
	*/
	private function deletePhotos($photoIds)
	{	
		$sqlExtra = (!empty($this->id)) ? " AND `photo_group_id` = '{$this->id}'" : "";

		$sqlDelete = "DELETE FROM `photo` 
			WHERE `id` NOT IN (".implode(',',$photoIds).")
			{$sqlExtra}";
	
		runQuery($sqlDelete);

		return true;
	}


	/**
   	* 
   	* Get an array of photos which so ever removed from the photogroup
	* @param array $photoIds, Description - array of photo ids
	* @return array of file path of photos available in photo group and needs to be removed
	*/
	private function getThumbPhotos($photoIds)
	{
		$sqlExtra = (!empty($this->id)) ? " AND `photo_group_id` = '{$this->id}'" : "";

		$photoFiles =  fetchAll("SELECT `thumb_path` AS photoPath
			FROM `photo` 
			WHERE `id` NOT IN (".implode(',',$photoIds).") 
			{$sqlExtra}
			AND `thumb_path` != ''");
		
		return $photoFiles;
	}	

};

?>