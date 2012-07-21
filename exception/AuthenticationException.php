<?php
namespace exception;

class AuthenticationException extends \Exception {

  const UNKNOWN_USER=-100;
  const AUTH_FAILED=-200;

  private $exitCode;

  public function __construct($exitCode){
    parent::__construct();
    $this->exitCode=$exitCode;
  }

  public function getExitCode() {
    return $this->exitCode;
  }
  
}