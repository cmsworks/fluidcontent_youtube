<?php
namespace CmsWorks\Cwfluidyoutube\Tests\Unit\Utility;
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

class YouTubeUtilityTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * YouTubeUtility
	 * @var \CmsWorks\Cwfluidyoutube\Utility\YouTubeUtility
	 */
	protected $subject;

	public function setUp() {
		$this->subject = new \CmsWorks\Cwfluidyoutube\Utility\YouTubeUtility();
	}

	/**
	 * @test
	 * @return void
	 */
	public function getVideoIdReturnsEmptyStringForEmptyUrl() {
		$result = $this->subject->getVideoId('');
		$this->assertEquals('', $result);
	}

	/**
	 * @test
	 * @return void
	 */
	public function getVideoIdSupportsPath() {
		$urls = array(
			"youtube.com/v/dQw4w9WgXcQ",
			"youtube.com/vi/dQw4w9WgXcQ",
			"youtube.com/embed/dQw4w9WgXcQ",
			"youtube.com/e/dQw4w9WgXcQ",
			"youtu.be/dQw4w9WgXcQ",
		);

		foreach ($urls as $url) {
			$result = $this->subject->getVideoId($url);
			$this->assertEquals('dQw4w9WgXcQ', $result);
		}
	}

	/**
	 * @test
	 * @return void
	 */
	public function getVideoIdSupportsQueryString() {
		$urls = array(
			"youtube.com/?v=dQw4w9WgXcQ",
			"youtube.com/?vi=dQw4w9WgXcQ",
			"youtube.com/watch?v=dQw4w9WgXcQ",
			"youtube.com/watch?vi=dQw4w9WgXcQ",
			"youtube.com/watch?feature=player_embedded&v=dQw4w9WgXcQ",
			"youtube.com/?feature=player_embedded&v=dQw4w9WgXcQ",
		);

		foreach ($urls as $url) {
			$result = $this->subject->getVideoId($url);
			$this->assertEquals('dQw4w9WgXcQ', $result);
		}
	}

	/**
	 * @test
	 * @return void
	 */
	public function getVideoIdSupportsFragment() {
		$urls = array(
			"youtube.com/user/username#p/u/11/dQw4w9WgXcQ",
		);

		foreach ($urls as $url) {
			$result = $this->subject->getVideoId($url);
			$this->assertEquals('dQw4w9WgXcQ', $result);
		}
	}

}