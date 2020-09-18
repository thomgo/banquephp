<?php include "template/nav.php"; ?>
<?php include "template/header.php"; ?>

<h2>Ouvrir un compte</h2>
<form class="mt-5 fullForm" method="post" action="">
  <div class="form-group">
    <label for="countType">Type de compte</label>
    <select class="form-control" id="countType" name="countType">
      <option value="courant">Courant</option>
      <option value="livreta">Livret A</option>
      <option value="pel">PEL</option>
      <option value="pea">PEA</option>
      <option value="perp">PERP</option>
    </select>
</div>
<div class="form-group">
  <label for="amount">Montant à l'ouverture</label>
  <input type="number" name="amount" id="amount" min="51" value="51">
</div>
<div class="text-center">
  <button type="submit" class="btn btn-info">Ouvrir</button>
</div>
</form>

  <?php include "template/footer.php"; ?>
