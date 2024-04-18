<?php
  require_once 'module.php';
  $rawData = file_get_contents('php://input');
  $requests = json_decode($rawData, true);
  $requests['content'] = str_replace('§', "\n", 
    str_replace('<br />', '', $requests['content'])
  );
  $send1 = sendMailToGuest($requests);
  $send2 = sendMailToManager($requests);
  header('Content-Type: application/json');
  echo json_encode([
    'req' => $requests,
    'res1' => $send1,
    'res2' => $send2,
  ]);
  exit();