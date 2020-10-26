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

            <p><a href="<?= base_url('pacientes') ?>" class="btn btn-success">Lista de Pacientes</a></p>
            <hr>

            <?php if($errors != '') : ?>
            <ul style="color:red">
                <?php foreach($errors as $error):?>
                <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <form method='post' name="form">
                <div class="row">
                    <input type="hidden" name="id_patient" value="<?= (isset($patient)? $patient->id : '')?>">
                    <div class="form-group col-6 col-md-6">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" name="name" class="form-control"
                            value="<?= (isset($patient)? $patient->name : '')?>"
                            placeholder="Nome Completo do Paciente">
                    </div>
                    <div class="form-group col-6 col-md-6">
                        <label for="exampleInputEmail1">Nome da Mãe</label>
                        <input type="text" name="mother_name" class="form-control"
                            value="<?= (isset($patient)? $patient->mother_name : '')?>"
                            placeholder="Nome Completo da Mãe">
                    </div>

                    <div class="form-group col-4 col-md-4">
                        <label for="exampleInputEmail1">Data de Nascimento</label>
                        <input type="date" name="birthday" class="form-control"
                            value="<?= (isset($patient)? $patient->birthday : '')?>">
                    </div>
                    <div class="form-group col-4 col-md-4">
                        <label for="exampleInputEmail1">CPF</label>
                        <input type="text" name="cpf" id="cpf" class="form-control cpf" onBlur="ValidarCPF(form.cpf);" onKeyPress="MascaraCPF(form.cpf);" maxlength="14"
                            value="<?= (isset($patient)? $patient->cpf : '')?>" placeholder="695.878.691-25">
                    </div>
                    <div class="form-group col-4 col-md-4">
                        <label for="exampleInputEmail1">CNS</label>
                        <input type="text" name="cns" class="form-control" onBlur="validateCns(form.cns);" onKeyPress="MascaraCNS(form.cns);" maxlength="18"
                            value="<?= (isset($patient)? $patient->cns : '')?>" placeholder="926 3428 9103 0018">
                    </div>
                    <div class="form-group col-12 col-md-12">
                        <label for="exampleFormControlFile1">Foto do Paciente</label>
                        <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1"
                            value="<?= (isset($patient)? $patient->photo : '')?>">
                    </div>


                    <input type="hidden" name="id_patient" value="<?= (isset($patient)? $patient->id : '')?>">


                    <div class="form-group col-2 col-md-2">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" id="cep" class="form-control cep" onKeyPress="MascaraCep(form.cep)" onBlur="ValidaCep(form.cep)" maxlength="10"
                            value="<?= (isset($patient)? $patient->cep : '')?>" autofocus required placeholder="Somente os números do CEP">
                    </div>

                    <div class="form-group col-4 col-md-4">
                        <label for="address">Endereço</label>
                        <input type="text" name="address" id="rua" class="form-control" id="inputpatient"
                            placeholder="Área Rural de Marília"
                            value="<?= (isset($patient)? $patient->address : '')?>">
                    </div>
                    <div class="form-group col-4 col-md-2">
                        <label for="number">Numero</label>
                        <input type="text" name="number" class="form-control" id="number"
                            placeholder="505"
                            value="<?= (isset($patient)? $patient->number : '')?>">
                    </div>
                    <div class="form-group col-4 col-md-4">
                        <label for="complement">Complemento</label>
                        <input type="text" name="complement" class="form-control" id="complement"
                            placeholder="Apartamento 102, Bloco 04"
                            value="<?= (isset($patient)? $patient->complement : '')?>">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="district">Bairro</label>
                            <input type="text" name="district" id="bairro" class="form-control" id="inputCity"
                                value="<?= (isset($patient)? $patient->district : '')?>"
                                placeholder="Área Rural de Marília">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="city">Cidade</label>
                            <input type="text" name="city" id="cidade" class="form-control" id="inputState"
                                value="<?= (isset($patient)? $patient->city : '')?>" placeholder="Marília">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="state">Estado</label>
                            <input type="text" name="state" id="uf" class="form-control" id="inputZip"
                                value="<?= (isset($patient)? $patient->state : '')?>" placeholder="SP">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">País</label>
                            <input type="text" name="country" class="form-control" id="inputZip"
                                value="<?= (isset($patient)? $patient->country : '')?>" placeholder="Brasil">
                        </div>
                    </div>

                    <div class="form-group col-12 col-md-12">
                        <label for="exampleInputEmail1">Usuário responsável</label>
                        <?= $comboUsers ?>
                    </div>

                    <div class="form-group col-12 col-md-12">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Lembre-me</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" value="<?= $action?>">Cadastrar</button>
            </form>
        </div>
    </div>
</section>