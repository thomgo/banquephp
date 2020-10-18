<?php
require "model/connexion.php";

// Function used to log the user
function get_user_by_email($db, $user) {
  $query = $db->prepare("SELECT * FROM User WHERE email = :email");
  $query->execute([
    "email" => $user->getEmail()
  ]);
  $query->setFetchMode(PDO::FETCH_CLASS, 'User');
  return $query->fetch();
}
