<?php
define('CONFIGS_DIR', __DIR__.'/configs');
define('MODELS_DIR', __DIR__.'/models');
define('CONTROLLERS_DIR', __DIR__.'/controllers');
define('VIEWS_DIR', __DIR__.'/views');

set_include_path(get_include_path().PATH_SEPARATOR.CONFIGS_DIR.PATH_SEPARATOR.MODELS_DIR.PATH_SEPARATOR.CONTROLLERS_DIR.PATH_SEPARATOR.VIEWS_DIR);

include('settings.php');
include('model.php');
include('controller.php');

include('layout.php');
