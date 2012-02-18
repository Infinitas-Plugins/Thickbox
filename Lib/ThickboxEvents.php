<?php
	/*
	 * Short Description / title.
	 * 
	 * Overview of what the file does. About a paragraph or two
	 * 
	 * Copyright (c) 2010 Carl Sutton ( dogmatic69 )
	 * 
	 * @filesource
	 * @copyright Copyright (c) 2010 Carl Sutton ( dogmatic69 )
	 * @link http://www.infinitas-cms.org
	 * @package thickbox
	 * @subpackage thickbox.events
	 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
	 * @since 0.1
	 * 
	 * @author dogmatic69
	 * 
	 * Licensed under The MIT License
	 * Redistributions of files must retain the above copyright notice.
	 */

	class ThickboxEvents {
		/**
		 * The javascript to load into Infinitas
		 *
		 * @param object $event the current event
		 * @param array $data controller params
		 * @return mixed, string|array of js files. false if not needed
		 */
		public function onRequireJavascriptToLoad($event, $data) {
			if(!ThickboxEvents::__needAssets($data)) {
				return false;
			}

			return array('Thickbox.thickbox');
		}

		/**
		 * The css to load into Infinitas
		 *
		 * @param object $event the current event
		 * @param array $data controller params
		 * @return mixed, string|array of css files. false if not needed
		 */
		public function onRequireCssToLoad($event, $data) {
			if(!ThickboxEvents::__needAssets($data)) {
				return false;
			}

			return array(
				'Thickbox.thickbox'
			);
		}

		/**
		 * Check if the assets are needed for this request.
		 *
		 * @param array $data params from controller
		 * @return bool true if assets are neede, false if not
		 */
		private function __needAssets($data) {
			return true; //!isset($data['prefix'])  || $data['prefix'] != 'admin';
		}
	}