# Fluid Content YouTube

A YouTube Fluid Content Element for use with `EXT:fluidcontent` in TYPO3 CMS.

## What is it?

Born out of a little frustration with the default TYPO3 Media Content Element, this extension makes embedding a YouTube video into your TYPO3 CMS website a piece of cake. Problems with the default Media Element: it uses the old YouTube embed code (so the video isn't available on non-Flash devices), it's difficult for editors to configure and the plugin options are weird.

With Fluid Content YouTube, embedding a YouTube video is as easy as pasting the YouTube video URL into the desired field. By default, it uses the new (iframe-based) YouTube embed code, for all your video watching pleasures on non-Flash devices. And since responsive design is here to stay, Fluid Content YouTube makes the embed responsive with few lines of CSS.

## How is it installed?

1. Using the TYPO3 CMS Extension Manager, download and install the extension (`EXT:fluidcontent_youtube`).
2. Include the static TypoScript configuration in your root TypoScript template.

## How is it used?

After installation and inclusion of the static TypoScript, the YouTube Fluid Content Element will be available as a new content element type when inserting new content. By default, it is placed on the `FCE` tab of the New Content Element Wizard.

## References

* https://github.com/FluidTYPO3/fluidcontent is a dependency - it is the integration necessary to render Fluid Content Elements
* https://github.com/FluidTYPO3/vhs is dependency providing many ViewHelpers used in the Fluid Content Element templates