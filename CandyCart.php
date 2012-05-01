<?php

/**
 * @plugin CandyCart
 * @description Ecommerce for CandyCMS
 * @author Cocoon Design
 * @authorURI http://www.wearecocoon.co.uk/
 * @copyright 2012 (C) Cocoon Design  
 */

class CandyCart {
	
	public static function install(){
	
		$dbh = new CandyDB();
		$dbh->exec("CREATE TABLE IF NOT EXISTS ".DB_PREFIX."candycart (`product_id` int(11) NOT NULL AUTO_INCREMENT, PRIMARY KEY (`product_id`), `product_name` varchar(256) NOT NULL, `product_qty` int(11) NOT NULL, `product_images` TEXT NOT NULL, `product_desc` TEXT NOT NULL)");
	
	}
	
	public static function dropdownTemplates($selected = false, $name = 'storetemplate'){
		
		$templates = Theme::listTemplates();
		
		$html = "<select name='$name'>";
		
		foreach ($templates as $template) {
			
			if ($selected != false) {
				if ($selected == $template['file']) {
					$html .= "<option value='{$template['file']}' selected='selected'>";	
				} else {
					$html .= "<option value='{$template['file']}'>";
				}
							
			} else {
				$html .= "<option value='{$template['file']}'>";
			}
		
			$html .= $template['template'];
			$html .= '</option>';	
		}
		
		$html .= "</select>";
		
		return $html;
	}
	
	public static function adminNav(){
		return array('candyCart' => 'CandyCart');
	}
 	
 	public static function adminHead(){
 		
 		return '<link rel="stylesheet" href="'.PLUGIN_URL.'CandyCart/css/admin.css" type="text/css" />';
 		
 	}
 	
 	public static function checkSettings(){
 		
 		$dbh = new CandyDB();
 		$sth = $dbh->prepare('SELECT option_value FROM '. DB_PREFIX .'options WHERE option_key = "paypal"');
 		$sth->execute();
 		
 		$result = $sth->fetchColumn();
 		
 		if ($result == false) {
 			echo '<p class="message notice update">You need configure some settings before CandyCart will work correctly. <a href="dashboard.php?page=candyCart&tab=settings">Click here</a></p>';
 		}
 		
 	}
 	
 	public static function addShorttag(){

 		$replace = include(PLUGIN_PATH.'CandyCart/store.php');
		
 		return array('{{candycart}}' => $replace);	
 	}
	
}