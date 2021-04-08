<?php
/**
 * JavaScript Manager Plugin
 *
 * @copyright (C) 2018 Open Source Matters, Inc. <https://www.joomla.org>
 * @license GNU General Public License version 2 or later; see LICENSE.txt
 * @since  4.0
 */

defined('_JEXEC') or die;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\WebAsset\WebAssetManager;
/**
 * JavaScript Manager Plugin to run user submitted script code
 *
 * @since  4.0
 */
class PlgSystemScriptCustomizer extends CMSPlugin
{
	/**
	 * Application object
	 *
	 * @var    \Joomla\CMS\Application\CMSApplication
	 * @since  3.2
	 */
	protected $app;

	/**
	 * Listener for the `onBeforeRender` event
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onBeforeRender()
	{

		if ($this->app->isClient('administrator'))
		{
			return;
		}

		if ($this->params->get('js_inline') != '')
		{
			$this->app->getDocument()->getWebAssetManager()->addInlineScript($this->params->get('js_inline'));
		}
	}
}
