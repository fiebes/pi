<?php
    require_once('include/header.php');
    $sql = "SELECT nome, x, y, questao FROM pontuacao WHERE idCont=".$_SESSION['idUsuario_Logado'];
	   $query = mysql_query($sql);
     $dadosPontuacao = $query;
     $dadosArray = array();
     while ($rs = mysql_fetch_array($dadosPontuacao)) {
       $dadosArray[] = array('nome' => $rs['nome'], 'x' => $rs['x'], 'y' => $rs['y']);
     }
 ?>
	<div id="meio" class="" style="width: 100%;">
		<center><h3 style="color: rgb(100,115,255);">Sua pontua&ccedil;&atilde;o em cada Hist&oacute;ria</h3></center>
		<div class="cont_grafico">
		<div id="grafico">
			<div class="rango_normal">
				<p class="">Meta</p>
			</div>
			<div class="numeros">
				<span>Max.</span>
			</div>
			<div class="indice">
				<div class="cont_tri"></div>
				<div class="cont_puntos"></div>
			</div>
		</div><!-- /grafico -->
		<div class="cont_fechas">
			<div class="fechas"></div>
		</div>
	</div>
	</div>
	<div id="sub_rodape" class=""></div>
	<div id="rodape" style="width: 100%; height: 40px; background-color: rgb(11, 94, 215); margin-top: 10.2%;" class=""></div>
	</div>

</body>
<script src="js/tes.js"></script>
 <script type="text/javascript">

var coords = {
	"rango_general": {
		"min": 40,
		"max": 120
	},
	"rango_normal": {
		"min": 63,
		"max": 85
	},
	"evaluaciones":{
    <?php
      for ($i=0; $i < count($dadosArray); $i++) {
        echo '"ponto'.$i.'": {';
        echo '"x":'.$dadosArray[$i]['x'].',';
        echo '"y":'.$dadosArray[$i]['y'].',';
        echo '"fecha": "'.$dadosArray[$i]['nome'].'"';
        echo '},';
        }
    ?>
	}
}

// CREACIÓN DEL OBJETO Y GRÁFICO
// -----------------------------
var miGrafico = new MansoGrafico(coords);
miGrafico.crearPuntos();
miGrafico.crearRangoGeneral();
miGrafico.crearRangoNormal();
miGrafico.arrastrando();
miGrafico.toolTipValorPunto();
miGrafico.triangulos();
miGrafico.traerFechas();
	 </script>
	  <style type="text/css">

	 </style>
</html>
<?php
  include_onde('include/footer.php');
?>
