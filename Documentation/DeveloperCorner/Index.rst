.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _developer:

Developer Corner
================

How does Fluidcontent YouTube work?
-----------------------------------

Using ``EXT:fluidcontent`` and its dependency ``EXT:flux`` a Flexible Content Element is created. In the Controller, a special Utility is used to extract the YouTube Video ID from the entered URL and made available to the template.

Templating
----------

In the template there are three important sections defining the use of this extension:

1. **Configuration**: the Flux configuration for rendering the FlexForm. This specifies the YouTube URL field to be available.
2. **Preview**: this section will be used to render the preview in the Page module.
3. **Main**: this section will be used to render the element in the front-end.

By default, the main section uses ``EXT:vhs`` to add a tiny CSS file to the page to make the YouTube video embed responsive. The CSS is based on the `SUIT CSS FlexEmbed component`_.

.. _SUIT CSS FlexEmbed component: https://github.com/suitcss/components-flex-embed/

Testing
-------

To run the Fluidcontent YouTube unit tests, first install ``EXT:phpunit``. Then, invoke the test runner from the command line:

.. code-block:: sh

	/path/to/typo3/cli_dispatch.phpsh phpunit typo3conf/ext/fluidcontent_youtube/Tests/Unit/