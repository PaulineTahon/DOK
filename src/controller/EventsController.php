<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'EventDAO.php';

class EventsController extends Controller {

  private $eventDAO;

  function __construct() {
    $this->eventDAO = new EventDAO();
  }

  public function index() {
    $conditions = array();

    $conditions[0] = array(
      'field' => 'start',
      'comparator' => '<=',
      'value' => '2017-05-01 23:59:59'
    );

    $events = $this->eventDAO->search($conditions);
    if($this->isAjax) {
          header('Content-Type: application/json');
          echo json_encode($events);
          exit();
        }
    $this->set('events', $events);
  }

  public function programma() {
    $conditions = array();
    if(!empty ($_POST['value'])) {
      $this->_getEventsByLocation();
    }
      // $conditions[0] = array(
      //   'field' => 'end',
      //   'comparator' => '>=',
      //   'value' => '2017-05-01 00:00:00'
      // );
      // $conditions[1] = array(
      //   'field' => 'end',
      //   'comparator' => '<',
      //   'value' => '2017-06-01 00:00:00'
      // );
    //$locations = $_GET["locations"];


    // $locations = $_GET["locations"];


    //example: search on title
    // $conditions[0] = array(
    //   'field' => 'title',
    //   'comparator' => 'like',
    //   'value' => 'schoen'
    // );

  //  example: search on location name

    //example: search on organiser id
    // $conditions[0] = array(
    //   'field' => 'organiser_id',
    //   'comparator' => '=',
    //   'value' => '1'
    // );

    //example: search on organiser id
    // $conditions[0] = array(
    //   'field' => 'organiser',
    //   'comparator' => 'LIKE',
    //   'value' => 'gent'
    // );

    //example: search on tag name
    // $conditions[0] = array(
    //   'field' => 'tag',
    //   'comparator' => '=',
    //   'value' => 'gastvrijheid'
    // );

    //example: search on location, with certain end date + time
    // $conditions[0] = array(
    //   'field' => 'location',
    //   'comparator' => 'like',
    //   'value' => 'voortuin'
    // );
    // $conditions[1] = array(
    //   'field' => 'end',
    //   'comparator' => '=',
    //   'value' => '2017-05-01 19:00'
    // );

    $events = $this->eventDAO->search($conditions);
    if($this->isAjax) {
          header('Content-Type: application/json');
          echo json_encode($events);
          exit();
        }
    $this->set('events', $events);

    $this->set('js', '<script src="http://localhost:3000/js/programma.js"></script><script src="http://localhost:3000/js/style.js"></script>');
    if($this->env == 'production') {
      $this->set('js', '<script src="js/script.js"></script>');
    }
  }

  public function _getEventsByLocation () {
      if( !empty( $_POST["locations"] ) ){

        $location = $_POST["locations"];

        $conditions[0] = array(
          'field' => 'location',
          'comparator' => 'like',
          'value' => $location
        );

        if($events = $this->eventDAO->search($conditions)) {
          if($this->isAjax) {
            header('Content-Type: application/json');
            echo json_encode($events);
            exit();
          }
          $this->redirect('index.php');
        }
        $this->set('events', $events);
        var_dump($events);
      }
  }


  public function detail () {

    if( empty( $_GET["id"] ) ){
			$this->redirect('index.php');
		}

  	$id = $_GET["id"];

    $conditions[0] = array(
      'field' => 'id',
      'comparator' => '=',
      'value' => $id
    );

    $events = $this->eventDAO->search($conditions);
    if($this->isAjax) {
          header('Content-Type: application/json');
          echo json_encode($events);
          exit();
        }
    $this->set('events', $events);
  }

  public function _processAddItemFormIfNeeded() {
    if ($_POST) {
      $errors = array();
      if(empty($_POST['email'])) {
        $errors['score'] = 'Vul je email adres in';
      }

      $data = array(
        'email' => $_POST['email'],
      );

      if(empty($errors)) {
        $inserted = $this->highscoreDAO->create($data);
        if(!empty($inserted)) {
          $_SESSION['info'] = 'emailadres is opgeslagen';
          $this->redirect('index.php');
        }
      }

      $_SESSION['error'] = 'error';
      $this->set('errors', $errors);
    }
  }
}
