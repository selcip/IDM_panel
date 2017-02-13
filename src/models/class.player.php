<?php
class Player{
    function logLevelup(){
        include("connection.php");
        try{

        $query = $db->prepare("SELECT * from boss WHERE nomeChar = :name order by Id desc");
        $query->bindParam(":name",$_POST['nick']);
        $query->execute();
    	if($query->rowCount() == 0){
    		echo "<div class='alert alert-warning text-center'>Usuário não encontrado!</div>";
    		return false;	
    	}
    	?>
    	<div class="table-responsive card">
    		<h3 class="text-center">Informações referentes aos chefes mortos pelo jogador: <b><?php echo $_POST['nick'] ?></h3></p>
    		<p class="text-center"><img src="http://167.114.26.111:8082/create.php?name=<?php echo $_POST['nick'] ?>"></p>
			<table class="table">
			    <thead>
			        <tr>
			            <th>Nick</th>
			            <th>Level</th>
			            <th>Mapa</th>
			            <th>Monstro</th>
			            <th>Hora</th>
			        </tr>
			    </thead>
			    <tbody>
			    	
			    
    	<?php
        while($info = $query->fetch(PDO::FETCH_ASSOC)){
        	$timestamp = strtotime($info['Data']);
        	$dsemana = $this->getDia(date('l',$timestamp));
        	$dia = date('d',$timestamp);
        	$diasemana = $this->getMes(date('F',$timestamp));
        	$ano = date("Y",$timestamp);
        	$hora = date("h:i:s",$timestamp);
			?>
			<tr>
				<td><?php echo $info['NomeChar'] ?></td>
				<td><?php echo $info['LevelChar'] ?></td>
				<td><?php echo $info['NomeMapa'] ?></td>
				<td><?php echo $info['NomeMob'] ?></td>
				<td><?php echo $dsemana . " " . $dia . " de ". $diasemana . " de " . $ano . "</br>Horário: " . $hora ?></td>
			</tr>
			<?php
        }
        ?>
        		</tbody>
    		</table>
    	</div>
        <?php
        }catch(PDOException $e){
        	echo $e->getMessage();	
        }
    }
    
    function getOnlinePlayers(){
    	?>
    	<!--<div class="col-md-2">-->
     <!--           <div class="info">-->
     <!--               <div class="image">-->
     <!--                   <a href="#">-->
     <!--                       <img src="../assets/img/examples/ecommerce5.jpg" alt="...">-->
     <!--                   </a>-->
     <!--               </div>-->
     <!--               <div class="content">-->
     <!--                   <a href="#">-->
     <!--                       <h4 class="title">Gucci</h4>-->
     <!--                   </a>-->
     <!--                   <p class="description">-->
     <!--                      Beautifully tailored from rich burgundy velvet, this impeccable piece has lustrous black satin lining and smart satin-covered buttons.-->
     <!--                   </p>-->
     <!--                   <div class="footer">-->
     <!--                       <span class="price price-old"> €1,930</span>-->
     <!--                       <span class="price price-new">€1,330</span>-->
     <!--                       <button class="btn btn-danger btn-simple pull-right" rel="tooltip" title="" data-placement="left" data-original-title="Remove from wishlist">-->
     <!--                           <i class="fa fa-heart"></i>-->
     <!--                       </button>-->
     <!--                   </div>-->
     <!--               </div>-->
     <!--           </div> -->
             <!--</div>-->
    	<?php
    	include("connection.php");
    	$res = $db->prepare("SELECT c.name FROM accounts a JOIN characters c ON c.accountid = a.id WHERE a.loggedin = 2 order by level DESC");
    	$res->execute();
    	
    	while($a = $res->fetch(PDO::FETCH_ASSOC)){
    		
    		echo $a['name'] ."</br>";
    	}
    	
    }
	
