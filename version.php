<?php

/**
 * This plugin sends an email to a specified user after
 * it has detected a config setting was changed when
 * running cron. The to and from email addresses can
 * be changed in the settings page.
 *
 * @package    local
 * @subpackage configlogemailer
 * @copyright  2013 Alex Rowe - Study Group
 * @author     Alex Rowe arowe@studygroup.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 
$plugin->version  = 2013082201;   // The (date) version of this plugin
$plugin->requires = 2012120300;   // Requires this Moodle version
$plugin->release = '1.0 (Build: 2013072201)';
$plugin->maturity = MATURITY_BETA;
$plugin->component = 'local_configlogemailer';
