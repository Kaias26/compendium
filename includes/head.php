<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $page_title;?></title>
<meta name="description" content="<?php echo $page_desc;?>" />
<meta name="keywords" content="<?php echo $page_key;?>" />

<!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdn.datatables.net/v/bs5/dt-2.0.8/r-3.0.2/rg-1.5.0/datatables.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="/css/styles.css" rel="stylesheet" >

<!-- Bootstrap core JavaScript  -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-2.0.8/r-3.0.2/rg-1.5.0/datatables.min.js"></script>

<script type="text/javascript">
	var dataTables_options = {};
</script>

<?php if( $folder == 'charactersheet' ) {?>
	<link href="/css/charactersheet.css" rel="stylesheet" >
	<script src="/js/charactersheet.js?20220104"></script>
<?php }?>

<?php if( $folder == 'tools' && ( $group == "generateurBijoux" || $group == "generateurNoms" ) ) {?>
	<link href="/css/generateurs.css" rel="stylesheet" >
	<script src="/js/generateurs.js?20220104"></script>
<?php }?>

<?php if( $folder == 'tools' && ( $group == "combatRapide" ) ) {?>
	<link href="/css/combatRapide.css" rel="stylesheet" >
	<script src="/js/combatRapide.js?20250805"></script>
<?php }?>

<script src="/js/functions.js?20220104"></script>