	function logBossKilled(){
        include("connection.php");
        try{

        $query = $db->prepare("SELECT l.* FROM characters c JOIN levelup l ON c.id = l.IdChar WHERE c.name = :name order by l.Level desc");
        $query->bindParam(":name",$_POST['nick']);
        $query->execute();
    	if($query->rowCount() == 0){
    		echo "<div class='alert alert-warning text-center'>Usuário não encontrado!</div>";
    		return false;	
    	}
    	?>
    	<div class="table-responsive card">
    		<h3 class="text-center">Informações relacionadas ao jogador: <b><?php echo $_POST['nick'] ?></h3></p>
    		<p class="text-center"><img src="http://167.114.26.111:8082/create.php?name=<?php echo $_POST['nick'] ?>"></p>
			<table class="table">
			    <thead>
			        <tr>
			            <th>Nick</th>
			            <th>Level</th>
			            <th>Mapa</th>
			            <th>Monstro</th>
			            <th>Hora</th>
			        </tr>
			    </thead>
			    <tbody>
			    	
			    
    	<?php
        while($info = $query->fetch(PDO::FETCH_ASSOC)){
        	$timestamp = strtotime($info['Hora']);
        	$dsemana = $this->getDia(date('l',$timestamp));
        	$dia = date('d',$timestamp);
        	$diasemana = $this->getMes(date('F',$timestamp));
        	$ano = date("Y",$timestamp);
        	$hora = date("h:i:s",$timestamp);
			?>
			<tr>
				<td><?php echo $info['Char'] ?></td>
				<td><?php echo $info['Level'] ?></td>
				<td><?php echo $info['NomeMapa'] ?></td>
				<td><?php echo $info['MobId'] ?></td>
				<td><?php echo $dsemana . " " . $dia . " de ". $diasemana . " de " . $ano . "</br>Horário: " . $hora ?></td>
			</tr>
			<?php
        }
        ?>
        		</tbody>
    		</table>
    	</div>
        <?php
        }catch(PDOException $e){
        	echo $e->getMessage();	
        }
    }
	function getLastBossesKilled(){
		include("connection.php");
		$req = $db->prepare("SELECT * FROM boss ORDER BY id DESC LIMIT 10");
		$req->execute();
		?>
		<div class="table-responsive card">
    		<h3 class="text-center">Ultimos Chefes Mortos</h3>
			<table class="table">
			    <thead>
			        <tr>
			            <th>Nick</th>
			            <th>Level</th>
			            <th>Monstro</th>
			            <th>Mapa</th>
			            <th>Hora</th>
			        </tr>
			    </thead>
			    <tbody>
		<?php
		while($info = $req->fetch(PDO::FETCH_ASSOC)){
			$timestamp = strtotime($info['Data']);
        	$dsemana = $this->getDia(date('l',$timestamp));
        	$dia = date('d',$timestamp);
        	$diasemana = $this->getMes(date('F',$timestamp));
        	$ano = date("Y",$timestamp);
        	$hora = date("h:i:s",$timestamp);
			?>
				<tr>
					<td><?php echo $info['NomeChar'] ?></td>
					<td><?php echo $info['LevelChar'] ?></td>
					<td><?php echo $info['NomeMob'] ?></td>
					<td><?php echo $info['NomeMapa'] ?></td>
					<td><?php echo $dsemana . " " . $dia . " de ". $diasemana . " de " . $ano . "</br>Horário: " . $hora; ?></td>
				</tr>
			<?php
		}
		?>
		
		<?php
	}
	
