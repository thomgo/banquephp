<?php
require "model/connexion.php";

function get_accounts($db) {
  $query = $db->query("SELECT * FROM Account");
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

function get_single_accounts($db, $id) {
  $query = $db->prepare("SELECT * FROM Account WHERE id = :id");
  $query->execute([
    "id" => $id
  ]);
  return $query->fetch(PDO::FETCH_ASSOC);
}
