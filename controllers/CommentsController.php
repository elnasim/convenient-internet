<?php

require_once 'models/Comments.php';


class CommentsController
{

  public function actionIndex()
  {
    include_once("views/comments.php");
  }

  public function actionAll()
  {
    $comments = new Comments();
    $data     = $comments->all();
    echo json_encode($data);
  }

  public function actionAdd()
  {
    $data = [
      'name'  => $_POST['name'],
      'email' => $_POST['email'],
      'text'  => $_POST['text'],
    ];

    if (trim($data['name']) === '' || trim($data['email']) === '' || trim($data['text']) === '') {
      return;
    }

    $comments = new Comments();
    $comments->add($data);

    return $this->actionAll();
  }
}
