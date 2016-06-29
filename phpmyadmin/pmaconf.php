<?php
/**
 * INCLUDE FOLLOW LINE IN PMA-SUBFOLDER
 */
//include_once "../pmaconf.php";


$cfg['blowfish_secret'] = '';


$i = 0;
$i++;

/* NORMAL LOGIN */
//$cfg['Servers'][$i]['auth_type'] = 'cookie';

/* SERVERCONFIG */
$cfg['Servers'][$i]['host'] = 'localhost';
$cfg['Servers'][$i]['connect_type'] = 'tcp';
$cfg['Servers'][$i]['compress'] = false;
$cfg['Servers'][$i]['AllowNoPassword'] = true;

/* AUTOLOGINN */
$cfg['Servers'][$i]['auth_type'] = 'config';
$cfg['Servers'][$i]['user'] = 'root';
$cfg['Servers'][$i]['password'] = '';


$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';

?>
