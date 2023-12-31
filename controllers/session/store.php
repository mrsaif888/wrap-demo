<?php

use Core\App;
$db = App::resolve(Database::class);

$errors = [];
if (!Validator::email($email)) {
   $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a valid password ';
}

if(! empty($errors)){
    return view('sessions/create.view.php',[
        'errors' => $errors
    ]);
}

$db->query('select * from users where email = :email',[
    'email' => $email
])-find();

if ($user){
   
    if (password_verify($password, $user['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        login([
            'email' => $email
        ]);
    
        header('location: /');
        exit();
    } 
}



return view('sessions/create.view.php',[
    'errors' => [
        'email' => 'No Matching account found for that email address and password.'
    ]
    ]);

