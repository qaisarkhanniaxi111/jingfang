<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admina extends Model
{
  public function getAll()
  {
  $result=  DB::select(DB::raw("select * from login"));
  return $result;
  }
  function checkLogin($username,$password)
  {
    $result=  DB::select(DB::raw("select * from login where user='a'&&username='$username'&&password='$password'"));
    return count($result);
  }
  public function getMeta()
  {
    $result=  DB::select(DB::raw("select * from meta"));
    return array($result[0]->hourlyrate,$result[0]->servicecharges,$result[0]->discount);
  }
  public function updateMeta($hour,$service,$discount)
  {
    $result=  DB::select(DB::raw("update meta set hourlyrate=$hour,servicecharges='$service',discount='$discount' "));
    return $result;
  }
  public function getAllCategories()
  {
    $result=  DB::select(DB::raw("select * from category order by position"));
    return $result;
  }
  public function getAllCategoriesData($category)
  {
    $result=  DB::select(DB::raw("select * from categories where category='$category' order by position"));
    return $result;
  }
  public function getCategoriesData()
  {
    $result=  DB::select(DB::raw("select * from category order by position"));
    return $result;
  }
  public function addNewCategory($category)
  {
    $result=  DB::select(DB::raw("select position from category order by position desc"));
    $newVal=0;
    if(count($result)>0)
    {
      $val=$result[0]->position;
      $newVal=$val+1;
    }
    else {
      $newVal=1;
    }

    $result=  DB::select(DB::raw("insert into category (categoryname,position) values('$category',$newVal)"));
    return $result;
  }
  public function updateCategory($subcategory,$mintime,$maxtime,$cm,$id)
  {
    $result=  DB::select(DB::raw("select * from categories where id=$id" ));
    $a=$result[0]->subcategory;
    if($a==$subcategory)
    {
    $result=  DB::select(DB::raw("update categories set subcategory='$subcategory',mintime=$mintime,maxtime=$maxtime,cm=$cm where id=$id" ));
    }
    else {
      $result=  DB::select(DB::raw("update categories set subcategory='$subcategory',mintime=$mintime,maxtime=$maxtime,cm=$cm where id=$id" ));
      $result=  DB::select(DB::raw("update questions set subcategory='$subcategory' where subcategory='$a'" ));
    }
    return $result;
  }
  public function addNewSubCategory($category,$subcategory,$mintime,$maxtime,$cm)
  {
    $result=  DB::select(DB::raw("select position from categories where category='$category' order by position desc"));
    $newVal=0;
    if(count($result)>0)
    {
      $val=$result[0]->position;
      $newVal=$val+1;
    }
    else {
      $newVal=1;
    }
    $result=  DB::select(DB::raw("insert into categories (category,subcategory,mintime,maxtime,cm,position) values('$category','$subcategory',$mintime,$maxtime,$cm,$newVal)" ));
    return $result;
  }
  public function deleteCategory($id)
  {
    $result=  DB::select(DB::raw("select * from categories where id=$id" ));
    $a=$result[0]->subcategory;
    $result=  DB::select(DB::raw("delete from categories where id=$id" ));
    $result=  DB::select(DB::raw("delete from questions where subcategory='$a'" ));
    return $result;
  }
  public function getSubCategories($category)
  {
    $result=  DB::select(DB::raw("select * from categories where category='$category' order by position"));
    return $result;
  }

  public function getQuestions($category,$subcategory)
  {
    $result=  DB::select(DB::raw("select * from questions where category='$category' && subcategory='$subcategory' order by position"));
    return $result;
  }
  public function addQuestion($category,$subcategory,$question,$response,$response_type_main,$notes_main,$laymen_main,$correct_main,$mintime_main,$maxtime_main)
  {
    $result=  DB::select(DB::raw("select position from questions where category='$category' and subcategory='$subcategory' order by position desc"));
    $newVal=0;
    if(count($result)>0)
    {
      $val=$result[0]->position;
      $newVal=$val+1;
    }
    else {
      $newVal=1;
    }
    $result=  DB::select(DB::raw("insert into questions (category,subcategory,question,response,notes,laymens,correctanswer,mintime,maxtime,response_type,position) values ('$category','$subcategory','$question','$response','$notes_main','$laymen_main','$correct_main','$mintime_main','$maxtime_main','$response_type_main',$newVal)"));
    return $result;
  }

  public function deleteQuestions($id)
  {
    $result=  DB::select(DB::raw("delete from questions where id=$id"));
    return $result;
  }

  public function editQuestion($category,$subcategory,$question,$response,$response_type_main,$notes_main,$laymen_main,$correct_main,$mintime_main,$maxtime_main,$id)
  {
    $result=  DB::select(DB::raw("update questions set category='$category',subcategory='$subcategory',question='$question',response='$response',response_type='$response_type_main',notes='$notes_main',laymens='$laymen_main',correctanswer='$correct_main',mintime='$mintime_main',maxtime='$maxtime_main' where id=$id"));
    return $result;
  }
  public function getEmailIfExist($email,$code)
  {
    $result=  DB::select(DB::raw("select * from pending where email='$email'"));
    if(count($result)>0)
    {
      DB::select(DB::raw("update pending set code='$code' where email='$email'"));
      return 0;
    }
    else
    {
      $result=  DB::select(DB::raw("select * from login where email='$email'"));
      if(count($result)>0)
      {
        return 1;
      }
      else {
        $result=  DB::select(DB::raw("insert into pending (email,code)values('$email',$code)"));
        return 2;
      }
    }
    return 0;
  }
  public function getAccounts()
  {
    $result=  DB::select(DB::raw("select * from login where user='e'"));
    return $result;
  }
  function searchCategory($category)
  {
    $result=  DB::select(DB::raw("select * from category where categoryname='$category'"));
    return count($result);
  }
  public function savePosition($question,$position)
  {
        $result=  DB::select(DB::raw("update questions set position=$position where id=$question"));
  }

  public function savePositionCategories($question,$position)
  {
        $result=  DB::select(DB::raw("update categories set position=$position where id=$question"));
  }
  public function savePositionCategoriesReorder($question,$position)
  {
        $result=  DB::select(DB::raw("update category set position=$position where id=$question"));
  }
  public function deleteCategorie($category)
  {
        $result=  DB::select(DB::raw("delete from questions where category='$category'"));
        $result=  DB::select(DB::raw("delete from categories where category='$category'"));
        $result=  DB::select(DB::raw("delete from category where categoryname='$category'"));
        return $result;
  }
}
