<h1 class="text-center pb-5">Bienvenue sur la section ADMIN</h1>


		  
<p>
	<a href="?p=admin.posts.add" class="btn btn-success">Ajouter</a>
	<a href="?p=admin.categories.index" class="btn btn-info">Modifier les catégories</a>
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
		<?php foreach ($posts as $post): ?>
		<tr>
			<td><?= $post->id; ?></td>
			<td><?= $post->titre; ?></td>
			<td>
				<a class="btn btn-primary" href="?p=admin.posts.edit&id=<?= $post->id; ?>">Éditer</a>
				<form action="?p=admin.posts.delete" method="post" style="display: inline;">
					<input type="hidden" name="id" value=" <?= $post->id; ?>">
					<button type="submit" class="btn btn-danger" onclick="clicked(event)" href="?p=admin.posts.delete&id=<?= $post->id; ?>">Supprimer</button>
				</form>
			</td>
		</tr>
			
		<?php endforeach ?>
	</tbody>
</table>

