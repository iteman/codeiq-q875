<?php
/*
 * Copyright (c) 2014 KUBO Atsuhiro <kubo@iteman.jp>,
 * All rights reserved.
 *
 * This program and the accompanying materials are made available under
 * the terms of the BSD 2-Clause License which accompanies this
 * distribution, and is available at http://opensource.org/licenses/BSD-2-Clause
 */

error_reporting(E_ALL | E_STRICT | E_DEPRECATED);

$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->addPsr4('Iteman\CodeIQ\Q875\\', 'test');

unset($loader);
