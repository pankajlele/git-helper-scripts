<?php
$gitmodules = file_get_contents('.gitmodules');
$submodules = preg_split('/\[submodule(.*)\]/', $gitmodules);
foreach ($submodules as $submoduleSpec) {
	if (! empty($submoduleSpec)) {
		preg_match('/path = (.*)/',  $submoduleSpec, $pathMatch);
		preg_match('/url = (.*)/',  $submoduleSpec, $urlMatch);
		$command = 'git submodule add '.$urlMatch[1].' '.$pathMatch[1];
		system($command);
	}
}
?>