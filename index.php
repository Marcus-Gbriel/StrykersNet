<?php

/**
 * 
 * Arquivo de entrada do sistema
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 */

date_default_timezone_set('America/Sao_Paulo');
define('DOCUMENT_ROOT', __DIR__);

require_once DOCUMENT_ROOT . '/core/core.php';

$core = new core();
new router($core);
