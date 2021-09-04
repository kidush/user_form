
<?php require_once('./layouts/header.php'); ?>

<div class="container">

<?php 
if (isset($_GET['user_response'])) {
    $userData = unserialize(urldecode($_GET['user_response']));

    echo "<div class='row'>
              <div class='col'>
                  <div class='alert alert-success' role='alert'>
                     <p class='fs-5'>Nome: {$userData['name']}</p>
                     <p class='fs-5'>E-mail: {$userData['email']}</p>
                     <p class='fs-5'>Sua idade é: {$userData['age']}</p>
                     <p class='fs-5'>Instagram: @{$userData['instagram']}</p>
                  </div>
              </div>
         </div>";
} elseif (isset($_GET['errors'])) {
    $errors = unserialize(urldecode($_GET['errors']));
    echo '<div class="row">
              <div class="col">
                  <div class="alert alert-danger" role="alert">';
    foreach($errors as $key => $error) {
        echo $error . '<br>';
    }
    echo '</div>
              </div>
         </div>';
}
?>
    <h1>Usuário</h1>
    <hr>
    <div class="row">
        <form action="src/FormProcessor.php" method="post">
            <div class="mb-3">
                <label for="user[name]" class="form-label">Nome</label>
                <input type="text" class="form-control" id="user_name" placeholder="John Doe" name="user[name]">
            </div>
            <div class="mb-3">
                <label for="user[email]" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="user_email" placeholder="john@doe.com" name="user[email]">
            </div>
            <div class="mb-3">
                <label for="user[birthdate]" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="user_birthdate" name="user[birthdate]">
            </div>
            <div class="mb-3">
                <label for="user[instagram]" class="form-label">Instagram</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" id="user_instagram" name="user[instagram]">
                </div>
            </div>
            <div class="mb-3">
                Gênero:
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="user[gender]" id="gender_m", value='M'>
                    <label class="form-check-label" for="user[gender]">
                       Masculino 
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="user[gender]" id="gender_f" value='F' checked>
                    <label class="form-check-label" for="user[gender]">
                        Feminino 
                    </label>
                </div>
            </div>

            <div class="mb-3">
                Hobbies: <br>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="user[hobbies][]" value="ler" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Ler
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="user[hobbies][]" value="futebol" id="flexCheckChecked" checked>
                  <label class="form-check-label" for="flexCheckChecked">
                    Futebol 
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="user[hobbies][]" value="viajar" >
                  <label class="form-check-label" for="flexCheckChecked">
                    Viajar 
                  </label>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Enviar">
        </form>
    </div>
</div>
<?php require_once('./layouts/footer.php'); ?>
