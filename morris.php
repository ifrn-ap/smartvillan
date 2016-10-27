<?php 
    $control = new Controlador;
    if(isset($_GET['acao'])){
        if($_GET['acao']=="add-painel"){ 
            $bouvinos=$control->contar_especie('Bovino');
            $suinos=$control->contar_especie('Suino');
            $caprinos=$control->contar_especie('Caprino');
            $ouvinos=$control->contar_especie('Ovino');
            $equino=$control->contar_especie('Equino');
            $macho=$control->contar_sexo('Macho');
            $femea=$control->contar_sexo('Femea');
            ?>
            <script type="text/javascript">
                $(function(){
                    Morris.Bar({
                        element: 'morris-especie',
                        data: [
                            {z: 'Bovinos', a: <?php echo $bouvinos; ?>},
                            {z: 'Suinos', a: <?php echo $suinos; ?>},
                            {z: 'Caprinos', a: <?php echo $caprinos; ?>},
                            {z: 'Ouvinos', a: <?php echo $ouvinos; ?>},
                            {z: 'Equinos', a: <?php echo $equino; ?>},
                        ],
                        xkey: 'z',
                        ykeys: ['a'],
                        labels: ['Quantia'],
                        hideHover: 'auto',
                        resize: true
                    });
                    // Donut Chart
                    Morris.Donut({
                        element: 'morris-sexo',
                        data: [{
                            label: "Macho",
                            value: <?php echo $macho; ?>
                        }, {
                            label: "Femea",
                            value: <?php echo $femea; ?>
                        }],
                        resize: true
                    });
                });
            </script>
        <?php }
        if($_GET['acao']=="perfil-animal"){ ?>
            <script type="text/javascript">
                $(function(){
                    // Line Chart
                    Morris.Line({
                        element: 'morris-peso',
                        data: [
                        <?php
                	        $peso = $control->listar_peso();
                	        while($row=$peso->fetch_assoc()){ 
                		        echo"
                			        {
                			        	d: '".$row['data_de_pesagem']."',
                			            peso: ".$row['peso'].",
                			        },
                		    	"; 
                	    	}
                        ?>
                        ],
                        xkey: 'd',
                        ykeys: ['peso'],
                        labels: ['Peso(kg)'],
                        resize: true
                    });

                    Morris.Line({
                        element: 'morris-lactacao',
                        data: [
                        <?php
                	        $leite = $control->lactacao();
                	        while($row=$leite->fetch_assoc()){ 
                		        echo"
                			        {
                			        	a: '".$row['data_de_ordenha']."',
                			            quantidade: '".$row['quantidade']."',
                			        },
                		    	"; 
                	    	}
                        ?>
                        ],
                        xkey: 'a',
                        ykeys: ['quantidade'],
                        labels: ['Quantidade(L)'],
                        resize: true
                    });
                });
            </script>
        <?php } 
        if($_GET['acao']=="gerar-relatorio"){ 
            if($_GET['tipo']=="material_grafico"){
                $item=$control->puchar_item();
                ?>
                <script type="text/javascript">
                    $(function(){
                        Morris.Bar({
                            element: 'morris-material',
                            data: [
                            <?php
                                $item = $control->puchar_item();
                                while($row=$item->fetch_assoc()){ 
                                    echo"
                                        {z: '".$row['descricao']."', quantia: '".$row['quantidade']."'},
                                    "; 
                                }
                            ?>
                            ],
                            xkey: 'z',
                            ykeys: ['quantia'],
                            labels: ['Disponibilidade'],
                            hideHover: 'auto',
                            resize: true
                        });
                    });
                </script>
            <?php }
            if($_GET['tipo']=="estoque_grafico"){
                $item=$control->puchar_item();
                ?>
                <script type="text/javascript">
                    $(function(){
                        Morris.Bar({
                            element: 'morris-estoque',
                            data: [
                            <?php
                                $item = $control->puchar_estoque();
                                while($row=$item->fetch_assoc()){ 
                                    echo"
                                        {z: '".$row['descricao']."', quantia: '".$row['disponibilidade']."'},
                                    "; 
                                }
                            ?>
                            ],
                            xkey: 'z',
                            ykeys: ['quantia'],
                            labels: ['Disponibilidade'],
                            hideHover: 'auto',
                            resize: true
                        });
                    });
                </script>
            <?php }
            if($_GET['tipo']=="saida_grafico"){
                $item=$control->puchar_item();
                ?>
                <script type="text/javascript">
                    $(function(){
                        Morris.Bar({
                            element: 'morris-saida',
                            data: [
                            <?php
                                $item = $control->puchar_saida();
                                while($row=$item->fetch_assoc()){ 
                                    echo"
                                        {z: '".$row['data']."', quantia: '".$row['quantidade']."'},
                                    "; 
                                }
                            ?>
                            ],
                            xkey: 'z',
                            ykeys: ['quantia'],
                            labels: ['Quantidade'],
                            hideHover: 'auto',
                            resize: true
                        });
                    });
                </script>
            <?php }
            if($_GET['tipo']=="entrada_grafico"){
                $item=$control->puchar_item();
                ?>
                <script type="text/javascript">
                    $(function(){
                        Morris.Bar({
                            element: 'morris-entrada',
                            data: [
                            <?php
                                $item = $control->puchar_entrada();
                                while($row=$item->fetch_assoc()){ 
                                    echo"
                                        {z: '".$row['data']."', quantia: '".$row['quantidade']."'},
                                    "; 
                                }
                            ?>
                            ],
                            xkey: 'z',
                            ykeys: ['quantia'],
                            labels: ['Quantidade'],
                            hideHover: 'auto',
                            resize: true
                        });
                    });
                </script>
            <?php }
        }
    }
?>