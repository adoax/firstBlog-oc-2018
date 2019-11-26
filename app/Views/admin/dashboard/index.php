<div class="row">
    <div class="col-md-10"><h1 class="text-center">Bienvenue  </h1></div>   
        <div class="row col-md-2 ">
            <div class="col-md-12 pb-md-1"> <a href="?p=admin.posts.index" class="btn btn-info">Gestion des articles</a></div>
        <div class="w-100 d-none d-md-block"></div>
    <div class="col-md-12 pb-md-1"> <a href="?p=admin.posts.listComment" class="btn btn-info">Gestion des commentaires</a></div>
    </div>
</div>




<div class="row">
    <div class="col-mb-4">
        <div class="list-group">
            <?php for ($i = 0; $i < 5; $i++): ?>
                <a class="list-group-item text-center <?= $annees - $i === $this_annees ? 'active' : '';?>" href="index.php?p=admin.dashboard.index&annee=<?= $annees - $i?>"><?= $annees - $i ?></a>
                <?php if ($annees - $i === $this_annees): ?>
                <div class="list-group">
                    <?php foreach ($mois as $numero => $month): ?>                    
                        <a class="list-group-item text-left <?= (string)$numero === $this_mois ? 'active' : '';?>" href="index.php?p=admin.dashboard.index&annee=<?= $this_annees ?>&mois=<?=$numero ?>">
                            <?= $month ?>
                        </a>                
                    <?php endforeach ?>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
            </div>
    </div>
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <strong style="font-size:3em;"><?= $views ?></strong><br> visite<?= $views > 1 ? 's' : '' ?>
                </div>
            </div>
            <?php if (isset($views_details)): ?>
            <h2 class="text-center mb-4">Détails des visites pour le mois</h2>
            <table class="table table-striped table-hover text-center">
                <thead> 
                    <tr>
                        <th>Jour</th>
                        <th>Nombre de visite</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($views_details as $ligne): ?>
                    <tr>
                        <td><?= $ligne['jour'] ?></td>
                        <td><?= $ligne['visites'] ?> visite<?= $ligne['visites'] >1 ? 's' :  '' ?> </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
</div>

