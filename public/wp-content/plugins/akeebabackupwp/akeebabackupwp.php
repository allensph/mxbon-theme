<?php
/**
 * @package   solo
 * @copyright Copyright (c)2014-2023 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */

/*
Plugin Name: Akeeba Backup Professional for WordPress
Plugin URI: https://www.akeeba.com
Description: The complete backup solution for WordPress
Version: 7.7.6
Author: Akeeba Ltd
Author URI: https://www.akeeba.com
Network: true
License: GPLv3
*/

/**
 * Make sure we are being called from WordPress itself
 */
defined('WPINC') or die;

/**
 * This should never happen unless your site is broken! It'd mean that you're double loading our plugin which is not how
 * WordPress works. We still defend against this because we've learned to expect the unexpected ;)
 */
if (defined('AKEEBA_SOLOWP_PATH'))
{
	return;
}

// Preload our helper classes
require_once dirname(__FILE__) . '/helpers/AkeebaBackupWP.php';
require_once dirname(__FILE__) . '/helpers/AkeebaBackupWPUpdater.php';

// Initialization of our helper class
AkeebaBackupWP::preboot_initialization(__FILE__);

/**
 * Redirect to the ANGIE installer if the installer currently exists
 */
AkeebaBackupWP::redirectIfInstallationPresent();

/**
 * Register public plugin hooks
 */
register_activation_hook(__FILE__, ['AkeebaBackupWP', 'install']);

/**
 * Register the plugin updater hooks (if necessary)
 */
AkeebaBackupWP::loadIntegratedUpdater();

/**
 * Register administrator plugin hooks
 */
if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX))
{
	add_action('admin_menu', ['AkeebaBackupWP', 'adminMenu']);
	add_action('network_admin_menu', ['AkeebaBackupWP', 'networkAdminMenu']);

	if (!AkeebaBackupWP::$wrongPHP)
	{
		add_action('init', ['AkeebaBackupWP', 'startSession'], 1);
		add_action('init', ['AkeebaBackupWP', 'loadJavascript'], 1);
		add_action('plugins_loaded', ['AkeebaBackupWP', 'fakeRequest'], 1);
		add_action('wp_logout', ['AkeebaBackupWP', 'endSession']);
		add_action('wp_login', ['AkeebaBackupWP', 'endSession']);
		add_action('in_admin_footer', ['AkeebaBackupWP', 'clearBuffer']);
		add_action('clear_auth_cookie', ['AkeebaBackupWP', 'onUserLogout'], 1);
	}
}
elseif(defined('DOING_AJAX') && DOING_AJAX)
{
	if (!AkeebaBackupWP::$wrongPHP)
	{
		add_action('init', ['AkeebaBackupWP', 'startSession'], 1);
		add_action('plugins_loaded', ['AkeebaBackupWP', 'fakeRequest'], 1);

		add_action('wp_ajax_akeebabackup_api', ['AkeebaBackupWP', 'jsonApi'], 1);
		add_action('wp_ajax_nopriv_akeebabackup_api', ['AkeebaBackupWP', 'jsonApi'], 1);

		add_action('wp_ajax_akeebabackup_legacy', ['AkeebaBackupWP', 'legacyFrontendBackup'], 1);
		add_action('wp_ajax_nopriv_akeebabackup_legacy', ['AkeebaBackupWP', 'legacyFrontendBackup'], 1);

		add_action('wp_ajax_akeebabackup_check', ['AkeebaBackupWP', 'frontendBackupCheck'], 1);
		add_action('wp_ajax_nopriv_akeebabackup_check', ['AkeebaBackupWP', 'frontendBackupCheck'], 1);
	}
}

// Register WP-CLI commands
if (defined('WP_CLI') && WP_CLI)
{
	if (file_exists(__DIR__ . '/wpcli/register_commands.php'))
	{
		require_once __DIR__ . '/wpcli/register_commands.php';
	}
}
