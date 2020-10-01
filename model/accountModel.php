<?php
function get_accounts($db) {
  $query = $db->query("SELECT * FROM Account");
  return $query->fetchAll(PDO::FETCH_ASSOC);
}
