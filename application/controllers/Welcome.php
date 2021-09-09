<?php
// TODO: how to automate the process of repeatedly loading model of links footer.
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function loadFoot(){
		$this->load->model('Foot');
		$links= $this->Foot->getLinks();
		$this->load->view('template/foot', $links);
	}
	
	public function divert($page=''){
		$page= substr($page, 0, strpos($page, '.'));
		$this->load->view('template/head');
		$this->load->view($page);
		$this->loadFoot();
	}

	public function index(){
		$this->load->view('template/head');
		$this->load->view('homepage');
		$this->loadFoot();
	}

	public function search($query=''){
		$_POST['item']= trim($_POST['item']);
		$_POST['item']= strtolower($_POST['item']);
		$keywords = array('combined' => $_POST['item']);

		$items= preg_split('/ +/', $_POST['item']);
		// $keywords['single']=array();
		//
		// for ($i=0; $i < sizeof($items); $i++) {
		// 	array_push($keywords['single'], array('itemName'=>$items[$i]));
		// }
		$keywords['single']= $items;
		$this->load->model('Search');
		$result= $this->Search->searchItem($keywords);
		$this->load->view('template/head');
		$this->load->view('searchResult',  $result);
		$this->loadFoot();
	}

	function addRestaurant(){
		if(isset($_POST['addrest'])){
		  $rname=$_POST['r-name'];
		  $rstreet=$_POST['r-street'];
		  $rcity=$_POST['r-city'];
		  $rstate=$_POST['r-state'];
		  $rstd=$_POST['std'];
		  $rcontact=$_POST['contact'];
			$this->load->database();
			$result= $this->db->query("INSERT INTO restaurants(contact, nm, street, city, rstate, verified, std) VALUES('$rcontact','$rname','$rstreet','$rcity','$rstate','','$rstd')");
		  if($result){
				echo '
				<script>
					window.alert("Thank Your for Letting us Know\nRestaurant added");
				</script>
				';
				unset($_POST);
		    $this->index();
		  } else{
		    echo '
				<script>
					window.alert("Oops there may be some internal error\n sorry may be try again.");
				</script>
				';
				$this->load->view('addRestaurant.php');
		  }
		} else{
		  // addNewRestaurant();
		}
	}
}
