<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SheetDB\SheetDB;
use App\Models\AdminModel;

class GoogleSheet extends Controller
{
  public function import()
  {
  $sheetd=new SheetDB("vlxpi0gaqw3le","Questions");
  $admin=new AdminModel();
$data=$sheetd->get();
for($d=11;$d<count($data);$d++)
{

  $id=$admin->isGroupPresent($data[$d]->MainGroup,$data[$d]->Threshold);
  if($data[$d]->SubGroup=="")
  {
    $subgroup=0;
  }
  else {
    $subgroup=$admin->isSubGroupPresent($data[$d]->SubGroup,$id);
  }
  $weight=$data[$d]->Weight;
  if($weight=="")
  {
    $weight=0;
  }

  $priority=$data[$d]->Priority;
  if($priority=="")
  {
    $priority=0;
  }
  $admin->addQuestion($data[$d]->Question,$id,$subgroup,"True","False","True",$weight,$priority,$data[$d]->Option);
}
}
}
