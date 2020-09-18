<?php
require "data/acounts.php";
include "template/nav.php";
include "template/header.php";
?>

<?php
if(isset($_GET) && !empty($_GET)):
  $pos = htmlspecialchars($_GET["id"]);
  $account = get_accounts()[$pos];
  if ($account):
?>
    <h2>Vos comptes bancaires</h2>
    <div class="row mt-5">
      <div class="col-12 col-md-6 col-lg-4">
        <article class="card">
          <div class="card-header">
            <h5 class="card-title"><?php echo $account["name"]; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $account["number"]; ?></h6>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush border-bottom mb-2">
              <li class="list-group-item">Propriétaire : <?php echo $account["owner"]; ?></li>
              <li class="list-group-item">Solde : <?php echo $account["amount"]; ?></li>
              <li class="list-group-item">Dernière opération : <?php echo $account["last_operation"]; ?></li>
            </ul>
            <a href="#" class="btn btn-info">Côturer</a>
            <a href="operation.html" class="btn btn-info">Dépot/retrait</a>
            <a href="#" class="btn btn-info">Voir</a>
          </div>
        </article>
      </div>
    </div>
  <?php endif; ?>
<?php else: ?>
  <div class="alert alert-danger">
    <p>Nous avons rencontré un problème, aucun compte ne correspond à votre demande</p>
  </div>
<?php endif; ?>

<?php include "template/footer.php"; ?>
