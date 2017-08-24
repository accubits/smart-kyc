<?php
/**
 * Created by PhpStorm.
 * User: reshman
 * Date: 1/8/17
 * Time: 12:09 PM
 */

global $db, $config, $error;
include '../libraries/header.php';
include 'Seeds.php';

$seeds = new Seeds($db, $config, $error);
$seeds->addRoles([
    'SUPER_ADMIN',
    'SCHOOL_ADMIN'
]);

if ($seeds->rolesCheckByName("SUPER_ADMIN")) {
    $seeds->addSuperAdmin($seeds->rolesCheckByName("SUPER_ADMIN"));
}
