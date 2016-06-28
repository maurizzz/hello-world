<?php
header("Access-Control-Allow-Origin: *");
echo "test";
$con = mysqli_connect('localhost','projectalunnicalcaterra','','my_projectalunnicalcaterra');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$quest = $_GET['quest'];
switch ($quest) {
	//---------------------------------------DEVICES-------------------------------------//
    case 'devices':
		$sql="SELECT * FROM ".$_GET['req']." WHERE id > '0' && id < '5'";
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result)){
			echo '<div class="grid_3 device center">'.
				'<img class="device" src="images_devices/'.$row['immagine_front'].'"><br>'.
				'<h5>'.$row['nome'].'</h5>'
				.$row['prezzo'].'€<br>'
				.'<button data-type="'.$_GET['req'].'" data-id="'.$row['id'].'">Dettagli</button></div>';
		}
		break;
	//---------------------------------------DEVICE DETAILS-------------------------------------//		
	case 'devices_details':
		$sql="SELECT * FROM ".$_GET['type']." WHERE id = '".$_GET['devID']."'";
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result)){
			echo 
			'<div class="grid_4 full">
			<div class="grid_12"><img class="device" src="images_devices/'.$row['immagine_front'].'"></div>'
			.'<div class="grid_4 full"><img class="device" src="images_devices/'.$row['immagine_back'].'"></div>'
			.'<div class="grid_4 full"><img class="device" src="images_devices/'.$row['immagine_front'].'"></div>'
			.'<div class="grid_4 full"><img class="device" src="images_devices/'.$row['immagine_side'].'"></div>'
			.'<br>Colori<br>'
			.'</div>'
			.'<div class="grid_8">'
			.'<a class="rightfloat hand" id="back" data-goto="devicebycategory">torna indietro</a>'
			.'<h2>'.$row['nome'].'</h2>'
			.'<div id="contenuto">'
			.'Caratteristiche:<br>'
			.$row['caratteristiche']
			.'<br><br>'
			.'<div class="grid_8">'
			.'<a class="hand" value="devices_caracteristich">Maggiori caratteristiche</a><br>'
			.'<a class="hand">Smart Life Service disponibili</a><br>'
			.'<a class="hand">Servizi di assistenza disponibili</a><br>'
			.'</div>'
			.'<div class="grid_4">'
			.'<h2>'.$row['prezzo'].'€</h2>'
			.'</div>'
			.'<img src="images/vantaggi_shopping_online.jpg">'
			.'</div>'
			.'</div>';
		}
		break;
		

		
		//---------------------------------------DEVICE CHARATERISTICh-------------------------------------//		
	case 'devices_caracteristich':
		echo "qui ci vanno le caratteristiche (implementarle in php)";
		break;
    
	//---------------------------------------ASSISTENZA-------------------------------------//
	case 'assistenza':
        
		$sql="SELECT * FROM assistenza WHERE id_categoria='".$_GET['req']."'";
		$result = mysqli_query($con,$sql);
		$sotto_categoria="";
		echo "<div class='grid_3'>";
		while($row = mysqli_fetch_array($result)){
			if($sotto_categoria!=$row['sotto_categoria']||$sotto_categoria==""){
				if($sotto_categoria==""){
					$sotto_categoria=$row['sotto_categoria'];
					echo "<h2>".$sotto_categoria."</h2>";
				}else{
					$sotto_categoria=$row['sotto_categoria'];
					echo "</div><div class='grid_3'><h2>".$sotto_categoria."</h2>";
				}
			}
			if($gruppo!=$row['gruppo']&&($gruppo=$row['gruppo'])!="")
				echo "<br>".$gruppo."<br>";
			echo "&nbsp;&nbsp;&nbsp;<a href='#' class='assistance' value='".$row['id']."'>".$row['titolo']."</a><br>";
		}
		echo "</div>";
        break;
	//---------------------------------------ASSISTANCE_DETAILS-------------------------------------//
		case 'assistance_details':
		$sql="SELECT * FROM assistenza WHERE id = '".$_GET['assID']."'";
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result)){
			echo "<h2>".$row['titolo']."</h2><br>".$row['descrizione'];
		}
		break;
    
	//---------------------------------------SL SERVICE-------------------------------------//	
	case 'service':
		switch($_GET['req']){
			case 'tv':
				echo_tv();
				break;
			case 's_personali':
				echo_s_personali();
				break;
			case 'famiglia':
				echo_famiglia();
				break;
			case 'salute':
				echo_salute();
				break;
		}
        break;
		
			//---------------------------------------SERVICE_DETAILS-------------------------------------//		
	case 'services_details':
		$sql="SELECT * FROM servizi WHERE id = '".$_GET['servID']."'";
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result)){
			echo 
			'<div class="grid_12 center"><img src="images_services/'.$row["immagine_head"].'"></div>
			<div class="grid_8"><h1>Attivazione:</h1><br>
			'.$row["attivazione"].'
			</div>
			<div class="grid_2">&nbsp;</div>
			<div class="grid_2">
			<a class="hand" value="caratteristiche">Maggiori caratteristiche</a><br>
			<a class="hand">Device compatibili</a><br>
			<div class="center"><h1>Disponibile per '.$row["prezzo"].'&nbsp;€</h1></div>
			</div>';	 
		}
		break;

		//---------------------------------------ALTRO-------------------------------------//
    case 2:
        echo "i equals 2";
        break;
		}
