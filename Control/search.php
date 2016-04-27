<?php

/*

search engine 

khaled ( rezk2ll )

*/

# no debugging :p 
session_start();
error_reporting(0);
	# only when there are some requests i will work
	
if(isset($_POST['searchdata'])) {
	
	
	# connect to database
	include('connect.php');
	
	# avoid sql injection
	
	$search = addslashes($_POST['searchdata']);
	
	# avoid XSS kiddies
	
	$search = strip_tags($search);
	
	# ow , there is something to look for !
	if(!empty($search)) {
		
		# let's see if we have it
		
		$nq 		= $connect->query('SELECT count(*) as `nsrch` FROM quests where content like "%'.$search.'%"');
		$cnt_srch 	= $nq->fetch(PDO::FETCH_OBJ);
		$num_srch 	= $cnt_srch->nsrch;
		# mmm , good , we found something
		
		if($num_srch != 0) {
			$q =$connect->query('SELECT * FROM quests where content like "%'.$search.'%" ORDER BY id DESC');
			echo '<div id="answers">';
			while($result = $q->fetch(PDO::FETCH_OBJ)) {
			//let's get the answers number of this question
			$get_ans = $connect->query("SELECT count(*) as `nans` FROM answers WHERE id_quest = '".$result->id."'");
			$cnt_ans = $get_ans->fetch(PDO::FETCH_OBJ);
			$num_ans = $cnt_ans->nans;
			
			// and the likes number of this question
			$get_likes = $connect->query("SELECT count(*) as `nlks` FROM likes WHERE id_quest = '".$result->id."'");
			$cnt_likes = $get_likes->fetch(PDO::FETCH_OBJ);
			$num_likes = $cnt_likes->nlks;
			
			// and the views number also
			$get_views = $connect->query("SELECT count(*) as `nvws` FROM views WHERE id_quest = '".$result->id."'");
			$cnt_views = $get_views->fetch(PDO::FETCH_OBJ);
			$num_views = $cnt_views->nvws;
			
			// and let's check for like ability
			$user = $_SESSION['log'];
			
			// the user is not logged in 
			if(empty($user)) {
			$like = '';
			}
			
			// the user os logged in
			else {
			
			$get_user_like = $connect->query("SELECT count(*) as `ulks` FROM likes WHERE id_quest = '".$result->id."' AND user = '".$user."'");
			$cnt_user_like = $get_user_like->fetch(PDO::FETCH_OBJ);
			$num_user_like = $cnt_user_like->ulks;
				// he didn't like it before
				
				if($num_user_like == 0) {
				
				// you can like the question mate :)
				
				$like = '<a onclick="likeit('.$result->id.')" id="like_'.$result->id.'" href="#" rel="'.$result->id.'"><i class="icon-thumbs-up"></i>&nbsp;&nbsp; like |</a>';
				}
				
				// he liked it before
				
				else $like='';
			}
			
			$whois 	= $result->user;
			$q2 	= $connect->query("SELECT * FROM users WHERE user = '{$whois}'");
			$data 	= $q2->fetch(PDO::FETCH_OBJ);
			if(strlen($data->avatar) > 0) {
				$profilepic = $data->avatar;
			}
			else 
			$profilepic = "avatar/default.png";

			// let's add the remove button
			$user = $_SESSION['log'];

			if($whois == $user || $user == "admin") {
				$remove = 	'<div align="right" class="x">
						 	<a onclick="rmq('.$result->id.')"><i class="icon-remove"></i></a>
						 	</div>';
			}
			else $remove = '';
			
			// and textbox sizing :( ( it was hard to salve )

			if(strlen($result->content) < 50) $class = "small";
			elseif(strlen($result->content) > 50 &&  strlen($result->content) < 210) $class ="large";
			elseif(strlen($result->content) > 210) $class ="large2";
			
			echo '
			<div class="comment"  id='.$result->id.'>
			<div class="heads">
			'.$remove.'
			<div class="avatar" onclick="showprofile('.$data->id.')"><img src="'.$profilepic.'" width="60" height="60"></div>
			<div class="name" onclick="showprofile('.$data->id.')">'.$result->user.'</div> <br><p class="date">'.$result->date.'</p>
			</div>
			<textarea class="'.$class.'" readonly>'.$result->content.'</textarea>
			<a onclick="showq('.$result->id.')" id="answer">Answer |</a> 
			'.$like.'
			<span> '.$num_ans.' <i class="icon-comments-alt"></i> </span> |
			<span> <span id="nlikes_'.$result->id.'">'.$num_likes.'</span> <i class="icon-thumbs-up"></i> |</span> 
			<span> '.$num_views.' <i class="icon-eye-open"></i> </span>
			</div>
			';
			}
			echo '</div>';
			}
			
		else {
			
			# sorry i don't have it 
			
			die("<div class='error'>No matches found for &quot; $search &quot;</div>");
		}
	}
	
	
	# i made this for non ajax request , kiddies everywhere
	
	else die("<div class='error'>No matches found for &quot; $search &quot;</div>");
	
}
?>