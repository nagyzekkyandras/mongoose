{* Smarty *}
<h3>Account informations:</h3>
<p id=email>Email: {$email} </p>
<p>Name: {$name} </p>
<p>Permission: {$permission} </p>
<p>Auth type: {$auth_type} </p>
<p>Create Date: {$create_date} </p>

<h3>Password change:</h3>
<form method="POST">
<div class="mb-3">
  <label for="inputPassword1" class="form-label">Password</label>
  <input type="password" name="password1" class="form-control" id="inputPassword1">
</div>
<div class="mb-3">
  <label for="inputPassword2" class="form-label">Password again</label>
  <input type="password" name="password2" class="form-control" id="inputPassword2">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>