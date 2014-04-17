<?php
namespace CmsWorks\Cwfluidyoutube\Controller;
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

use FluidTYPO3\Fluidcontent\Controller\AbstractContentController;

/**
 * ContentController
 *
 * Controller to render the content element.
 *
 * @package CwFluidYouTube
 * @subpackage Controller
 */
class ContentController extends AbstractContentController {

	/**
	 * YouTubeUtility
	 *
	 * @var \CmsWorks\Cwfluidyoutube\Utility\YouTubeUtility
	 * @inject
	 */
	protected $youTubeUtility;

	/**
	 * @return string
	 */
	public function youTubeAction() {
		$videoId = $this->youTubeUtility->getVideoId($this->data['url']);
		$this->view->assign('videoId', $videoId);
	}

}