.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _config-reference:

Configuration Reference
=======================

Fluidcontent YouTube can be configured using TypoScript.

Properties
^^^^^^^^^^

The following properties are available on ``plugin.tx_fluidcontentyoutube.settings``.

.. container:: ts-properties

	=========================== ===================================== ======================= ====================
	Property                    Data type                             :ref:`t3tsref:stdwrap`  Default
	=========================== ===================================== ======================= ====================
	width_                      :ref:`t3tsref:data-type-posint`       no                      480
	height_                     :ref:`t3tsref:data-type-posint`       no                      270
	=========================== ===================================== ======================= ====================

Property details
^^^^^^^^^^^^^^^^

.. only:: html

	.. contents::
		:local:
		:depth: 1


.. _ts-plugin-tx-fluidcontentyoutube-settings-width:

Width
"""""

:typoscript:`plugin.tx_fluidcontentyoutube.settings.width =` :ref:`t3tsref:data-type-posint`

Fallback width for the rendered YouTube embed code, in case the CSS isn't loaded.

.. _ts-plugin-tx-fluidcontentyoutube-settings-height:

Height
""""""

:typoscript:`plugin.tx_fluidcontentyoutube.settings.height =` :ref:`t3tsref:data-type-posint`

Fallback height for the rendered YouTube embed code, in case the CSS isn't loaded.

.. warning::
	Note that, if the CSS isn't loaded, this fallback can break your layout. For example: if you add a YouTube video in a very small column, but set the fallback width to be wider that the column, the video will probably overflow the column.
	Make sure to account for this with CSS, if you're not using the Fluidcontent YouTube provided CSS.