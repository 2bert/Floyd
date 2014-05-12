<!doctype html>
<html lang='en'> 
<head>
  <meta charset='utf-8'/>
  <title><?=$title?></title>
	<link rel='shortcut icon' href='<?=$favicon?>'/>
  <link rel='stylesheet' href='<?=$stylesheet?>'/>
</head>
<body>
  <div id='wrap-header'>
    <div id='header'>
    <div id='login-menu'>
        <?=login_menu()?>
      </div>
      <div id='banner'>
        <a href='http://www.student.bth.se/~jobe14/phpmvc/floyd5/'><img class='site-logo' src='<?=$logo?>' alt='logo' width='<?=$logo_width?>' height='<?=$logo_height?>' /></a>
        <p class='site-title'><a href='http://www.student.bth.se/~jobe14/phpmvc/floyd5/'><?=$header?></a></p>
        <p class='site-slogan'><?=$slogan?></p>
    </div>
    </div>
  </div>
    <div id='wrap-main'>
    <div id='main' role='main'>
      <?=get_messages_from_session()?>
      <?=@$main?>
      <?=render_views()?>
    </div>
  </div>
  <div id='wrap-footer'>
    <div id='footer'>
      <?=$footer?>
      <?=get_debug()?>
    </div>
  </div>
</body>
</html>