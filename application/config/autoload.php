<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('database', 'email', 'session', 'form_validation', 'firebase', 'parser','encryption');
$autoload['drivers'] = array();
$autoload['helper'] = array('url', 'file', 'general', 'db', 'smcsession', 'smcproject', 'cookie', 'anjprint');
$autoload['config'] = array('firebase');
$autoload['language'] = array();
$autoload['model'] = array();