mysqli_close($con);

function echo_tv(){
	echo '
	<div class="grid_1">&nbsp;</div>
      <div class="grid_10 center">
      	<div class="grid_6"><a href="#"><img class="middle" src="images/SL_1_1.png"></a><br><input data-id="0" type="button" value="Details"></div>
        <div class="grid_6"><a href="#"><img class="middle" src="images/SL_1_2.png"></a><br><input data-id="1" type="button" value="Details"></div>
        <div class="grid_4"><a href="#"><img class="middle" src="images/SL_1_3.png"></a><br><input data-id="2" type="button" value="Details"></div>
        <div class="grid_4"><a href="#"><img class="middle" src="images/SL_1_4.png"></a><br><input data-id="3" type="button" value="Details"></div>
        <div class="grid_4"><a href="#"><img class="middle" src="images/SL_1_5.png"></a><br><input data-id="4" type="button" value="Details"></div>
      </div>
     </div>';
}


function echo_s_personali(){
	echo '
	 <div class="grid_1">&nbsp;</div>
      <div class="grid_10 center">
 
        <div class="grid_6">
        	<a href="#"><img class="middle" src="images/SL_4_1.png"></a><br>Pagamenti<br><input data-id="-1" type="button" value="Details">
        </div>
        
		<div class="grid_6">
        	<a href="#"><img class="middle" src="images/SL_4_2.png"></a><br>Trasporti<br><input data-id="-1" type="button" value="Details">
        </div>';
}

function echo_famiglia(){
	echo '
	<div class="grid_1">&nbsp;</div>

      <div class="grid_10">
       
        <div class="grid_6 center">
        	<a href="#"><img class="middle" src="images/SL_3_1.png"></a><br>D-Link SmartHome<br><input data-id="-1"  type="button" value="Details">
        </div>
        
      	<div class="grid_6 center">
        	 <a href="#"><img class="middle" src="images/SL_3_2.png"></a><br>Philips Livingcolours Bloom<br><input data-id="-1" type="button" value="Details">
     		
        </div>';
}

function echo_salute(){
	echo '
	<div class="grid_1">&nbsp;</div>

      <div class="grid_10 center">
      	<div class="grid_6"><a href="#"><img class="middle" src="images/SL_2_1.png"><br></a>SAMSUNG Galaxy Gear S with sim<br><input data-id="-1" type="button" value="Details"></div>
      	<div class="grid_6"><a href="#"><img class="middle" src="images/SL_2_2.png"><br></a>Polar LOOP H7 HR<br> <input data-id="-1"  type="button" value="Details"></div>
      </div>
      <div class="grid_12 center">
      	<div class="grid_4"><a href="#"><img class="middle" src="images/SL_2_3.png"><br></a>POLAR HR<br> <input data-id="-1"  type="button" value="Details"></div>
      	<div class="grid_4"><a href="#"><img class="middle" src="images/SL_2_4.png"><br></a>IHealth HS5<br> <input data-id="-1"  type="button" value="Details"></div>
        <div class="grid_4"><a href="#"><img class="middle" src="images/SL_2_5.png"><br></a>SAMSUNG Galaxy Gear Fit<br> <input data-id="-1"  type="button" value="Details"></div>
      </div>';
}

?>
