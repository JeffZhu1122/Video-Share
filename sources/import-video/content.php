<?php 
if (IS_LOGGED == false || $pt->config->import_system != 'on') {
	header("Location: " . PT_Link('login'));
	exit();
}

$content         = 'content';
$max_import      = $pt->config->user_max_import;

if ($pt->user->is_pro != 1) {
	if ($pt->user->imports >= $max_import) {
		$content = "buy_pro";
	}
}

$pt->page = 'import-video';
$pt->title = $lang->import_new_video . ' | ' . $pt->config->title;
$pt->description = $pt->config->description;
$pt->keyword = $pt->config->keyword;
$pt->content = PT_LoadPage("import-video/$content");