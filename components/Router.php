<?php

$uri = $_SERVER['REQUEST_URI'];

if ($uri === '/') {
  require_once("controllers/CommentsController.php");
  $comments = new CommentsController();
  $comments->actionIndex();
} elseif ($uri === '/card') {
  require_once("controllers/CardController.php");
  $card = new CardController();
  $card->actionIndex();
} elseif ($uri === '/comments/all') {
  require_once("controllers/CommentsController.php");
  $comments = new CommentsController();
  $comments->actionAll();
} elseif ($uri === '/comments/add') {
  require_once("controllers/CommentsController.php");
  $comments = new CommentsController();
  $comments->actionAdd();
} else {
  require_once("controllers/CommentsController.php");
  $comments = new CommentsController();
  $comments->actionIndex();
}
