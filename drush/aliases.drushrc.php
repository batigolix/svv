<?php

$aliases['dev'] = array(
  'uri' => 'svv.test',
  'root' => '/var/www/web',
  'path-aliases' => array(
    '%files' => 'sites/default/files',
  ),
);

$aliases['acc'] = array(
  'parent' => '@svv.stage',
);

$aliases['live'] = array(
  'parent' => '@svv.live',
);
