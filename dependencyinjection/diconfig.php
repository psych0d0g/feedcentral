<?php

/**
 * ownCloud - Feed Central app
 *
 * @author Bernhard Posselt
 * @copyright 2013 Bernhard Posselt <nukeawhale@gmail.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */



namespace OCA\FeedCentral\DependencyInjection;

use \OCA\News\DependencyInjection\DIContainer as NewsContainer;

use \OCA\FeedCentral\Controller\PageController;
use \OCA\FeedCentral\Controller\SettingsController;

/**
 * Delete the following twig config to use ownClouds default templates
 */
// use this to specify the template directory
$this['TwigTemplateDirectory'] = __DIR__ . '/../templates';


$this['NewsContainer'] = $this->share(function() {
	return new NewsContainer();
});


/**
 * CONTROLLERS
 */
$this['PageController'] = $this->share(function($c){
	return new PageController($c['API'], $c['Request']);
});

$this['SettingsController'] = $this->share(function($c){
	return new SettingsController($c['API'], $c['Request']);
});

$this['FeedController'] = $this->share(function($c){
	return new FeedController($c['API'], $c['Request']);
});
