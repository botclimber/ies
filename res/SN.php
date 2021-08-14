<?php

class Feed {

	private $posts = [];

	function getPosts(){ return $this->posts; }
	
	/**
	add new post to the feed

	@param Post $post 
	@return void
	*/
	function addPost(Post $post)
	{
		$post->setId(count($this->posts));
		array_push($this->posts, $post);
	}

	
	/**
	delete post form feed

	@param Post $post
	@param Author $author user that wants to delete the post 
	@return void
	*/
	function delPost(Post $post, Author $author)
	{
		$author_id = $author->getId();

		if ($author_id == $post->getAuthor()->getId())
			unset($this->posts[$post->getId()]);
		else throw new Exception("no permission to delete this post");
	}

}

class Author{
	private $id;
	private $name;

	function __construct(int $id, string $name){
		$this->id = $id;
		$this->name = $name;
	}

	function getId(){ return $this->id; }
	function getName(){ return $this->name; }
}

class Content {

	protected $id;
	protected $text;
	protected $author;

	function __construct(string $text, Author $author){
		$this->text = $text;
		$this->author = $author;
	}

	function setId($id){ $this->id = $id; }

	function getId(){ return $this->id; }
	function getText(){ return $this->text; }
	function getAuthor(){ return $this->author; }

}


class Post extends Content{

	private $title;
	private $comments = [];

	function __construct(string $title, string $text, Author $author){
		$this->title = $title;
		$this->text = $text;
		$this->author = $author;

	}

	function getTitle(){ return $this->title; }
	function getComments(){ return $this->comments; }



	/**
	add new comment to specific post

	@param Comment $comment
	@return void

	*/
	function addComment(Comment $comment)
	{
		$comment->setId(count($this->comments));
		array_push($this->comments, $comment);
	}


	/**
	delete comment from specific post

	@param Comment $comment
	@param Author $author user that wants to delete the comment
	@return void

	*/
	function delComment(Comment $comment, Author $author /* user info that pretends to delete the comment */)
	{
		$author_id = $author->getId();

		if (($author_id == $comment->getAuthor()->getId()) or ($author_id == $this->author->getId()))
			unset($this->comments[$comment->getId()]);
		else throw new Exception("no permission to delete this comment");
	}
}

class Comment extends Content{}

?>
