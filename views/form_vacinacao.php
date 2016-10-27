<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">Agendar Vacinação</h3><hr>  
        <form role="form" method="POST" action="views.php">
            <input type="hidden" name="acao" value="add-vacinacao">
                <!-- -->
 				<div class="form-group">
					<label for="inputEmail3" class="col-sm-1 control-label">
						Animal:
					</label>
					<div class="col-sm-11">
						<select class="form-control" name="animal" required>
							<option>Selecione</option>
							<?php 
		                        $animal = $_POST['animal'];
		                        while($rows = $animal->fetch_assoc()){
		                            echo '
		                            <option value="'.$rows['idanimal'].'">
		                                '.$rows['brinco'].'
		                            </option>';
		                        }
							?>
						</select><br>
					</div>
				</div>
                <!-- -->
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">
                        Vacina:
                    </label>
                    <div class="col-sm-11">
                        <select class="form-control" name="vacina" required>
                            <option>Selecione</option>
                            <?php 
                                $vacina = $_POST['vacina'];
                                while($rows = $vacina->fetch_assoc()){
                                    echo '
                                    <option value="'.$rows['idvacina'].'">
                                        '.$rows['descricao'].'
                                    </option>';
                                }
                            ?>
                        </select><br>
                    </div>
                </div>
                <!-- -->
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">
                        Data:
                    </label>
                    <div class="col-sm-11">
                        <input type="date" name="data" class="form-control" required><br>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="text-center">
                        <input class="btn btn-primary" type="submit" value="Agendar">
                    </div>
                </div>
        </form>
    </div>
</div>