<?php

$router->get('wrap-demo','/', 'controllers/index.php');
$router->get('wrap-demo','/about', 'controllers/about.php');
$router->get('wrap-demo','/contact', 'controllers/contact.php');

$router->get('wrap-demo','/notes', 'controllers/notes/index.php')->only('auth');
$router->get('wrap-demo','/note', 'controllers/notes/show.php');
$router->delete('wrap-demo','/note', 'controllers/notes/destroy.php');

$router->get('wrap-demo','/note/edit', 'controllers/notes/edit.php');
$router->patch('wrap-demo','/note', 'controllers/notes/update.php');

$router->get('wrap-demo','/notes/create', 'controllers/notes/create.php');
$router->post('wrap-demo','/notes', 'controllers/notes/store.php');

$router->get('wrap-demo','/register', 'controllers/registration/create.php')->only('guest');
$router->post('wrap-demo','/register', 'controllers/registration/store.php');

$router->get('wrap-demo','/login', 'controllers/session/create.php')->only('guest');
$router->post('wrap-demo','/session', 'controllers/session/store.php')->only('guest');
$router->delete('wrap-demo','/session', 'controllers/session/destroy.php')->only('auth');


