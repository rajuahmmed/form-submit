<?php
require_once 'loader.php';
// var_dump($_REQUEST);



if ( ! empty( $_REQUEST['p'] ) ) {
	if ( 'add' === $_REQUEST['p'] || 'add/' === $_REQUEST['p'] ) {
		$page = new Form();
	} else {
		$page = new Not_Found();
	}
} else {
	$page = new Entry_List();
}

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $page->get_title(); ?></title>

	<link rel="stylesheet" href="<?php echo ROOT_URL; ?>css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="<?php echo ROOT_URL; ?>css/datatables.min.css">
	<link rel="stylesheet" href="<?php echo ROOT_URL; ?>css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="<?php echo ROOT_URL; ?>css/select2.min.css">
	<link rel="stylesheet" href="<?php echo ROOT_URL; ?>css/app.css">
</head>
<body>
	<div class="wrapper">
		<div class="wrapper-inner">
			<h1><?php echo $page->get_title(); ?></h1>
			<?php $page->render(); ?>
		</div>
	</div>

	<script>
		var site_url = '<?php echo ROOT_URL; ?>';
	</script>
	<script src="<?php echo ROOT_URL; ?>js/jquery-3.5.1.min.js"></script>
	<script src="<?php echo ROOT_URL; ?>js/datatables.min.js"></script>
	<script src="<?php echo ROOT_URL; ?>js/dataTables.responsive.min.js"></script>
	<script src="<?php echo ROOT_URL; ?>js/select2.min.js"></script>
	<script src="<?php echo ROOT_URL; ?>js/app.js"></script>
</body>
</html>