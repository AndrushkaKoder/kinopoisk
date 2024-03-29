<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 *
 */
?>
<!DOCTYPE html>
<html lang="<?php  echo LANG?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" href="/assets/admin/css/adminlte.css">
	<link rel="stylesheet" href="/assets/admin/css/app.css">
	<title><?= SITE_NAME . ' | Администратор'?></title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php $view->component('admin.components.header') ?>
<?php $view->component('admin.components.sidebar') ?>
