<?php
try {
  $db = new PDO('mysql:host=localhost;dbname=banque_php', "root", "ThomAdmin12");
} catch (\Exception $e) {
  echo "Erreur lors de la conenxion à la base de donée: " . $e->getMessage() . "<br/>";
  die();
}
