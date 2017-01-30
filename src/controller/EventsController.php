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
    $conditions = array();

    $conditions[0] = array(
      'field' => 'start',
      'comparator' => '<=',
      'value' => '2017-05-01 23:59:59'
    );

    $events = $this->eventDAO->search($conditions);
    if($this->isAjax) {
          header('Content-Type: application/json');
          var_dump(json_encode($events));
          echo json_encode($events);
          exit();
        }
    $this->set('events', $events);
  }

  public function programma() {

    if(!empty ($_GET['locations'])) {

      $location = $_GET["locations"];

      $conditions[0] = array(
        'field' => 'location',
        'comparator' => 'like',
        'value' => $location
      );

    }
    else if(!empty ($_GET["tag"])) {

      $tag = $_GET["tag"];

      $conditions[0] = array(
        'field' => 'tag',
        'comparator' => '=',
        'value' => $tag
      );

    } else if (!empty ($_GET['dateend'])) {

      $dateStart = $_GET['datestart'];
      $dateEnd = $_GET['dateend'];

      $conditions[0] = array(
        'field' => 'start',
        'comparator' => '>=',
        'value' => $dateStart
      );

      $conditions[1] = array(
        'field' => 'end',
        'comparator' => '<=',
        'value' => $dateEnd
      );
    } else {

      $conditions = array();

    }

    $events = $this->eventDAO->search($conditions);
    if($this->isAjax) {
          header('Content-Type: application/json');
          echo json_encode($events);
          exit();
        }
    $this->set('events', $events);
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
    if(!empty($_POST['email']) && $_POST['action'] == 'add-item') {
      $data = $_POST['email'];
      if($result = $this->eventDAO->insert($data)) {
        if($this->isAjax) {
          header('Content-Type: application/json');
          echo json_encode(array('result' => 'ok'));
          exit();
        }
        $this->redirect('index.php');
      } else {
        $errors = $this->eventDAO->getValidationErrors($data);
        if($this->isAjax) {
          header('Content-Type: application/json');
          echo json_encode(array('result' => 'error', 'errors' => $errors));
          exit();
        }
        $this->set('errors', $errors);
      }
    }
  }
}
