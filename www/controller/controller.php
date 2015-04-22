<?php

/*
class damags {

	function damag($heals,$damag,$defens){
		$total=$heals -($damag-$defens);
		if($total>0) return $total;
		else return 'deat';
	}
	
	function subtractMana ($mana,$skill){
		$total = $mana - $skill;
		return $total;
	}
	
	function namaCheck ($mana,$skill){
		if ($mana>$skill) return true;
		else return false;
	}
	
}

	if(isset($_COOKIE['user']) and $_COOKIE['user']!='' and $_COOKIE['user']!='deat'){
		
		$cookieUser=json_decode($_COOKIE['user'], true);
		
		$checkDate=$cookieUser;
		
		// class
		$skills = new skills;
		$damags = new damags;
		$stats = new stats;
				
		if($_GET['oneSkill']){
	
			$Skill=$skills->firstSkill;
		
			if($damags->namaCheck($cookieUser['mana'],$Skill['mana'])){
				$cookieUser['mana']=$damags->subtractMana($cookieUser['mana'],$Skill['mana']);
				if($damags->damag($cookieUser['heals'],$Skill['damag'],$cookieUser['defens'])=='deat'){
					$errors[]='Вы померли';
					$users='deat';
				} else {
					$cookieUser['heals']=$damags->damag($cookieUser['heals'],$Skill['damag'],$cookieUser['defens']);
					
					$cookieUser['heals']=$cookieUser['heals']+$cookieUser['regHeals'];
					$cookieUser['mana']=$cookieUser['mana']+$cookieUser['regMana'];
					
					$users = array ("defens"=>$cookieUser['defens'],"heals"=>$cookieUser['heals'],"regHeals"=>$cookieUser['regHeals'],"mana"=>$cookieUser['mana'],"regMana"=>$cookieUser['regMana']);
					$users=json_encode($users);
					
				}
			} else $errors[]='У вас не достаточно маны';
			
			setcookie ("user", "$users", time()+300 , '/');
		}

		if($_GET['secondSkill']){
			
			$Skill=$skills->secondSkill;

			if($damags->namaCheck($cookieUser['mana'],$Skill['mana'])){
				$cookieUser['mana']=$damags->subtractMana($cookieUser['mana'],$Skill['mana']);
				if($damags->damag($cookieUser['heals'],$Skill['damag'],$cookieUser['defens'])=='deat'){
					$errors[]='Вы померли';
					$users='deat';
				} else {
					$cookieUser['heals']=$damags->damag($cookieUser['heals'],$Skill['damag'],$cookieUser['defens']);
					
					$cookieUser['heals']=$cookieUser['heals']+$cookieUser['regHeals'];
					$cookieUser['mana']=$cookieUser['mana']+$cookieUser['regMana'];
					
					$users = array ("defens"=>$cookieUser['defens'],"heals"=>$cookieUser['heals'],"regHeals"=>$cookieUser['regHeals'],"mana"=>$cookieUser['mana'],"regMana"=>$cookieUser['regMana']);$users=json_encode($users);	
				}
			} else $errors[]='У вас не достаточно маны';

			setcookie ("user", "$users", time()+300 , '/');
	
		}
		
		if($_GET['skip']) {
			
			$cookieUser['heals']=$cookieUser['heals']+$cookieUser['regHeals'];
			$cookieUser['mana']=$cookieUser['mana']+$cookieUser['regMana'];
			
			$users = array ("defens"=>$cookieUser['defens'],"heals"=>$cookieUser['heals'],"regHeals"=>$cookieUser['regHeals'],"mana"=>$cookieUser['mana'],"regMana"=>$cookieUser['regMana']);
			
			$users=json_encode($users);
			
			setcookie ("user", "$users", time()+300 , '/');
		}
		/*
		$stats = new stats;
		echo $stats->defens;
		echo $stats->heals;
		echo $stats->regHeals;
		echo $stats->mana;
		echo $stats->regMana;*/ /*
		if($_GET['delete']) {
			setcookie ("user", "", time()-300 , '/');
			header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			echo 'Прощай Ромашковый чай :( ';
			exit;
		}

		if($checkDate!=$cookieUser){
			//echo '<script>window.location.href = "/" </script>';
		}
		
		$cookieUser=json_decode($_COOKIE['user'], true);
			echo "Защита: ".$cookieUser['defens']."<br />";
			echo "Жизни: ".$cookieUser['heals']."<br />";
			echo "Регенерация жизни: ".$cookieUser['regHeals']."<br />";
			echo "Мана: ".$cookieUser['mana']."<br />";
			echo "Регенерация маны: ".$cookieUser['regMana']."<br />";
		
		//var $firstSkill=array("mana"=>55,"damag"=>60);
	//var $secondSkill=array("mana"=>15,"damag"=>15);
	
	$firstSkill=$skills->firstSkill;
	$secondSkill=$skills->secondSkill;
		
		echo "<a href='/?oneSkill=oneSkill'>oneSkill</a> (".$firstSkill['mana']."-мана. ".$firstSkill['damag']."-Урон. )"."<br />";
		echo "<a href='/?secondSkill=secondSkill'>secondSkill</a> (".$secondSkill['mana']."-мана. ".$secondSkill['damag']."-Урон. )"."<br />";
		echo "<a href='/?skip=skip'>Пропустить ход</a> +(".$stats->regHeals." жизни ".$stats->regMana." маны)"."<br />";
		echo '<a href="/?delete=delete">delete</a><br />';
		
		if($errors!=null){
			foreach($errors as $value){
				echo $value."<br />";
			}
		}

	} elseif($_COOKIE['user']=='deat'){
		
		if($_GET['yet']){
			$stats = new stats;
			$users = array ("defens"=>$stats->defens,"heals"=>$stats->heals,"regHeals"=>$stats->regHeals,"mana"=>$stats->mana,"regMana"=>$stats->regMana);
			
			//print_r($users);
			
			$users=json_encode($users);
			//print_r($users);
			setcookie ("user", "$users", time()+300 , '/');
			
			header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			echo 'Мы вам создали персонажа О_О';
			exit;
		}
		
		echo '<a href="/?yet=yet">Еще?)</a>';
		
	} else {
		if($_GET['create']){
			$stats = new stats;
			$users = array ("defens"=>$stats->defens,"heals"=>$stats->heals,"regHeals"=>$stats->regHeals,"mana"=>$stats->mana,"regMana"=>$stats->regMana);
			
			//print_r($users);
			
			$users=json_encode($users);
			//print_r($users);
			setcookie ("user", "$users", time()+300 , '/');
			
			header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			echo 'Мы вам создали персонажа О_О';
			exit;
		}

		echo '<a href="/?create=create">create</a>';
	}*/
	
$bd = new bd("mysql-srv59637.ht-systems.ru","srv59637_tur","qwerqwer1234","srv59637_game");

$title = "Главная страница";

$content = index('index');

?>