<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;

class AssessmentModel extends Model
{
    use HasFactory;
    function getClientDetailByCode($code)
    {
      $result=  DB::select(DB::raw("select invitations.id as id, clients.id as clientid, clients.firstname, clients.lastname, clients.email,invitations.stage,invitations.attempt from invitations,clients where invitations.clientid=clients.id and invitationcode=$code"));
      return $result;
    }
    function getClinicianDetailsById($id)
    {
      $result=  DB::select(DB::raw("select * from clinicans where id=$id"));
      return $result;
    }
    function getClientDetailById($id)
    {
      $result=  DB::select(DB::raw("select invitations.id as id, clients.id as clientid, clients.firstname, clients.lastname, clients.email,invitations.stage,invitations.attempt,invitations.attemptdate from invitations,clients where invitations.clientid=clients.id and invitations.id=$id"));
      return $result;
    }

    function getClientDetailsForResultComparison($id)
    {
      $result=  DB::select(DB::raw("select * from invitations where clientid=$id and stage='Closed' and testing=0"));
      return $result;
    }

    function getQuestions()
    {
      $result=  DB::select(DB::raw("select questions.*,maingroup.name as maingroupname from questions left join maingroup on questions.maingroupid = maingroup.id where questions.subgroupid=0 "));
      return $result;
    }
    function submitQuestionAnswer($customerid,$questionid,$answer)
    {
      $result=  DB::select(DB::raw("insert into results(customerid,questionid,answer)values($customerid,$questionid,'$answer')"));
      return $result;
    }
    function getMainCategoryAnswers($customerid)
    {
      $result=  DB::select(DB::raw("select maingroup.id as maingroupid,maingroup.name,maingroup.threshold,invitations.id as customerid,questions.id as questionid,questions.answer,questions.weight,questions.priority,questions.reservevalue,results.answer as resultsanswer from maingroup,invitations,questions,results where maingroup.id=questions.maingroupid and questions.subgroupid=0 and invitations.id=results.customerid and questions.id=results.questionid and invitations.id=$customerid"));
      return $result;
    }
    function getSubCategoryQuestions($txt)
    {
      $result=  DB::select(DB::raw($txt));
      return $result;
    }
    function updateEvaluationStatus($id)
    {
      $result=  DB::select(DB::raw("update invitations set attempt='y',stage='1st phase' where id=$id"));
    }
    function closeStage($id)
    {
      $now=new DateTime();
      $day=$now->format("d");
      $mon=$now->format("m");
      $year=$now->format("Y");
      $date=$year.'-'.$mon.'-'.$day;
      $result=  DB::select(DB::raw("update invitations set stage='Closed',attemptdate='$date' where id=$id"));
    }
    function getResults($id)
    {
      $result=  DB::select(DB::raw("select questions.question,questions.answer as questionanswer,questions.maingroupid as maingroupid, questions.subgroupid as subgroupid,questions.reservevalue,questions.weight,questions.priority,results.answer as resultsanswer,maingroup.id as maingroupid,maingroup.name from questions,results,invitations,maingroup where invitations.id=results.customerid and questions.id=results.questionid and maingroup.id=questions.maingroupid and invitations.id=$id;"));
      return $result;
    }
    function getAllSubGroups()
    {
      $result=  DB::select(DB::raw("select * from subgroup;"));
      return $result;
    }

    function matchPassword($password)
    {
      $result=  DB::select(DB::raw("select * from clinicans where password='$password'"));
      return $result;
    }
    function setPassword($id,$password)
    {
      $result=  DB::select(DB::raw("update clinicans set password='$password' where id=$id"));
      return $result;
    }

    function getClientDataByEmail($email)
    {
      $result=  DB::select(DB::raw("select * from invitations where emailaddress='$email'"));
      return $result;
    }

    public function getInvites($clientid,$inviteby)
    {
    $result=  DB::select(DB::raw("select invitations.id as invitationid, invitations.invitationcode,invitations.attempt,invitations.stage,invitations.attemptdate,invitations.invitedate,invitations.testing,invitations.firstfamily, clients.id as clientid,clients.firstname,clients.lastname,clients.email from invitations,clients where invitations.clientid=clients.id and invitations.clientid=$clientid and invitations.inviteby=$inviteby"));
    return $result;
    }

    public function getInvitesBySearchTerm($clientid,$inviteby,$searchterm)
    {
    $result=  DB::select(DB::raw("select invitations.id as invitationid, invitations.invitationcode,invitations.attempt,invitations.stage,invitations.attemptdate,invitations.invitedate,invitations.testing,invitations.firstfamily, clients.id as clientid,clients.firstname,clients.lastname,clients.email from invitations,clients where invitations.clientid=clients.id and invitations.clientid=$clientid and invitations.inviteby=$inviteby and (clients.firstname like '%$searchterm%' or clients.lastname like '%$searchterm%')"));
    return $result;
    }

    public function getClientsInvitedByMe($id)
    {
    $result=  DB::select(DB::raw("select distinct invitations.clientid from clinicans,invitations where clinicans.id=invitations.inviteby and invitations.inviteby=$id
"));
    return $result;
    }

    public function getClientsInvitedByMeForPendingSurveys($id)
    {
    $result=  DB::select(DB::raw("select invitations.id as invitationid, invitations.invitationcode,invitations.attempt,invitations.stage,invitations.attemptdate,invitations.invitedate,invitations.testing,invitations.firstfamily, clients.id as clientid,clients.firstname,clients.lastname,clients.email from invitations,clients where invitations.clientid=clients.id and invitations.testing=0 and invitations.firstfamily is null and invitations.inviteby=$id
"));
    return $result;
    }

    public function putSurveyResult($id,$firstfamily,$secondfamily,$thirdfamily,$resultsuseful)
    {
    $result=  DB::select(DB::raw("update invitations set firstfamily=$firstfamily,secondfamily=$secondfamily,thirdfamily=$thirdfamily,finalresult=$resultsuseful where id=$id"));
    return $result;
    }

    public function addInviteByUser($clientid,$random,$id,$date2,$testinguser)
    {
    $result=  DB::select(DB::raw("insert into invitations(clientid,invitationcode,attempt,stage,inviteby,invitedate,testing) values($clientid,$random,'n','Not attempted',$id,'$date2',$testinguser)"));
    $result=  DB::select(DB::raw("select LAST_INSERT_ID() as last;"));
    return $result[0]->last;
    }

    public function seeIfClientIsTesting($clientid)
    {
    $result=  DB::select(DB::raw("select * from invitations where clientid=$clientid and testing=1"));
    return $result;
    }

    public function getClient($id)
    {
      $result=DB::select(DB::raw("select * from clients where id=$id"));
      return $result;
    }

    public function addClient($first,$last,$email)
    {
      DB::select(DB::raw("insert into clients(firstname,lastname,email) values('$first','$last','$email')"));
      $result=  DB::select(DB::raw("select LAST_INSERT_ID() as last;"));
      return $result[0]->last;
    }

    public function getClinicanRecord($email,$password)
    {
    $result=  DB::select(DB::raw("select * from clinicans where email='$email' and password='$password' and status='e' "));
    return $result;
    }

}
