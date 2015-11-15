<?php
    function renderPage($ksiega)
    {
        if ($ksiega == 'index') {
            include sprintf('%s.html', $ksiega);
        } else if ($ksiega == 'reflection') {
            include sprintf('%s.php', $ksiega);
        } else {
            include sprintf('ksiega%d.html', $ksiega);
        }
    }
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pan Tadeusz</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="startbootstrap-simple-sidebar/css/simple-sidebar.css">
</head>
<body>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">Spis treści</li>
                <?php for ($i = 1; $i <= 12; $i++) { ?>
                    <li>
                        <a href="<?= sprintf('?ksiega=%d', $i) ?>">Księga <?= $i ?></a>
                    </li>
                <?php } ?>
                <li>
                    <a href="?ksiega=reflection">Wyślij reflaksję</a>
                </li>
            </ul>
        </div>

        <div id="page-content-wrapper">
		<div class="page-header">
  			<h1>Pan Tadeusz</h1>
		</div>
            <div class="container-fluid">               
                <div class="row">
                    <?php renderPage($_GET['ksiega']) ?>
                </div>
            </div>
	<div class="panel-footer"><p>
  Pracownia programowanie V
<p></div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</body>
</html>