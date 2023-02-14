<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Form Validation</title>
  </head>
  <body>
    <div class= "container">
    <h1>Form Validation</h1>
    <?php if(isset($validation))   :?>
        <div class= "text-danger">
            <?=$validation->listErrors() ?>
            </div>
            <?php endif; ?>
  
    <form method ="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name= "email" value= "<?= set_value('email')  ?>"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name= "password" value= "<?= set_value('password')  ?>"type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Category</label>
    <select name= "category" class ="form-control">
        <option value=""></option>
        <?php foreach($categories as $cat) :  ?>
        <option <?= set_select('category', $cat, TRUE)  ?> value = "<?= $cat ?>" > <?= $cat?></option>t
        <?php endforeach; ?>
        </select>
  </div>
          
  <div class="form-group">
    <label for="date">Date</label>
    <input name= "date" value= "<?= set_value('date')  ?>"type="date" class="form-control" id="date" >
  </div>
  <div class="form-group">
  <label for="exampleFormControlFile1">Upload File</label>
    <input type= "file" multiple name= "theFile[]" class="form-control-file" id="exampleFormControlFile1" >
  </div>
          <?php
          echo '<pre>';
          print_r($_POST);
          echo'<pre>';
           ?>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>