<!-- USERS -->
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
            <hr>

            <a href="<?= base_url('users/create') ?>" class="btn btn-success">Cadastrar Usuário</a>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Email</th>
                        <th scope="col">Opções</th>
                        <!-- <th scope="col">CPF</th>
                                   <th scope="col">CNS</th>
                                   <th scope="col">Endereço</th>
                                   <th scope="col">Foto</th>
                                   <th scope="col">Ações</th> -->

                    </tr>
                </thead>

                <tbody>
                    <?php foreach($users as $user) :?>
                    <tr>
                        <th scope="row"><?= $user->id ?></th>
                        <td><?= $user->username ?></td>
                        <td><?= $user->email ?></td>
                        <td>
                            <a href="<?= base_url('users/edit/'. $user->id)?>" class="btn btn-warning">Editar</a>
                            <a href="<?= base_url('users/delete/'. $user->id)?>" class="btn btn-danger" 
                            onclick="return confirm('Deseja realmente excluir o usuário?');" >Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
            <hr>
            <a href="<?= base_url('/') ?>" class="btn btn-info"> Voltar</a>
        </div>
    </div>
</section>