<section id="patients" data-stellar-background-ratio="2.5">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <!-- SECTION TITLE -->
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <h2><?= $title ?></h2>
                </div>
            </div>

            <strong><?= $msg ?></strong>

            <p><a href="<?php echo base_url('administrativo') ?>" class="btn btn-success">Lista de Usuários</a></p>
            <hr>

            <?php if($errors != '') : ?>
            <ul style="color:red">
                <?php foreach($errors as $error):?>
                <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

    

            <form method='post'>
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" value="<?= (isset($user)? $user->id : '')?>">
                    <label for="exampleInputEmail1">Usuário</label>
                    <input type="text" name="username" class="form-control" value="<?= (isset($user)? $user->username : '')?>" placeholder="Usuário">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="<?= (isset($user)? $user->email : '')?>" placeholder="Digite o seu melhor e-mail">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" 
                    value="<?= (isset($user)? $user->password : '')?>" placeholder="Senha">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Lembre-me</label>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary" value="<?= $action?>">Cadastrar</button>
            </form>
        </div>
    </div>
</section>