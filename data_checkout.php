<?php
  $shipping = $_POST['shipping'];

  $shippings = 0;

  if ($shipping == 50)
  {
      $shipping = 50;
  }
  else if ($shipping == 80)
  {
      $shipping = 80;
  }
  else {
      $shipping = 0;
  }

  return $shipping;
?>
