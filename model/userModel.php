<?php
require "model/connexion.php";

function get_user_by_email($db, $post_data) {
  $query = $db->prepare("SELECT * FROM User WHERE mail = :email");
  $query->execute([
    "email" => $post_data["mail"]
  ]);
  return $query->fetch(PDO::FETCH_ASSOC);
}
