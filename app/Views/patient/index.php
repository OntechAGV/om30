    <!-- PATIENTS -->
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

                <p><a href="<?= base_url('patients/create') ?>" class="btn btn-success">Cadastrar Paciente</a>
                </p>
                <hr>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Nome da Mãe</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">CPF</th>
                            <th scope="col">CNS</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($patients as $patient) :?>
                        <tr>
                            <th scope="row"> <?= $patient->id ?> </th>
                            <td> <?= $patient->name ?> </td>
                            <td> <?= $patient->mother_name ?> </td>
                            <td> <?= $patient->birthday ?> </td>
                            <td> <?= $patient->cpf ?> </td>
                            <td> <?= $patient->cns ?> </td>
                            <td> <?= $patient->photo ?> </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    Abrir
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-fluid" role="document" style="width: 80%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Endereço</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Endereço</th>
                                                            <th scope="col">Complemento</th>
                                                            <th scope="col">Cidade</th>
                                                            <th scope="col">Bairro</th>
                                                            <th scope="col">Estado</th>
                                                            <th scope="col">País</th>
                                                            <th scope="col">Cep</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?= $patient->address ?></td>
                                                            <td><?= $patient->complement ?></td>
                                                            <td><?= $patient->city ?></td>
                                                            <td><?= $patient->district ?></td>
                                                            <td><?= $patient->state ?></td>
                                                            <td><?= $patient->country ?></td>
                                                            <td><?= $patient->cep ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Fechar</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <a href="<?= base_url('patients/edit/'. $patient->id)?>"
                                    class="btn btn-warning">Editar</a>
                                <a href="<?= base_url('patients/delete/'. $patient->id)?>" class="btn btn-danger"
                                    onclick="return confirm('Deseja realmente excluir o paciente?');">Excluir</a>
                            </td>
                        </tr>
                    </tbody>

                    <?php endforeach?>

                </table>
                <hr>
                <a href="<?= base_url('/') ?>" class="btn btn-info"> Voltar</a>