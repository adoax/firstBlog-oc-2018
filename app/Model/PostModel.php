<?php

namespace App\Model;

class PostModel extends Model{

	protected $model = 'articles';

	/**
	* Recupére les derniers articles
	*  @return array
	*/
	public function last(){
		return $this->query("
			SELECT articles.id, articles.titre, articles.textAlt, articles.contenu,  articles.datetime, articles.file, categories.titre as categories
			FROM articles
			LEFT JOIN categories ON category_id = categories.id
			ORDER BY articles.datetime DESC
			");
	}
	
	public function editAdminComment(){
		return $this->query("
			SELECT commentaires.id, commentaires.auteur, commentaires.commentaire, commentaires.moderation, commentaires.date_commentaire, articles.titre as titres
			FROM commentaires
			LEFT JOIN articles ON articles.id = id_billet 
			ORDER BY date_commentaire DESC
			");
	}
	/**
	* Recupére un article en lien la catogorie associé
	*  @param $id int
	*  @return \App\Entity\PostEntity
	*/
	public function findWithCategory($id){
		return $this->query("
			SELECT articles.id, articles.titre, articles.contenu, articles.textAlt, DATE_FORMAT(articles.datetime, '%Y-%m-%dT%H:%i') AS datetimes, articles.file,  categories.titre as categories
			FROM articles
			LEFT JOIN categories ON category_id = categories.id
			WHERE articles.id = ?
			", [$id], true);
	}


	public function getComment($id){
		return $this->query("
		SELECT commentaires.id, commentaires.auteur, commentaires.id_user,  commentaires.moderation,commentaires.commentaire, DATE_FORMAT(commentaires.date_commentaire, '%d/%m/%Y à %Hh%i') AS date_commentaire_fr 
		FROM commentaires 
		LEFT JOIN articles ON articles.id = commentaires.id_billet
		WHERE commentaires.id_billet = ?
		ORDER BY commentaires.date_commentaire DESC
		", [$id]);
	}
	
	public function EditComment($id){
		return $this->query("
			SELECT commentaires.id, commentaires.auteur,  commentaires.id_user, commentaires.moderation,commentaires.commentaire, commentaires.date_commentaire, articles.titre as titres
			FROM commentaires
			LEFT JOIN articles ON articles.id = id_billet 
			WHERE commentaires.id = ?
			", [$id]);
	}

		/**
		 * Rcupére la data ou l'article à étais posté
		 * @param $id int
		 * @return \App\views\post\show
		 */
	public function timeForShow($id){
		return $this->query("
			SELECT articles.id, articles.titre, articles.textAlt, articles.contenu,  DATE_FORMAT(articles.datetime, 'Le %d/%m/%Y à %Hh%i') AS datetimes, articles.file, categories.titre as categories
			FROM articles
			LEFT JOIN categories ON category_id = categories.id
			WHERE articles.id = ?", [$id], true);
	}

	/**
	* Recupére les derniers articles de la category demandée
	*  @param $category_id int
	*  @return array
	*/
	public function lastByCategory ($category_id){
		return $this->query("
			SELECT articles.id, articles.titre, articles.contenu, articles.textAlt, articles.datetime, articles.file, categories.titre as categorie
			FROM articles
			LEFT JOIN categories ON category_id = categories.id
			WHERE articles.category_id = ? 
			ORDER BY articles.datetime DESC", [$category_id]);
	}


	/**
	 * Recupére les imformations demandé pour ce connecté/enregisté
	 */
	public function Register(){
		return $this->query("
		SELECT users.id, users.username, users.password, users.role, users.email
		FROM users");
	}


}