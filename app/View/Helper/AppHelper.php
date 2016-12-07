<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {
	
	public function app() {
		$appController = new AppController();
		return $appController;
	}
	
	public function htmlHelper(){
		$view = new View();
		return $view->Html;
	}
	
	public function imgBaseUrl($path){
		return $this->htmlHelper()->url('/', true).'img/'.$path;
	}
	
	public function uploadBaseUrl($path){
		return $this->htmlHelper()->url('/', true).'uploads/'.$path;
	}
	
	public function assetBaseUrl($path){
		return $this->htmlHelper()->url('/', true).'assets/'.$path;
	}
	
	public function __($text) {
		return $this->app()->__($text);
	}

	public static function showErrors($errors = array()) {
		$str = '';
		if ($errors) {
			foreach ($errors as $key => $errorItem) {
				foreach ($errorItem as $item) {
					$str.="<li>$item</li>";
				}
			}

			return "<div class='alert alert-danger'><ul>$str</ul></div>";
		}

		return $str;
	}

	public static function okeFlash($mess = '') {
		$str = '';
		if ($mess) {
			return  "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>".$mess."</div>";

		}
		return $str;
	}

	public static function getYouTubeIdFromURL($url){
		$url_string = parse_url($url, PHP_URL_QUERY);
		parse_str($url_string, $args);
		return isset($args['v']) ? $args['v'] : false;
	}
	
}
