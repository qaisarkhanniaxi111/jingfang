<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminModel extends Model
{
    use HasFactory;
    public function login($username,$password)
    {
    $result=  DB::select(DB::raw("select * from credentials where accounttype='Admin' and username='$username' and password='$password'"));
    return count($result);
    }

    public function getGroups()
    {
    $result=  DB::select(DB::raw("select * from maingroup"));
    return $result;
    }

    public function addGroup($name,$threshold)
    {
    $result=  DB::select(DB::raw("insert into  maingroup (name, threshold) VALUES ('$name',$threshold)"));

    $result=  DB::select(DB::raw("select id from maingroup where name='$name' and threshold=$threshold"));
    return $result[0]->id;
    }

    public function editGroup($id,$name,$threshold)
    {
    $result=  DB::select(DB::raw("update maingroup set name='$name',threshold=$threshold where id=$id"));
    }

    public function deleteGroup($id)
    {
    $result=  DB::select(DB::raw("delete from maingroup where id=$id"));
    }

    public function getSubGroups($id)
    {
    $result=  DB::select(DB::raw("select * from subgroup where maingroupid=$id"));
    return $result;
    }


    public function addSubGroup($name,$maingroup)
    {
    $result=  DB::select(DB::raw("insert into  subgroup (name, maingroupid) VALUES ('$name',$maingroup)"));

    $result=  DB::select(DB::raw("select id from subgroup where name='$name' and maingroupid=$maingroup"));
    return $result[0]->id;
    }

    public function editSubGroup($id,$name,$maingroup)
    {
    $result=  DB::select(DB::raw("update subgroup set name='$name',maingroupid=$maingroup where id=$id"));
    }

    public function deleteSubGroup($id)
    {
    $result=  DB::select(DB::raw("delete from subgroup where id=$id"));
    }

    public function getInvites()
    {
    $result=  DB::select(DB::raw("select * from invitations"));
    return $result;
    }

    public function getClinicans()
    {
    $result=  DB::select(DB::raw("select * from clinicans"));
    return $result;
    }

    public function addInvite($first,$last,$email,$code,$status)
    {
    $result=  DB::select(DB::raw("insert into clinicans(firstname,lastname,email,password,status) values('$first','$last','$email','$code','$status')"));
    return $result;
    }

    public function changeStatus($id,$status)
    {
    $result=  DB::select(DB::raw("update clinicans set status='$status' where id=$id"));
    return $result;
    }

    public function getQuestions($id)
    {
    $result=  DB::select(DB::raw("select * from questions where maingroupid=$id and subgroupid=0"));
    return $result;
    }

    public function getQuestionsSubgroup($maingroup,$subgroup)
    {
    $result=  DB::select(DB::raw("select * from questions where maingroupid=$maingroup and subgroupid=$subgroup"));
    return $result;
    }

    public function addQuestion($description,$maingroupid,$subgroupid,$option1,$option2,$trueAnswer,$weight,$priority,$reserve="")
    {
    $result=  DB::select(DB::raw("insert into questions(question,questionoption1,questionoption2,answer,weight,priority,maingroupid,subgroupid,reservevalue) values('$description','$option1','$option2','$trueAnswer',$weight,$priority,$maingroupid,$subgroupid,'$reserve')"));
    $result=  DB::select(DB::raw("select LAST_INSERT_ID() as last;"));
    return $result;
    }

    public function editQuestion($id,$description,$maingroupid,$subgroupid,$option1,$option2,$trueAnswer,$weight,$priority)
    {
    $result=  DB::select(DB::raw("update questions set question='$description',questionoption1='$option1',questionoption2='$option2',answer='$trueAnswer',weight=$weight,priority=$priority where id=$id"));
    return $result;
    }

    public function deleteQuestion($id)
    {
      $result=  DB::select(DB::raw("delete from questions where id=$id"));
    }

    public function isGroupPresent($name,$threshold)
    {
    $result=  DB::select(DB::raw("select * from maingroup where name='$name'"));
    if(count($result)>0)
    {
      return $result[0]->id;
    }
    else {

      $result=  DB::select(DB::raw("insert maingroup (name,threshold) values('$name',$threshold)"));
      $result=  DB::select(DB::raw("select LAST_INSERT_ID() as last;"));
      return $result[0]->last;
    }
  }

    public function isSubGroupPresent($name,$maingroup)
    {
    $result=  DB::select(DB::raw("select * from subgroup where name='$name'"));
    if(count($result)>0)
    {
      return $result[0]->id;
    }
    else {

      $result=  DB::select(DB::raw("insert subgroup (name,maingroupid) values('$name',$maingroup)"));
      $result=  DB::select(DB::raw("select LAST_INSERT_ID() as last;"));
      return $result[0]->last;
    }

    }

    public function getResults()
    {
    $result=  DB::select(DB::raw("select invitations.id as id, clients.id as clientid, clients.firstname, clients.lastname, clients.email,invitations.stage,invitations.attempt,invitations.attemptdate from invitations,clients where clients.id=invitations.clientid and stage='Closed'"));
    return $result;
    }

    public function getSurveyResult()
    {
    $result=  DB::select(DB::raw("select * from invitations where firstfamily is not null and testing!=1;"));
    return $result;
    }

    public function totalInvitesSent()
    {
    $result=  DB::select(DB::raw("select * from invitations where testing!=1;"));
    return $result;
    }



}
