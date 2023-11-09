<?php

$cfg = require __DIR__ . '/../vendor/mediawiki/mediawiki-phan-config/src/config.php';

$cfg['directory_list'] = array_merge(
	$cfg['directory_list'],
	[
		'../../extensions/Translate',
		'../../extensions/MassMessage',
		'../../extensions/CentralAuth',
		'../../extensions/SiteMatrix',
	]
);

$cfg['exclude_analysis_directory_list'] = array_merge(
	$cfg['exclude_analysis_directory_list'],
	[
		'../../extensions/Translate',
		'../../extensions/MassMessage',
		'../../extensions/CentralAuth',
		'../../extensions/SiteMatrix',
	]
);

$cfg['exclude_file_list'] = array_merge(
	$cfg['exclude_file_list'],
	[
		'../../extensions/MassMessage/.phan/stubs/Event.php',
		'../../extensions/MassMessage/.phan/stubs/EchoEventPresentationModel.php'
	]
);

return $cfg;
