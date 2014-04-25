<?php
namespace CmsWorks\FluidcontentYoutube\Utility;
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
	 * Returns the YouTube video identifier from a given YouTube URL.
	 *
	 * First it checks the query string for a `v` or `vi` parameter, then it
	 * checks the fragment identifier and finally it checks the URL path for
	 * the video identifier.
	 *
	 * @param  string $url YouTube URL
	 * @return string      YouTube Video ID
	 */
	public function getVideoId($url) {
		// We need to prepend a proper protocol if missing, because prior to
		// PHP 5.4.7 the path would contain the whole URL if the protocol was
		// omitted when calling `parse_url`.
		// See http://nl3.php.net/manual/en/function.parse-url.php#example-4181
		$url = $this->prependProtocolIfMissing($url);

		$parsedUrl = parse_url($url);

		return $this->getVideoIdFromQueryString($parsedUrl["query"])
			?: $this->getVideoIdFromFragment($parsedUrl["fragment"])
			?: $this->getVideoIdFromPath($parsedUrl["path"]);
	}

	/**
	 * Adds the `http://` protocol if is it missing from the given URL.
	 *
	 * @param  string $url URL
	 * @return string      URL with `http://` prepended if necessary
	 */
	protected function prependProtocolIfMissing($url) {
		if (substr($url, 0, 7) === "http://" || substr($url, 0, 8) === "https://") {
			return $url;
		} elseif (substr($url, 0, 1) === "//") {
			return "http:" . $url;
		}
		return "http://" . $url;
	}

	/**
	 * Tries to find the video ID in the given URL query string.
	 *
	 * @param  string $queryString The URL query string
	 * @return string              The video identifier or null if it's not found
	 */
	protected function getVideoIdFromQueryString($queryString) {
		parse_str($queryString, $query);

		if ($query["v"]) {
			return $query["v"];
		} elseif ($query["vi"]) {
			return $query["vi"];
		}

		return null;
	}

	/**
	 * Returns the video ID from a given fragment. Since the video ID is always
	 * at the end of the fragment, it just returns the last fragment segment;
	 *
	 * @param  string $path The URL fragment
	 * @return string       The video identifier
	 */
	protected function getVideoIdFromFragment($fragment) {
		return end(explode("/", $fragment));
	}

	/**
	 * Returns the video ID from a given path. Since the video ID is always at
	 * the end of the path, it just returns the last path segment;
	 *
	 * @param  string $path The URL path
	 * @return string       The video identifier
	 */
	protected function getVideoIdFromPath($path) {
		return end(explode("/", $path));
	}

}