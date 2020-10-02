<?php
require "model/connexion.php";

function get_accounts($db, $user) {
  $query = $db->prepare("SELECT * FROM Account WHERE user_id = :user_id");
  $query->execute([
    "user_id" => $user["id"]
  ]);
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

function get_single_accounts($db, $id) {
  $query = $db->prepare("SELECT * FROM Account WHERE id = :id");
  $query->execute([
    "id" => $id
  ]);
  return $query->fetch(PDO::FETCH_ASSOC);
}
