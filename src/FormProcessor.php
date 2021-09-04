<?php

require './Validators/FormValidator.php';
require './Users/Models/User.php';
require './Users/UserBO.php';

use Users\Models\User;
use Users\UserBO;
use Validators\FormValidator;

$userParams = $_POST['user'];
$user = new User(
    $userParams['name'],
    $userParams['email'],
    $userParams['birthdate'],
    $userParams['instagram'],
    $userParams['gender'],
    $userParams['hobbies']
);
$validator = new FormValidator($user);

if ($validator->validate()) {
    $userBO = new UserBO($user);

    $age = $userBO->calculateAge();
    $userData = array_merge($user->toArray(), array('age' => $age));
    $parsedUser = urlencode(serialize($userData));

    header("Location: /index.php?user_response=$parsedUser");
} else {
    $errors = urlencode(serialize($validator->getErrors()));
    header("Location: /index.php?errors=$errors");
}
?>
