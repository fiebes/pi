<?php
class Menu {
  public function listaMenu(){
    $sql  = "SELECT * FROM menu";
    $sql  = mysql_query($sql);

    echo "<div id='meio' class='' style='width: 100%;'>
  	        <div class='row'>&nbsp;</div>
        	  <div class='row'>&nbsp;</div>
        	  <div class='row'>
              <div class='col-sm-2'>&nbsp;</div>
        	     <div class='col-sm-8'>";
  	 echo "  <center>";

    while ($pesq = mysql_fetch_array($sql)) {
      echo "    <div class='hoverzoom col-md-4'>";
      echo "      <a href='#'>
                    <img class='img-receita-fav' src='".$pesq['img_back_src']."'>
                  </a>";
      echo "      <div class='retina'>";
      echo "        <a href='".$pesq['link']."' style='background-color: transparent;'>
                      <img src='".$pesq['img_end_src']."' width='100px'>
                    </a>";
      echo "       </div>";
      echo "    </div>";
    }
    echo "  </center>
	         </div>
        </div>";
  }


  }
?>
