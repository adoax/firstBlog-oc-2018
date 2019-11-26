<h1 class="text-center pb-5">Modifier les catégories</h1>


<p>
	<a href="?p=admin.categories.add" class="btn btn-success">Ajouter</a>
	<a href="?p=admin.posts.index" class="btn btn-info">Modifier les articles</a>
</p>
<table class="table"> 

	<thead>
		<tr>
			<td>ID</td>
			<td>Titre</td>
			<td>Actions</td>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($items as $category): ?>
		<tr>
			<td><?= $category->id; ?></td>
			<td><?= $category->titre; ?></td>
			<td>
				<a class="btn btn-primary" href="?p=admin.categories.edit&id=<?= $category->id; ?>">Editer</a>
				<form action="?p=admin.categories.delete" method="post" style="display: inline;">
					<input type="hidden" name="id" value=" <?= $category->id; ?>">
					<button type="submit" class="btn btn-danger" onclick="clicked(event)">Supprimer</button>
				</form>
			</td>
		</tr>
			
		<?php endforeach ?>
	</tbody>
</table>