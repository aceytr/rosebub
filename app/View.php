<?php

namespace App;

abstract class View {
		
		/**
		* @var array views,layouts,templates
		*/
		protected $views;


	
		function __construct(){

		}

				
		/**
		 * Set this view in array views if exists
		 * 
		 * @$viewPath string path complet for view,layout,template
		 */
		public function setView(string $viewPath){
			if(file_exists($viewPath)){
				$this->views[] = $viewPath;
			}
		}



		/**
		 * Get this all layout
		 * 
		 * @return array
		 */
		private function getViews(){
			return $this->views;
		}


		/**
		 * Parse layout with app_lang module_lang and data passed
		 * @param array $dataView
		 * @return string $output html
		 */
		public function render(array $dataView){
			global $lang, $app_lang, $mod_lang;
			
			ob_start();
			foreach($this->getViews() as $viewPath){
				include_once($viewPath);
			}
			$output = ob_get_clean();

			return $output;
		}
	
}