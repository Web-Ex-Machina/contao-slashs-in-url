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