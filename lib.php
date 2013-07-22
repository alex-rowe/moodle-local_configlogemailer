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
 
function local_configlogemailer_cron() {
    global $CFG, $DB;
    
    // Create the from and to users
    $from = get_admin();
    $to = get_admin();
    // Overwrite the email address with the local plugin settings
    $to->email = get_config('local_configlogemailer','to_email');
    // Check when the last cron was run, if it was the first time, then make it the current time
    $lastcron = get_config('local_configlogemailer','lastcron');
    if (empty($lastcron)) {
        $lastcron = time();
    }

    $from->email = get_config('local_configlogemailer','from_email');
    $from->firstname = get_config('local_configlogemailer','from_firstname');
    $from->lastname = get_config('local_configlogemailer','from_lastname');
    
    $subject = get_string('subject', 'local_configlogemailer');
    $messagetext = get_string('messagetext', 'local_configlogemailer',$CFG->wwwroot)
    
    $sql = "SELECT u.firstname, u.lastname, cl.timemodified, cl.plugin, cl.name, cl.value, cl.oldvalue
            FROM {config_log} cl
            JOIN {user} u ON u.id = cl.userid
            WHERE cl.timemodified >= $lastcron
            ORDER BY cl.timemodified DESC";
    $rs = $DB->get_recordset_sql($sql);
    if ($rs->valid()) {
        foreach ($rs as $log) {
            $messagetext .= date('Y-m-d H:i:s', $log->timemodified) . ' | ';
            $messagetext .= $log->firstname . ' ' . $log->lastname . ' | ';
            if (is_null($log->plugin)) {
                $plugin = 'core';
            } else {
                $plugin = $log->plugin;
            }
            $messagetext .= $plugin . ' | ';
            $messagetext .= $log->name . ' | ';
            $messagetext .= $log->value . ' | ';
            $messagetext .= $log->oldvalue . '
';
        }
        $rs->close();
        email_to_user($to, $from, $subject, $messagetext);
    }
}