    function espiar(){
        $mysqli = new MySQLi("144.217.128.81","site","dinh0311@","idmstory"); 
		$name = $mysqli->real_escape_string(filter_input(INPUT_POST,'nick'));
		$a = $mysqli->query("SELECT * from characters WHERE name='$name'")->fetch_assoc();
		if(!$a || strtolower($a['name']) != strtolower($name)){
			echo'<div class="col-xs-12"><div class="alert alert-dismissible alert-danger">O nome pesquisado não existe!</div><hr/></div>';
			return;
		}
		$id = $a['id'];
		$bb = $mysqli->query("SELECT * from inventoryitems Where characterid = $id");
		$cc = $mysqli->query("SELECT * from characters Where id = $id");
		$c = $cc->fetch_assoc();
		$accid = $c['accountid'];
		$dd = $mysqli->query("SELECT * from characters Where accountid = $accid");
		$d = $dd->fetch_assoc();
		$ee = $mysqli->query("SELECT * from accounts Where id = $accid");
		$e = $ee->fetch_assoc();
		$ff = $mysqli->query("SELECT ii.itemid as iditem, ii.quantity as quantidade, ii.*, ie.*  
		from inventoryitems ii JOIN inventoryequipment ie ON ii.inventoryitemid = ie.inventoryitemid Where ii.characterid = $id AND ii.inventorytype = -1"); // equiped
		$gg = $mysqli->query("SELECT ii.itemid as iditem, ii.quantity as quantidade, ii.*, ie.*  
		from inventoryitems ii JOIN inventoryequipment ie ON ii.inventoryitemid = ie.inventoryitemid Where ii.characterid = $id AND ii.inventorytype = 1"); // equip
		$hh = $mysqli->query("SELECT * from inventoryitems Where characterid = $id AND inventorytype = 2"); // use
		$ii = $mysqli->query("SELECT * from inventoryitems Where characterid = $id AND inventorytype = 3"); // etc
		$jj = $mysqli->query("SELECT * from inventoryitems Where characterid = $id AND inventorytype = 4"); // setup
		$kk = $mysqli->query("SELECT * from inventoryitems Where characterid = $id AND inventorytype = 5"); // cash
	
		?>
		<div>
			<div class="col-xs-12 col-lg-2">
				<div class="well well-sm">
					<h3 class="text-center">Menu</h3>
					<hr/>
					<ul class="nav nav-pills nav-stacked">
						<li class="active"><a href="#Wearing" data-toggle="tab">Equipado</a></li>
						<li><a href="#Equip" data-toggle="tab">Equipes</a></li>
						<li><a href="#Use" data-toggle="tab">Utilitários</a></li>
						<li><a href="#Setup" data-toggle="tab">Setup</a></li>
						<li><a href="#Etc" data-toggle="tab">Etc</a></li>
						<li><a href="#Cash" data-toggle="tab">Cash</a></li>
					</ul>
					<hr/>
				</div>
			</div>
					
			<div class="col-xs-12 col-lg-6">
				<div class="well well-sm">
					<div id="myTabContent" class="tab-content">
							  
							  <div class="tab-pane fade active in" id="Wearing">
								<h3 class="text-center"><?php echo $c['name'] ?> está vestindo:</h3><hr/>
									<!--<img src="public/images/img/inventory_bg.png"/>-->
									<span class="item_grid">
										
										<?php
										// Wearing
										$i = 0;
										$status = array();
										while($f = $ff->fetch_assoc()) {
										$status[$i]['Destreza'] = $f['dex'];
										$status[$i]['Força'] = $f['str'];
										$status[$i]['Inteligencia'] = $f['int'];
										$status[$i]['Sorte'] = $f['luk'];
										$status[$i]['Att'] = $f['watk'];
										$status[$i]['Matt'] = $f['matk'];
										$status[$i]['Precisão'] = $f['acc'];
										$status[$i]['Level'] = $f['level'];
										
										?>
										<div class="image_box"> 
											<img src="public/images/img/items/<?php echo $f['iditem'] ?>.png" alt="img" title="<?php echo print_r($status[$i]) ?>" data-toggle="tooltip" />
										</div> 
										<div class="image_box2"> 
											<p class="counter_fix"><?php echo $f['quantidade'] ?></p>
										</div>
										<?php
										}
										
										?>
								  </span>
							  </div>
							  
							  <div class="tab-pane fade" id="Equip">
								<h3>Equips:</h3><hr/>
									<!--<img src="public/images/img/inventory_bg.png"/>-->
									<span class="item_grid">
										<?php
										$i = 0;
										$statuss = array();
										while($g = $gg->fetch_assoc()) {
										$statuss[$i]['Destreza'] = $g['dex'];
										$statuss[$i]['Força'] = $g['str'];
										$statuss[$i]['Inteligencia'] = $g['int'];
										$statuss[$i]['Sorte'] = $g['luk'];
										$statuss[$i]['Att'] = $g['watk'];
										$statuss[$i]['Matt'] = $g['matk'];
										$statuss[$i]['Precisão'] = $g['acc'];
										?>
										<div class="image_box"> 
											<img src="public/images/img/items/<?php echo $g['iditem'] ?>.png" alt="img" title="<?php echo print_r($statuss[$i]) ?>" data-toggle="tooltip" />
										</div> 
										<div class="image_box2"> 
											<p class="counter_fix"><?php echo $g['quantidade'] ?></p>
										</div>
										<?php
										$i++;
										}
										?>
										
								  </span>
							  </div>
							  
							  <div class="tab-pane fade" id="Use">
								<h3>Use:</h3><hr/>
									<!--<img src="public/images/img/inventory_bg.png"/>-->
									<span class="item_grid">
										<?php
										
										while($h = $hh->fetch_assoc()) {
										
										?>
										<div class="image_box"> 
												<img src="public/images/img/items/<?php echo $h['itemid'] ?>.png" alt="img" title="><?php echo $h['itemid'] ?>" />
											</div> 
											<div class="image_box2"> 
												<p class="counter_fix"><?php echo $h['quantity'] ?></p>
											</div>
										<?php
										}
										?>
								  </span>
							  </div>
							  
							  <div class="tab-pane fade" id="Setup">
								<h3>Setup:</h3><hr/>
									<!--<img src="public/images/img/inventory_bg.png"/>-->
									<span class="item_grid">
										<?php
										while($i = $ii->fetch_assoc()) {
										?>
										<div class="image_box"> 
										<?php
										if($i['itemid'] > '3059999' && $i['itemid'] < '3060181'){
											echo'<img src="public/images/img/items/3060000.png" alt="img" title="'.$i['itemid'].'" />';
										} else if($i['itemid'] > '3060999' && $i['itemid'] < '3061391'){ // 3061390 + 1
											echo'<img src="public/images/img/items/3060001.png" alt="img" title="'.$i['itemid'].'" />';
										} else if($i['itemid'] > '3061999' && $i['itemid'] < '3062386'){ // 3062385 + 1
											echo'<img src="public/images/img/items/3060002.png" alt="img" title="'.$i['itemid'].'" />';
										} else if($i['itemid'] > '3062999' && $i['itemid'] < '3063401'){ // 3063400 + 1
											echo'<img src="public/images/img/items/3060003.png" alt="img" title="'.$i['itemid'].'" />';
										} else if($i['itemid'] > '3063999' && $i['itemid'] < '3064491'){ // 3064490 + 1
											echo'<img src="public/images/img/items/3060004.png" alt="img" title="'.$i['itemid'].'" />';
										} else {
											echo'<img src="public/images/img/items/'.$i['itemid'].'.png" alt="img" title="'.$i['itemid'].'" />';
										}
										?>
										</div> 
										<div class="image_box2"> 
											<p class="counter_fix"><?php echo $i['quantity']; ?></p>
										</div>
										<?php
										}
										?>
								  </span>
							  </div>
							  
							  <div class="tab-pane fade" id="Etc">
								<h3>Etc:</h3><hr/>
									<!--<img src="public/images/img/inventory_bg.png"/>-->
									<span class="item_grid">
										<?php
										while($j = $jj->fetch_assoc()) {
										?>
										<div class="image_box"> 
											<img src="public/images/img/items/<?php echo $j['itemid'] ?>.png" alt="img" title="<?php echo $j['itemid'] ?>" />
										</div> 
										<div class="image_box2"> 
											<p class="counter_fix"><?php echo $j['quantity'] ?></p>
										</div>
										
										<?php
										}
										?>
								  </span>
							  </div>
							  
							  <div class="tab-pane fade" id="Cash">
								<h3>Cash:</h3><hr/>
									<!--<img src="public/images/img/inventory_bg.png"/>-->
									<span class="item_grid">
										<?php
										while($k = $kk->fetch_assoc()) {
										?>
										<div class="image_box"> 
												<img src="public/images/img/items/<?php echo $k['itemid']; ?>.png" alt="img" title="<?php echo $k['itemid']; ?>" />
											</div> 
											<div class="image_box2"> 
												<p class="counter_fix"><?php echo $k['quantity']; ?></p>
											</div>
										<?php } ?>
										
								  </span>
							  </div>
							</div>
						</div>
					</div>
					
					<div class="col-xs-12 col-lg-4">
						<div class="well well-sm">

						<h4 class="text-center">Informações do Personagem</h4><hr/>

					<div class="panel panel-default">
					<span class="label label-default">ID do Personagem: <b><?php echo $c['id'] ?></b></span>  <span class="label label-default">Account ID: <b><?php echo $e['id'] ?></b></span>
					  <div class="panel-body">
						<img src="http://167.114.26.111:8082/create.php?name=<?php echo $c['name'] ?>" name="Character_img" alt="#" />
					  </div>
					<div class="panel-footer"> 
						<span class="label label-default">Nome: <b><?php echo $c['name'] ?></b></span> 
						<br><br>
						<span class="label label-default">Lv: <b><?php echo $c['level'] ?></b></span> 
						<span class="label label-default">Classe: <b><?php echo $c['job'] ?></b></span> 
						<span class="label label-default">GM: <b><?php echo $c['gm'] ?></b></span>
						<br><br>
						<span class="label label-default">For: <b><?php echo $c['str'] ?></b></span>
						<span class="label label-default">Des: <b><?php echo $c['dex'] ?></b></span>
						<span class="label label-default">Int: <b><?php echo $c['int'] ?></b></span>
						<span class="label label-default">Sor: <b><?php echo $c['luk'] ?></b></span>
						<br><br>
						<span class="label label-danger">Hp: <b><?php echo $c['hp'] ?> / <?php echo $c['maxhp'] ?></b></span>
						<span class="label label-info">Mp: <b><?php echo $c['mp'] ?> / <?php echo $c['maxmp'] ?></b></span>
						<br><br>
						<span class="label label-warning">Exp: <b><?php echo $c['exp'] ?></b></span>
						<span class="label label-success">Meso: <b><?php echo $c['meso'] ?></b></span>
					  </div>
					</div>
					
					<h3>Conta referente:<?php echo $e['name'] ?></h3><hr/>
					<div class="panel panel-default">
					<div class="panel-footer">
						
						<span class="label label-info">IDMPoints: <b><?php echo $e['idmpoints '] ?></b></span><br>
						<span class="label label-info">NX: <b><?php echo $e['paypalNX'] ?></b></span>
						<span class="label label-info">MaplePoints: <b><?php echo $e['mPoints'] ?></b></span>
					  </div>
					</div>
						
				</div>
			</div>
			
		</div>
<?php
}
	function getDia($texto){
		if($texto == "Sunday"){
			$saida = "Domingo";
		}elseif($texto == "Monday"){
			$saida = "Segunda-Feira";
		}elseif($texto == "Tuesday"){
			$saida = "Terça-Feira";
		}elseif($texto == "Wednesday"){
			$saida = "Quarta-Feira";
		}elseif($texto == "Thursday"){
			$saida = "Quinta-Feira";
		}elseif($texto == "Friday"){
			$saida = "Sexta-Feira";
		}elseif($texto == "Saturday"){
			$saida = "Sábado";
		}else{
			$saida = "Deu ruim na data";
		}
		return $saida;
			
	}
	function getMes($texto){
		if($texto == "January"){
			$saida = "Janeiro";
		}elseif($texto == "February"){
			$saida = "Fevereiro";
		}elseif($texto == "March"){
			$saida = "Março";
		}elseif($texto == "April"){
			$saida = "Abril";
		}elseif($texto == "May"){
			$saida = "Maio";
		}elseif($texto == "June"){
			$saida = "Junho";
		}elseif($texto == "July"){
			$saida = "Julho";
		}elseif($texto == "August"){
			$saida = "Agosto";
		}elseif($texto == "September"){
			$saida = "Setembro";
		}elseif($texto == "October"){
			$saida = "Outubro";
		}elseif($texto == "November"){
			$saida = "Novembro";
		}elseif($texto == "December"){
			$saida = "Dezembro";
		}else{
			$saida = "Deu ruim na data aq, chama os dev";
		}
		return $saida;
	}

}