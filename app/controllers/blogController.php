<?php

class blogController{

	function __construct(){

		$this->view = new vibius\core\View();
		$this->url = new vibius\core\Url();
		$this->articles = new vibius\app\models\articles();
		$this->validate = new vibius\plugins\Validate();

	}


	public function homePage(){

		/*
				GET ALL ARTICLES FROM DATABASE
		*/
		$this->articles->deleteByID('8');
		$articles = $this->articles->getAll();

		/*
				DISPLAY OUR ARTICLES
		*/

		$articleView = $this->view->load('article');

		$data['articles'] = '';
		foreach($articles as $article){
					$d['title'] = substr($article['title'],0,40).' ...';
					$d['text'] = substr($article['text'],0,100).' ...';
					$d['author'] = substr($article['author'],0,20).' ...';
					$d['datetime'] = $article['date_created'];
					$d['id'] = $article['id'];
					$d['more'] = true;
					$this->view->sanitize();
					$data['articles'] .= $articleView->vars($d)->getView();
		}
		$this->view->sanitize(false);
		$this->view->load('homepage')->vars($data)->display();

	}

	public function newArticle(){

		$required = array('post:title','post:text','post:author');

		if(!$this->validate->exists($required)){
			header('Location: '.$this->url->to(''));
			return;
		}

		$this->articles->insert($_POST['title'],$_POST['text'],$_POST['author']);
		header('Location: '.$this->url->to(''));
	}

	public function deleteArticle($id){

		$this->articles->deleteById($id);
		header('Location: '.$this->url->to(''));
	}

	public function showArticle($id){

		/*
				GET ARTICLE FROM DATABASE
		*/

		$articles = $this->articles->getByID($id);

		/*
				DISPLAY OUR ARTICLE
		*/

		$articleView = $this->view->load('article');

		$data['articles'] = '';
		foreach($articles as $article){
					$d['title'] = $article['title'];
					$d['text'] = $article['text'];
					$d['author'] = $article['author'];
					$d['datetime'] = $article['date_created'];
					$d['id'] = $article['id'];
					$d['more'] = false;

					$this->view->sanitize();
					$data['articles'] .= $articleView->vars($d)->getView();
		}
		$this->view->sanitize(false);
		$this->view->load('homepage')->vars($data)->display();

	}

}
