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
 
$string['pluginname'] = 'Config Log Emailer';
$string['subject'] = 'There have been Moodle Site config changes';
$string['messagetext'] = 'Changes made on: {$a}
    
    Date | Name | Plugin | Setting | New Value | Old Value
';
$string['to_email_title'] = 'Send to email';
$string['to_email_description'] = 'Who do you want to send the email to';
$string['to_email_default'] = '{$a}';
$string['from_email_title'] = 'Send from email';
$string['from_email_description'] = 'Who do you want to send the email from';
$string['from_email_default'] = '{$a}';
$string['from_firstname_title'] = 'Send from firstname';
$string['from_firstname_description'] = 'What is the first name of the sender';
$string['from_firstname_default'] = '{$a}';
$string['from_lastname_title'] = 'Send from lastname';
$string['from_lastname_description'] = 'What is the last name of the sender';
$string['from_lastname_default'] = '{$a}';
