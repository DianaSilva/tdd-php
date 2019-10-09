<?php

use Diana\Apostas\Model\UsuarioTeste;

require 'vendor/autoload.php';

$test = new UsuarioTeste();
$test-> validarNome('diana', 'dian');