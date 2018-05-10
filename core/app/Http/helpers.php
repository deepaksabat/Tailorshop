<?php

  function checkPermission($permissions){
    $userAccess = getMyPermission(auth()->user()->is_permission);
    foreach ($permissions as $key => $value) {
      if($value == $userAccess){
        return true;
      }
    }
    return false;
  }

  function getMyPermission($id)
  {
    switch ($id) {
      case 2:
       return 'tailor';
       break;
      case 1:
        return 'salesman';
        break;
      case 3:
        return 'admin';
        break;
      case 4:
            return 'superadmin';
            break;
      default:
        return 'user';
        break;
    }
  }

?>