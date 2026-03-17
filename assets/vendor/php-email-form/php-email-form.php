<?php

class PHP_Email_Form {

  public $to;
  public $from_name;
  public $from_email;
  public $subject;
  public $ajax = false;
  public $messages = array();

  public function add_message($content, $label = '', $min_length = 0) {

    if(strlen($content) > $min_length) {
      $this->messages[] = $label . ": " . $content;
    }

  }

  public function send() {

    $message_body = "";

    foreach($this->messages as $message) {
      $message_body .= $message . "\n";
    }

    $headers = "From: ".$this->from_name." <".$this->from_email.">\r\n";
    $headers .= "Reply-To: ".$this->from_email."\r\n";

    if(mail($this->to, $this->subject, $message_body, $headers)) {
      return "OK";
    } else {
      return "Error sending message";
    }

  }

}
