<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center"><?php if($_GET['acao']=='atualizar-animal') echo 'Atualizar Animal'; else echo 'Cadastrar Animal'; ?>
        </h3><hr>  
        <form role="form" name="animal" method="POST" action="views.php" enctype="multipart/form-data">
        <input type="hidden" name="acao" value="<?php if($_GET['acao']=='atualizar-animal') echo 'up-animal'; else echo 'add-animal'; ?>">
			<input type="hidden" name="idanimal" value="<?php if(isset($row['idanimal'])) echo $row['idanimal']; ?>">
                <!-- Campo img -->
                <input type="hidden" name="imagem" value="<?php if(isset($row['img'])) echo $row['img'];?>">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-1 control-label">
						Imagem:
					</label>
					<div class="col-sm-5">
						<input class=" form-control" type="file" name="img"><br>
					</div>
				</div>

				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">
                        Nome:
                    </label>
                    <div class="col-sm-5">
                        <input type="text" name="nome" class="form-control" value="<?php if(isset($row['nome'])) echo $row['nome']; ?>" required><br>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">
                        Brinco:
                    </label>
                    <div class="col-sm-5">
                        <input type="text" name="brinco" class="form-control" value="<?php if(isset($row['brinco'])) echo $row['brinco']; ?>" required><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">
                        Sexo:
                    </label>
                    <div class="col-sm-5">
                        <select name="sexo" class="form-control" required>
            				<option value="<?php if(isset($row['sexo'])) echo $row['sexo'];?>">
            					<?php if(isset($row['sexo'])) echo $row['sexo'];  else echo 'Selecione'; ?>
            				</option>
                            <option value="Macho">Macho</option>
                            <option value="Femea">Femea</option>
                        </select><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">
                        Especie:
                    </label>
                    <div class="col-sm-2">
                        <select name="especie" class="form-control" required>
                            <option value="<?php if(isset($row['especie'])) echo $row['especie'];?>">
                            	<?php if(isset($row['especie'])) echo $row['especie'];  else echo 'Selecione'; ?>
                            </option>
                            <option value="Caprino">Caprino</option>
                            <option value="Bovino">Bovino</option>
                            <option value="Suíno">Suíno</option>
                            <option value="Equino">Equino</option>
                            <option value="Ovino">Ovino</option>
                        </select><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">
                        Raça:
                    </label>
                    <div class="col-sm-2">
                        <input type="text" name="raca" class="form-control" value="<?php if(isset($row['raca'])) echo $row['raca']; ?>"><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">
                        Altura(m):
                    </label>
                    <div class="col-sm-5">
                        <input type="text" name="altura" class="form-control" value="<?php if(isset($row['altura'])) echo $row['altura']; ?>"><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">
                        Nacimento:
                    </label>
                    <div class="col-sm-5">
                        <input type="date" name="data_de_nascimento" class="form-control" value="<?php if(isset($row['data_de_nascimento'])) echo $row['data_de_nascimento']; ?>" required><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">
                        Compra:
                    </label>
                    <div class="col-sm-5">
                        <input type="date" name="data_de_compra" class="form-control" value="<?php if(isset($row['data_de_compra'])) echo $row['data_de_compra']; ?>" required><br>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">
                        Microchip:
                    </label>
                    <div class="col-sm-5">
                        <input type="number" name="microchip" class="form-control" value="<?php if(isset($row['microchip'])) echo $row['microchip']; ?>"><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">
                        Genético:
                    </label>
                    <div class="col-sm-5">
                        <input type="text" name="grupo_genetico" class="form-control" value="<?php if(isset($row['grupo_genetico'])) echo $row['grupo_genetico']; ?>"><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">
                        Pelagem:
                    </label>
                    <div class="col-sm-5">
                        <input type="text" name="pelagem" class="form-control" value="<?php if(isset($row['pelagem'])) echo $row['pelagem']; ?>"><br>
                    </div>
                </div>
               <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">
                        Destinação:
                    </label>
                    <div class="col-sm-5">
                        <select name="destinacao" class="form-control">
                            <option value="<?php if(isset($row['destinacao'])) echo $row['destinacao'];?>">
                            	<?php if(isset($row['destinacao'])) echo $row['destinacao'];  else echo 'Selecione'; ?>
                            </option>
                            <option value="Abete">Abate</option>
                            <option value="Lactacao">Lactação</option>
                            <option value="Leilão">Leilão</option>
                        </select><br>
                    </div>
                </div>
 				<div class="form-group">
					<label for="inputEmail3" class="col-sm-1 control-label">
						Mãe:
					</label>
					<div class="col-sm-5">
						<select class="form-control" name="idmae">
							<option value="<?php if(isset($row['animal_idmae'])) echo $row['animal_idmae']; else echo 0;?>"><?php if(isset($row['nome_mae'])) echo $row['nome_mae'];?></option>
							<?php 
		                        $mae = $_POST['mae'];
		                        while($rows = $mae->fetch_assoc()){
		                        	if($rows['sexo']=='Femea'){
		                            echo '
		                            <option value="'.$rows['idanimal'].'">
		                                '.$rows['nome'].'
		                            </option>';
		                            }
		                        }
							?>
						</select><br>
					</div>
				</div>
 				<div class="form-group">
					<label for="inputEmail3" class="col-sm-1 control-label">
						Pai:
					</label>
					<div class="col-sm-5">
						<select class="form-control" name="idpai">
							<option value="<?php if(isset($row['animal_idpai'])) echo $row['animal_idpai']; else echo 0; ?>"><?php if(isset($row['nome_pai'])) echo $row['nome_pai']; ?></option>
							<?php 
		                        $pai = $_POST['pai'];
		                        while($rows = $pai->fetch_assoc()){
		                        	if($rows['sexo']=='Macho'){
		                            echo '
		                            <option value="'.$rows['idanimal'].'">
		                                '.$rows['nome'].'
		                            </option>';
		                            }
		                        }
							?>
						</select><br>
					</div>
				</div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">
                       Anotação:
                    </label>
                    <div class="col-sm-9">
                         <textarea name="observacao"  placeholder="Observações" class="form-control" value="rghr" rows="2"><?php if(isset($row['observacao'])) echo $row['observacao']; ?></textarea><br>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="text-center">
                        <input class="btn btn-lg btn-primary" type="submit" value="<?php if($_GET['acao']=="atualizar-animal") echo 'Atualizar'; else echo 'Cadastrar' ?>">
                    </div>
                </div>
        </form>
    </div>
</div>