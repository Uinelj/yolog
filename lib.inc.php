<?php
/*
	post['name'] = name of the author
	post['content'] = Text of the post
	post['title'] = Title of the post
	post['date'] = Date of the post.
*/

	function initDb($db){ //Creates the db folder. 
		if(!file_exists($db)){
			mkdir($db, 0777); //Permissions php
			//Checker pour avoir de bonnes permissions. Peut-être un htaccess...
		}
	}
	function initDayFile($db, $dayFile){ //A file per day. Swagged.
		//$dayFile = $db . date("Ymd");
		if(!file_exists($dayFile)){
			touch($dayFile);
		}
	}
	function serializePost($post, $dayFile, $db){
		//$dayFile = $db . date("Ymd");
		$post['date'] = date("d m Y");
		$handler = fopen($dayFile, "r+");
		if(filesize($dayFile)!=0){
			$postsOfTheDay = unserialize(fgets($handler));
			var_dump($postsOfTheDay);
			array_push($postsOfTheDay, $post);
			$ser = serialize($postsOfTheDay);
			fwrite($handler, $ser);
		}else{
			$postsOfTheDay = array();
			array_push($postsOfTheDay, $post);
			$ser = serialize($postsOfTheDay);
			fwrite($handler, $ser);
		}
		// $postsOfTheDay = unserialize(fgets($handler));
		// fclose($handler);
		// var_dump($postsOfTheDay);
		// array_push($postsOfTheDay, $post);
		// var_dump($postsOfTheDay);
		// $handler = fopen($dayFile, "w");
		// fputs($handler, serialize($postsOfTheDay));
		// fclose($handler);
	}
	function displayPosts($day, $db){ //Day Ymd
		$dayFile = $db . $day;
		$handler = fopen($dayFile, "r+");
		$postsOfTheDay = unserialize(fgets($handler));
		foreach ($postsOfTheDay as $post) {
			?>
			<section>
				<header>
					<h1><?=$post['head'] ?></h1>
					<h2><?=$post['date'] ?></h2>
				</header>
				<main>
					<p><?=$post['content'] ?></p>
				</main>
			</section>
			<?php
		}{
			
			//END HTML CODE LOL
		}
	}
?>