<?php

  header('Content-Type: application/json; charset=utf-8');
  session_start();

  class Controller {

    private array $actions = [
      'create_user' => [
        'function' => 'createUser',
        'fields' => ['name', 'email']
      ],
      'get_User' => [
        'function' => 'getUser',
        'fields' => ['email']
      ],
    ];

    /**
     * Checks if a session is active
     * Validates an action and its fields
     * Sanitazes the fields
     * Calls the corresponding method to the action
     *
     * @param array   $data The action and the fields
     * 
     * @throws Exception If the action isn't valid
     * @throws Exception If the data isn't valid
     */ 
    public function call(array $data): array {
      $sanitazedFields = [];

      //Validates the session
      /*if (!isset($_SESSION['user'])) {
        throw new Exception('Acceso denegado. No hay una sesión activa.', 401);
      }*/

      //Validate the action
      if (!array_key_exists($data['action'], $this->actions)) {
        throw new Exception("La acción '{$data['action']}' no es válida.", 400);
      }
      
      //For each field ...
      foreach($this->actions[$data['action']]['fields'] as $field){
        //Validate the field
        if(!array_key_exists($field, $data)) {
          throw new Exception("Falta el campo '{$field}'.", 400);
        }

        //Sanitize the field
        $sanitazedField = trim($data[$field]);
        $sanitazedField = htmlspecialchars($sanitazedField, ENT_QUOTES, 'UTF-8');

        //If it's an email, do extra validations
        if ($field === 'email') {
          if (!filter_var($sanitazedField, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("El formato del correo electrónico no es válido.", 400);
          }
        }

        //Save clean fields
        $sanitazedFields[$field] = $sanitazedField;
      }

      //If all is good, call the corresponding method 
      //It's not calling anything, but it should call here!
      $call = $this->actions[$data['action']]['function'];

      return [
        'status' => 'sucess', 
        'code' => 200,
        'mensaje' => "Operación realizada.",
        'data' => "Datos que devuelve la función correspondiente."
      ]; 
    }
  }

  try {
    $controlador = new Controller();

    $resultado = $controlador->call($_POST);

    echo json_encode($resultado, JSON_PRETTY_PRINT);

  } catch (Throwable $error) {
    $error = [
      'status' => 'error', 
      'code' => $error->getCode(),
      'linea' => $error->getLine(),
      'mensaje' => $error->getMessage()
    ];

    echo json_encode($error, JSON_PRETTY_PRINT);
    return($error);
  }
  
?>