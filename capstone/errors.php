<?php  if (count($errors) > 0) : ?>
<!-- erros of login/logout page-->
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>