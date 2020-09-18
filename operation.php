<?php include "template/nav.php"; ?>
<?php include "template/header.php"; ?>

<h2>Réaliser une opération</h2>
<form class="mt-5 fullForm" method="post" action="">
  <div class="form-group">
    <label for="countType">Choisissez votre compte</label>
    <select class="form-control" id="countType" name="countType">
      <option value="courant">Courant</option>
      <option value="livreta">Livret A</option>
      <option value="pel">PEL</option>
      <option value="pea">PEA</option>
      <option value="perp">PERP</option>
    </select>
  </div>
  <div class="form-group">
    <label for="opération">Type d'opération</label>
    <select class="form-control" id="opération" name="opération">
      <option value="deposit">Dépot</option>
      <option value="withdrawal">Retrait</option>
    </select>
  </div>
  <div class="form-group">
    <label for="amount">Montant en euros</label>
    <input type="number" name="amount" id="amount" min="0" value="0">
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-info">Exécuter</button>
  </div>
</form>
<?php include "template/footer.php"; ?>
