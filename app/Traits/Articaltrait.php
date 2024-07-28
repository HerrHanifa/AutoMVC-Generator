<?php

namespace App\Traits;

trait Articaltrait
{
     public function get_colection_with_url($var) 
{
 foreach($var as $var1)
 {
  $var1->main_image= asset('image/'.$var1->main_image.'');
 }
return $var;
}

public function get_var_with_url($var) 
{

  $var->main_image= asset('image/'.$var->main_image.'');
 
return $var;
}
}