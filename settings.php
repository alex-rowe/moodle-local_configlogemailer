<?php
defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {

    $from = get_admin(); 

    $settings = new admin_settingpage('local_configlogemailer', 'Config Log Emailer');
    $ADMIN->add('localplugins', $settings);

    $name = 'local_configlogemailer/to_email';
    $title = get_string('to_email_title','local_configlogemailer');
    $description = get_string('to_email_description','local_configlogemailer');
    $default = get_string('to_email_default','local_configlogemailer');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $settings->add($setting);

    $name = 'local_configlogemailer/from_email';
    $title = get_string('from_email_title','local_configlogemailer');
    $description = get_string('from_email_description','local_configlogemailer');
    $default = get_string('from_email_default','local_configlogemailer',$from->email);
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $settings->add($setting);

    $name = 'local_configlogemailer/from_firstname';
    $title = get_string('from_firstname_title','local_configlogemailer');
    $description = get_string('from_firstname_description','local_configlogemailer');
    $default = get_string('from_firstname_default','local_configlogemailer',$from->firstname);        
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $settings->add($setting);

    $name = 'local_configlogemailer/from_lastname';
    $title = get_string('from_lastname_title','local_configlogemailer');
    $description = get_string('from_lastname_description','local_configlogemailer');
    $default = get_string('from_lastname_default','local_configlogemailer',$from->lastname);        
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $settings->add($setting);
}