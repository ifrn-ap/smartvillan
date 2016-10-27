<br><br><br><br><div class="text-center"><h3><span id="mes" style="color: white;"></span></h3><hr></div>
<div class="row">
	<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered" style="background: white;">
					<thead id="thead" style="background: #0000AA;">
						<tr id="dia">
							<th class="text-center">S</th>
							<th class="text-center">T</th>
							<th class="text-center">Q</th>
							<th class="text-center">Q</th>
							<th class="text-center">S</th>
							<th class="text-center">S</th>
						</tr>
						<tbody class="text-center">
							<tr>
								<td id="2"></td>
								<td id="3"></td>
								<td id="4"></td>
								<td id="5"></td>
								<td id="6"></td>
								<td id="7"></td>
							</tr>
							<tr>
								<td id="9"></td>
								<td id="10"></td>
								<td id="11"></td>
								<td id="12"></td>
								<td id="13"></td>
								<td id="14"></td>
							</tr>
							<tr>
								<td id="16"></td>
								<td id="17"></td>
								<td id="18"></td>
								<td id="19"></td>
								<td id="20"></td>
								<td id="21"></td>
							</tr>
							<tr>
								<td id="23"></td>
								<td id="24"></td>
								<td id="25"></td>
								<td id="26"></td>
								<td id="27"></td>
								<td id="28"></td>
							</tr>
							<tr id="fev">
								<td id="30"></td>
								<td id="31"></td>
								<td id="32"></td>
								<td id="33"></td>
								<td id="34"></td>
								<td id="35"></td>
							<tr>
							<tr id="extra">
								<td id="36"></td>
								<td id="37"></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</thead>
				</table>
		</div>
	</div>
</div>
<?php 
	$data=date('Y')."-".date('m')."-01";
	$ano =  substr("$data", 0, 4);
    $mes =  substr("$data", 5, -3);
    $dia =  substr("$data", 8, 9);
    $diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );
    switch($diasemana) {
        case"0": $diasemana =1; break;
        case"1": $diasemana = 2; break;
        case"2": $diasemana = 3; break;
        case"3": $diasemana = 4; break;
        case"4": $diasemana = 5; break;
        case"5": $diasemana = 6; break;
        case"6": $diasemana = 7; break;
    }
    echo'
    	<script src="js/calendario.js"></script>
    	<script type="text/javascript">calender('.$diasemana.', '.date("m").','.date("Y").','.date("d").');</script>
    	<script type="text/javascript">marcar_vacina('.$diasemana.', '.date("m").','.date("Y").','.date("d").', 8);</script>
    	<script type="text/javascript">marcar_ordenha('.$diasemana.', '.date("m").','.date("Y").','.date("d").', 11);</script>
    ';
    while($row = $_POST['vacinacao']->fetch_assoc()){
    	list($ano, $mes, $dia) = explode('-', $row['data']);
    	if($mes==date("m")){
			echo'
				<script type="text/javascript">marcar_vacina('.$diasemana.', '.date("m").','.date("Y").','.date("d").', '.$dia.');</script>
			';
    	}
    }

    while($row = $_POST['ordenha']->fetch_assoc()){
    	list($ano, $mes, $dia) = explode('-', $row['data_de_ordenha']);
    	if($mes==date("m")){
			echo'
				<script type="text/javascript">marcar_ordenha('.$diasemana.', '.date("m").','.date("Y").','.date("d").', '.$dia.');</script>
			';
    	}
    }
?>