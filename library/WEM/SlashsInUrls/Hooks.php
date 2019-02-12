<?php

/**
 * Slashs in Urls for Contao
 * 
 * Allow users to add slashs in their URLs. Use the hook getPageIdFromUrl to check if we dont' have an auto_item parameter and find a page with merged fragments of the URLs
 * (Slashs "/", not Slash Slash.)
 *
 * Copyright (c) 2016-2019 Web ex Machina - https://www.webexmachina.fr/
 *
 * @license LGPL-3.0+
 * @author Web ex Machina - https://www.webexmachina.fr
 */

namespace WEM\SlashsInUrls;

/**
 * Provide methods who adjusts the URL management
 */
class Hooks extends \Controller
{
	/**
	 * Check if the last part of the URL must be treated as a page or a parameter
	 * @param Array
	 * @return Array
	 */
	public function checkSubpage($arrFragments){
		// Store the originals pars before everything
		$arrOriginalFragments = $arrFragments;

		// In the case where part[1] is an auto_item, just make the tests without him
		if($arrFragments[1] == 'auto_item')
			unset($arrFragments[1]);
		
		// Merge the parts
		$strAlias = implode('/', $arrFragments);

		// Check if a page exists and return it if we have a result
		if(\PageModel::findByIdOrAlias($strAlias))
			return array($strAlias);

		// If not, just keep cool and pretend we've done anything.
	    return array_unique($arrOriginalFragments);
	}
}