<?php
require "model/connexion.php";

function get_accounts($db, $user) {
  $query = $db->prepare(
    "SELECT a.id, a.amount, a.opening_date, a.account_type, o.amount AS operation_amount, o.registered, o.label
     FROM Account AS a
     LEFT JOIN (
    	  SELECT o1.* FROM Operation as o1
        LEFT JOIN Operation AS o2
        ON o1.account_id = o2.account_id
        AND o1.id < o2.id
        WHERE o2.id IS NULL
    ) AS o
    ON a.id = o.account_id
    WHERE user_id = :user_id"
  );
  $query->execute([
    "user_id" => $user["id"]
  ]);
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

function get_single_account($db, $id) {
  $query = $db->prepare(
    "SELECT a.*, o.id AS operation_id, o.operation_type, o.amount AS operation_amount, o.label, o.registered FROM Account AS a
     LEFT JOIN Operation AS o
     ON a.id = o.account_id
     WHERE a.id = :id
     ORDER BY operation_id DESC
  ");
  $query->execute([
    "id" => $id
  ]);
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

function get_only_account($db, $id) {
  $query = $db->prepare(
    "SELECT id, amount FROM Account
     WHERE id = :id"
   );
  $query->execute([
    "id" => $id
  ]);
  return $query->fetch(PDO::FETCH_ASSOC);
}

function get_account_list($db, $user) {
  $query = $db->prepare(
    "SELECT id, account_type, amount FROM Account
    WHERE user_id = :user_id"
  );
  $query->execute([
    "user_id" => $user["id"]
  ]);
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

function update_account_amount($db, $account) {
  $query = $db->prepare(
    "UPDATE Account
    SET amount = :amount
    WHERE id = :id"
  );
  $result = $query->execute([
    "amount" => $account["amount"],
    "id" => $account["id"]
  ]);
  return $result;
}
