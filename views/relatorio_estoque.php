<h3 class="text-center">Materiais em Estoque</h3><hr>
<?php if($_POST['estoque']->num_rows>0){?>        
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Categoria</th>
                        <th>Descrição</th>
                        <th>Cadastro</th>
                        <th>Validade</th>
                        <th>Disponiveis</th>
                        <th>Valor</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $control = new Controlador;
                        while($row = $_POST['estoque']->fetch_assoc()){
                            $row['data_cadastro'] = $control->data($row['data_cadastro']);
                            $row['validade'] = $control->data($row['validade']);
                            echo'
                                <tr>
                                    <td>'.$row['iditem'].'</td>
                                    <td>'.$row['nome'].'</td>
                                    <td>'.$row['descricao'].'</td>
                                    <td>'.$row['data_cadastro'].'</td>
                                    <td>'.$row['validade'].'</td>
                                    <td>'.$row['disponibilidade'].'</td>
                                    <td>R$ '.$row['valor'].'</td>
                                </tr>
                            ';
                        }
                    ?>                               
                </tbody>
             </table>
        </div>
    </div>
</div>
<?php
  }else{
    echo '<div class="alert alert-danger"><h7><center>Nada em estoque</center></h7></div>';
  }
?>