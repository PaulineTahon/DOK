<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'EventDAO.php';

class EventsController extends Controller {

  private $eventDAO;

  function __construct() {
    $this->eventDAO = new EventDAO();
  }

  public function index() {
    $this->_processAddItemFormIfNeeded();
    $events = $this->eventDAO->getFirstFourEvents();
    if($this->isAjax) {
		      header('Content-Type: application/json');
		      echo json_encode($events);
		      exit();
		    }
    $this->set('events', $events);
  }

  public function programma() {
    //$conditions = array();

    //example: search on title
    // $conditions[0] = array(
    //   'field' => 'title',
    //   'comparator' => 'like',
    //   'value' => 'schoen'
    // );

  //  example: search on location name
    $conditions[0] = array(
      'field' => 'location',
      'comparator' => 'like',
      'value' => 'voortuin'
    );

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

  public function getLocationEvents () {
     $conditions[0] = array(
      'field' => 'location_id',
      'comparator' => '=',
      'value' => $_POST['location']
     );

     $events = $this->eventDAO->search($conditions);
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
