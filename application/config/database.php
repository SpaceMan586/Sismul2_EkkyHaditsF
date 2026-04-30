<?php
defined('BASEPATH') OR exit('Akses langsung tidak diizinkan.');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn'      => 'sqlite:' . APPPATH . 'database/sismul2.sqlite',
    'hostname' => '',
    'username' => '',
    'password' => '',
    'database' => '',
    'dbdriver' => 'pdo',
    'subdriver' => 'sqlite',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt'  => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);