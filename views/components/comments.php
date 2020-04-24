<?php include_once('views/components/comment.php') ?>
<?php include_once('views/components/form.php') ?>
<?php include_once('views/components/success.php') ?>

<script type="text/x-template" id="comments">
<div>
  <div v-if="comments">
    <Comment
            v-for="comment of comments"
            :id="comment.id"
            :name="comment.name"
            :email="comment.email"
            :text="comment.text"
            :key="comment.id"
    />
  </div>
  <div class="loading" v-else>Загрузка...</div>
  <Success v-if="isSuccess"/>
  <Form :setComments="setComments" :success="success"/>
</div>
</script>
