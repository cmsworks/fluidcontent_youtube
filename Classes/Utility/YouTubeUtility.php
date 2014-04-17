<?php
namespace CmsWorks\Cwfluidyoutube\Utility;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Leon de Rijke <leon@cmsworks.nl>, CMS Works BV
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

class YouTubeUtility {

	/**
	 * Returns the 11 characters long YouTube video identifier from a given
	 * YouTube URL.
	 *
	 * @param  string $url YouTube URL
	 * @return string      YouTube Video ID
	 */
	public function getVideoId($url) {
		$videoId = '';

		$pattern = '#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#';

		if (preg_match($pattern, $url, $matches)) {
			$videoId = $matches[0];
		}

		return $videoId;
	}

}