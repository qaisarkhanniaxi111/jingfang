<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AssessmentModel extends Model
{
    use HasFactory;
    function getClientDetailByCode($code)
    {
      $result=  DB::select(DB::raw("select * from invitations where invitationcode=$code"));
      return $result;
    }

    function getQuestions()
    {
      $result=  DB::select(DB::raw("select * from questions where subgroupid=0"));
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
      $result=  DB::select(DB::raw("update invitations set stage='Closed' where id=$id"));
    }
    function getResults($id)
    {
      $result=  DB::select(DB::raw("select questions.question,questions.answer as questionanswer,questions.maingroupid as maingroupid, questions.subgroupid as subgroupid,questions.reservevalue,questions.weight,questions.priority,results.answer as resultsanswer,invitations.firstname,invitations.lastname,maingroup.id as maingroupid,maingroup.name from questions,results,invitations,maingroup where invitations.id=results.customerid and questions.id=results.questionid and maingroup.id=questions.maingroupid and results.customerid=$id;"));
      return $result;
    }
    function getAllSubGroups()
    {
      $result=  DB::select(DB::raw("select * from subgroup;"));
      return $result;
    }

}
