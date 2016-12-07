<?php

App::uses('Component', 'Controller');
class AppServiceComponent extends Component {

    /**
     * @var Model
     */
    public $AppService;
    
	public function initialize(Controller $controller) {
        //Register Model
	}
		
	public function updateLastLogin($userId){
		
		$ip = getenv('HTTP_CLIENT_IP')?:
		getenv('HTTP_X_FORWARDED_FOR')?:
		getenv('HTTP_X_FORWARDED')?:
		getenv('HTTP_FORWARDED_FOR')?:
		getenv('HTTP_FORWARDED')?:
		getenv('REMOTE_ADDR');
		
		$this->User->id = $userId;
		$user['User']['ip_last_login'] = $ip;
		$user['User']['last_logon'] = date('Y-m-d H:i:s');
		
		$this->User->save($user, true);
		 
	}
	
	public function createSlug($url, $ext='.html'){
		 
		$url = trim($url);
		$url = str_replace("-"," ",$url);
		$url = preg_replace("/ {3,}/", " ", $url);
		$url = str_replace(" ","-",$url);
		$url = str_replace("/","-slash-",$url);
		return $url;
	
	}
	
	public function resizeImage($CurWidth, $CurHeight, $MaxHeightSize, $MaxWidthSize, $DestFolder, $SrcImage, $Quality, $ImageType, $imageResize){
		
		$message = "";
		//Check Image size is not 0
		if($CurWidth <= 0 || $CurHeight <= 0){
			
			$message = "Image size is not 0";
			return $message;
			
		}
	
		//Construct a proportional size of new image
		$ImageScale = $MaxWidthSize/$CurWidth;
		$NewWidth = ceil($ImageScale*$CurWidth);
		$NewHeight = ceil($ImageScale*$CurHeight);
		
		if($NewHeight > $MaxHeightSize){
			
			$ImageScale = $MaxHeightSize/$NewHeight;
			$NewWidth = ceil($ImageScale*$NewWidth);
			$NewHeight = ceil($ImageScale*$NewHeight);
			
		}
	
		if($CurWidth < $NewWidth || $CurHeight < $NewHeight){
			
			$NewWidth = $CurWidth;
			$NewHeight = $CurHeight;
			
		}
		
		$NewCanves = imagecreatetruecolor($NewWidth, $NewHeight);
		
		$Quality = (100-(($NewWidth*$NewHeight)*3)/$imageResize);
		
		// Resize Image
		if(imagecopyresampled($NewCanves, $SrcImage, 0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight)){   
			
			switch(strtolower($ImageType)){   
				
				case 'image/png':
				imagepng($NewCanves, $DestFolder, $Quality);
				break;
				case 'image/gif':
					imagegif($NewCanves, $DestFolder, $Quality);
					break;
				case 'image/jpeg':
				case 'image/pjpeg':
					imagejpeg($NewCanves, $DestFolder, $Quality);
					break;
				default:
					return false;
					
			}
			
			if(is_resource($NewCanves)){
				
				imagedestroy($NewCanves);	
				
			}
			
			return true;
		
		}else{
			
			$message = array("msg" => "Can not resize image", "imageType" => $ImageType);
			
		}
		
		return $message;
	
	}
	
	
	public function uploadFiles($fileToUpload, $pathToFile = null){
	
		$target_dir = WWW_ROOT."uploads/";
		if ($pathToFile) {
			$target_dir = $target_dir.$pathToFile;
		}
	
		$target_file = $target_dir . basename($fileToUpload["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	
		if (!file_exists($target_dir)) {
			mkdir($target_dir, 0777, true);
		}
	
		// Check if file already exists
		if (file_exists($target_file)) {
			// echo "Sorry, file already exists.";
			// $uploadOk = 0;
		}
	
		// Check file size
		if ($fileToUpload["size"] > 5120000) {
			// echo "Sorry, your file is too large.";
			// $uploadOk = 0;
		}
	
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($fileToUpload["tmp_name"], $target_file)) {
				echo "The file ". basename( $fileToUpload["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
	
	public function uploadFilesAjax($fileToUpload, $pathToFile = null, $imageResize = 0){
	
		$target_dir = WWW_ROOT."uploads/";
		
		if ($pathToFile) {
			
			$target_dir = $target_dir.$pathToFile;
			
		}
	
		$target_file = $target_dir . basename($fileToUpload["name"]);
		
		$uploadOk = 1;
		
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	
		if (!file_exists($target_dir)) {
			
			mkdir($target_dir, 0777, true);
			
		}
	
		// Check if file already exists
		if (file_exists($target_file)) {
			// echo "Sorry, file already exists.";
			// $uploadOk = 0;
		}
	
		// Check file size
		if ($fileToUpload["size"] > 5120000) {
			// echo "Sorry, your file is too large.";
			// $uploadOk = 0;
		}
	
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			
		} else {
			
			// some information about image we need later.
			$ImageName = $fileToUpload["name"];
			$ImageSize = $fileToUpload['size'];
			$TempSrc = $fileToUpload['tmp_name'];
			$ImageType = $fileToUpload['type'];
			
			$processImage = true;
			
			if($imageResize == 0){
				
				move_uploaded_file($TempSrc, $target_file);
			
			}else{
				
				//Validate file + create image from uploaded file.
				switch(strtolower($ImageType)){
					
					case 'image/png':
					$CreatedImage = imagecreatefrompng($TempSrc);
					break;
					case 'image/gif':
						$CreatedImage = imagecreatefromgif($TempSrc);
						break;
					case 'image/jpeg':
					case 'image/pjpeg':
						$CreatedImage = imagecreatefromjpeg($TempSrc);
						break;
					default:
						$processImage = false; //image format is not supported!
						
				}
				
				//get Image Size
				list($CurWidth,$CurHeight) = getimagesize($TempSrc);
				$DestRandImageName = $target_dir . 'resized_'.basename($fileToUpload["name"]);
				$Quality = 100;
				$MaxHeightSize = 1080;
				$MaxWidthSize = 1920;
				
				if (move_uploaded_file($TempSrc, $target_file)) {
					
					if($imageResize > 0){
						
						if($ImageSize > $imageResize){
							
							$this->resizeImage($CurWidth, $CurHeight, $MaxHeightSize, $MaxWidthSize, $DestRandImageName, $CreatedImage, $Quality, $ImageType, $imageResize);
							
						}
						
					}
		
				} else {
					
					echo "Sorry, there was an error uploading your file.";
					die;
					
				}
			
			}
		}
	}

	public static function copyFileUpload($pathToFile = null, $fileName = null){

		$target_dir = WWW_ROOT."uploads/";

		if ($pathToFile) {

			$target_dir = $target_dir.$pathToFile;

		}

		$srcfile = $target_dir.$fileName;
		$dstfile = $target_dir.'Mobile/'.$fileName;

		if (!file_exists(dirname($dstfile))) {
			mkdir(dirname($dstfile), 0777, true);
		}
		copy($srcfile, $dstfile);
	}

	public function copyFile($source, $dest, $file_name){
		
		if (!file_exists($dest)) {
			
			mkdir($dest, 0777, true);
			
		}
		
		if (!copy($source, ($dest.$file_name))) {
			
			echo "failed to copy $source...\n";
			
		}
		
	}
	
	public function deleteFiles($target) {
		 
		if(is_dir($target)){
	
			//$files = glob( $target . '*', GLOB_MARK ); 
			//GLOB_MARK adds a slash to directories returned
			$files = array_diff( scandir($target), array('.', '..') );
	
			foreach( $files as $file ){
	
				$this->deleteFiles("$target/$file");
	
			}
			 
			rmdir($target);
	
		}else if(is_file($target)) {
	
			unlink( $target );
	
		}
	}
	
	public function uploadAvatar($fileToUpload, $pathToFile = null){
		
		$settingData = $this->getSettingData();
		$message = "";
	
		$target_dir = WWW_ROOT."uploads/";
	
		if ($pathToFile) {
				
			$target_dir = $target_dir.$pathToFile;
				
		}
	
		$target_file = $target_dir . basename($fileToUpload["name"]);
	
		$uploadOk = 1;
	
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	
		if (!file_exists($target_dir)) {
				
			mkdir($target_dir, 0777, true);
				
		}
	
		// Check if file already exists
		if (file_exists($target_file)) {
			// echo "Sorry, file already exists.";
			// $uploadOk = 0;
		}
	
		// Check file size
		if ($fileToUpload["size"] > 5120000) {
			// echo "Sorry, your file is too large.";
			// $uploadOk = 0;
		}
	
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
				
			$message = "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
				
		} else {
				
			// some information about image we need later.
			$ImageName = $fileToUpload["name"];
			$ImageSize = $fileToUpload['size'];
			$TempSrc = $fileToUpload['tmp_name'];
			$ImageType = $fileToUpload['type'];
				
			$processImage = true;
				
			//Validate file + create image from uploaded file.
			switch(strtolower($ImageType)){
	
				case 'image/png':
					$CreatedImage = imagecreatefrompng($TempSrc);
					break;
				case 'image/gif':
					$CreatedImage = imagecreatefromgif($TempSrc);
					break;
				case 'image/jpeg':
					$CreatedImage = imagecreatefromjpeg($TempSrc);
					break;
				case 'image/pjpeg':
					$CreatedImage = imagecreatefromjpeg($TempSrc);
					break;
				default:
					$processImage = false; //image format is not supported!
					$message = array("msg" => "Image format is not supported!", "imageType" => $ImageType);
						
			}
			
			if($processImage){
				
				//get Image Size
				list($CurWidth,$CurHeight) = getimagesize($TempSrc);
				$DestRandImageName = $target_dir . basename($fileToUpload["name"]);
				$Quality = 100;
				$MaxHeightSize = $settingData['Setting']['avatar_height'];
				$MaxWidthSize = $settingData['Setting']['avatar_width'];
				$imageResize = $settingData['Setting']['avatar_file_size'];
				
				if($ImageSize > $imageResize){
				
					$message = $this->resizeImage($CurWidth, $CurHeight, $MaxHeightSize, $MaxWidthSize, $DestRandImageName, $CreatedImage, $Quality, $ImageType, $imageResize);
				
				}else{
					
					if (move_uploaded_file($TempSrc, $DestRandImageName)) {
					
						$message = "File has been uploaded.";
					
					} else {
					
						$message = "Sorry, there was an error uploading your file.";
					
					}
					
				}
			
			}
			
			return $message;
			
		}
	}


	
}

?>
