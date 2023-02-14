
<?= $this->extend('layouts/main') ?>
<?= $this->section('content')?>

    <h1><?= $title?></h1>

   <div class ="row">
   <div class= "col-12 col-md-8 offset-md-2">

   <form method="post">
    <div class="form-group">
        <label for="">Title</label>
        <input id="" class="form-control" type="text" name="post_title" value=" <?= $post['post_title']?>" >
    </div>
    <div class="form-group">
            <label for="" >Text</label>
            <textarea id="" class="form-control" name="post_content" rows="3"> <?=$post['post_content']?> </textarea>
        </div>
        <br>
    <div class="form-group">
        <button class="btn btn-success btn-sm">Update</button>
    </div>
   </form>
   </div>
   </div>

   <?= $this->endSection()?>