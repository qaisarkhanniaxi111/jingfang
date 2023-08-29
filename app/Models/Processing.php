<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssessmentModel;

class Processing extends Model
{
    use HasFactory;

    public function processQuestions($customerid,$allquestions,$attemptedquestions)
    {
      $assessment=new AssessmentModel();

      for($i=0;$i<count($allquestions)-1;$i++)
      {
        $flag=0;
        for($j=0;$j<count($attemptedquestions);$j++)
        {
          if($allquestions[$i]==$attemptedquestions[$j][0])
          {
            $flag=1;
            $assessment->submitQuestionAnswer($customerid,$attemptedquestions[$j][0],$attemptedquestions[$j][1]);
            break;
          }
        }
        if($flag==0)
        {
          $assessment->submitQuestionAnswer($customerid,$allquestions[$i],'');
        }
      }
    }

    public function checkIfFirstPhasePassed($customerid)
    {
    $assessment=new AssessmentModel();
    $result=$assessment->getMainCategoryAnswers($customerid);
    $maingroups=[];
    $threshold=[];
    $points=[];
    foreach($result as $r)
    {
      $a=array_search($r->maingroupid,$maingroups);
      $point=0;
      if($a!="")
      {
        if($r->reservevalue!=""&&$r->answer==$r->resultsanswer)
        {

        }
        else {
         if($r->answer==$r->resultsanswer)
         {
           $point=$r->weight;
           $points[$a]+=$point;
         }
        }
      }
      else {
        array_push($maingroups,$r->maingroupid);
        array_push($threshold,$r->threshold);
        if($r->reservevalue!=""&&$r->answer==$r->resultsanswer)
        {

        }
        else {
         if($r->answer==$r->resultsanswer)
         {
           $point=$r->weight;
         }
        }
        array_push($points,$point);
      }
    }
    $passgroups=[];
    for($i=0;$i<count($maingroups);$i++)
    {
      if($points[$i]>=$threshold[$i])
      {
        array_push($passgroups,$maingroups[$i]);
      }
    }

    return $passgroups;
    }

    function getPhase2Questions($result)
    {
      $assessment=new AssessmentModel();
      $txt="";
      for($i=0;$i<count($result);$i++)
      {
        if($i==count($result)-1)
        {
          $txt.="maingroupid=".$result[$i];
        }
        else {
           $txt.="maingroupid=".$result[$i]."  or ";
        }
      }
      $txt="select * from questions where (".$txt.") and subgroupid!=0";
      $res=$assessment->getSubCategoryQuestions($txt);
      return $res;
    }

    function ifAMainCategoryHasSubQuestions($maingroupid,$subcategories)
    {
      foreach($subcategories as $c)
      {
        if($c->maingroupid==$maingroupid)
        {
          return $c->name;
        }
      }

      return "";
    }

    function calculateTheResult($results,$cid)
    {
      $maingroups=[];
      $mainGroupsAnsweredCorrect=[];
      $mainGroupsAnsweredIncorrect=[];
      $maingroupsTotalQuestions=[];
      $maingroupsCorrectQuestions=[];
      $priorityQuestions=[];
      $priorityQuestions=[];
      $sGroups=[];
      $sGroupsPostiveAnswered=[];
      $sGroupsUnknownAnswered=[];
      $sGroupsNegativeOrNAAnswered=[];

      $assessment=new AssessmentModel();
      $subgroups=$assessment->getAllSubGroups();
      $clients=$assessment->getClientDetailById($cid);
      $firstname=$clients[0]->firstname;
      $lastname=$clients[0]->lastname;
      $attemptdate=$clients[0]->attemptdate;

      foreach($results as $r)
      {
        if($r->subgroupid==0)
        {
        $a=array_search($r->name,$maingroups);
        if($a!="")
        {
          $maingroupsTotalQuestions[$a]+=1;

          if($r->reservevalue!=""&&$r->reservevalue==$r->resultsanswer)
          {

          }
          else if($r->questionanswer==$r->resultsanswer)
           {

             $maingroupsCorrectQuestions[$a]+=$r->weight;
             $answer=$mainGroupsAnsweredCorrect[$a];
             array_push($answer,$r->question.'***'.$r->priority);
             $mainGroupsAnsweredCorrect[$a]=$answer;
           }
           else {
             $answer=$mainGroupsAnsweredIncorrect[$a];

             array_push($answer,$r->question.'***'.$r->priority);
             $mainGroupsAnsweredIncorrect[$a]=$answer;
           }
          }

        else {
          array_push($maingroups,$r->name);
          array_push($priorityQuestions,$r->maingroupid);
          array_push($sGroups,"");
          array_push($sGroupsPostiveAnswered,[]);
          array_push($sGroupsNegativeOrNAAnswered,[]);
          array_push($sGroupsUnknownAnswered,[]);

          if($r->reservevalue!=""&&$r->reservevalue==$r->resultsanswer)
          {
           array_push($maingroupsTotalQuestions,0);
           array_push($maingroupsCorrectQuestions,0);

          }
          else if($r->questionanswer==$r->resultsanswer) {
            array_push($maingroupsTotalQuestions,1);
            array_push($maingroupsCorrectQuestions,$r->weight);

            $answer=[];
            array_push($answer,$r->question.'***'.$r->priority);
            array_push($mainGroupsAnsweredCorrect,$answer);
            $answer=[];
            array_push($mainGroupsAnsweredIncorrect,$answer);

        }
        else
        {
          array_push($maingroupsTotalQuestions,1);
           array_push($maingroupsCorrectQuestions,0);
          $answer=[];
          array_push($answer,$r->question.'***'.$r->priority);
          array_push($mainGroupsAnsweredIncorrect,$answer);
          $answer=[];
          array_push($mainGroupsAnsweredCorrect,$answer);
        }
        }
      }
      else {
        $a=array_search($r->name,$maingroups);
        $s=$sGroups[$a];

        if($s!="")
        {
          if($r->reservevalue=="Unknown"&&$r->reservevalue==$r->resultsanswer)
          {
          $answer=$sGroupsUnknownAnswered[$a];
          array_push($answer,$r->question);
          $sGroupsUnknownAnswered[$a]=$answer;
          }
           else if($r->questionanswer==$r->resultsanswer&&$r->reservevalue!="N/A")
           {

             $answer=$sGroupsPostiveAnswered[$a];
             array_push($answer,$r->question);
             $sGroupsPostiveAnswered[$a]=$answer;
           }
           else {
              $answer=$sGroupsNegativeOrNAAnswered[$a];
              array_push($answer,$r->question);
              $sGroupsNegativeOrNAAnswered[$a]=$answer;
           }
          }
        else {
          $sGroups[$a]=$r->subgroupid;

          if($r->reservevalue=="Unknown"&&$r->questionanswer==$r->resultsanswer)
          {
           $answer=$sGroupsUnknownAnswered[$a];
           array_push($answer,$r->question);
           $sGroupsUnknownAnswered[$a]=$answer;
          }
          else if($r->questionanswer==$r->resultsanswer&&$r->reservevalue!="N/A") {

            $answer=$sGroupsPostiveAnswered[$a];
            array_push($answer,$r->question);
            $sGroupsPostiveAnswered[$a]=$answer;

        }
        else
        {
          $answer=$sGroupsNegativeOrNAAnswered[$a];
          array_push($answer,$r->question);
          $sGroupsNegativeOrNAAnswered[$a]=$answer;
        }
      }
    }
  }
  return [$maingroups,$mainGroupsAnsweredCorrect,$mainGroupsAnsweredIncorrect,$maingroupsTotalQuestions,$maingroupsCorrectQuestions,$priorityQuestions,$priorityQuestions,$sGroups,$sGroupsPostiveAnswered,$sGroupsUnknownAnswered,$sGroupsNegativeOrNAAnswered,$firstname,$lastname,$attemptdate];
    }


    function process($results,$cid)
    {
      $maingroups=[];
      $mainGroupsAnsweredCorrect=[];
      $mainGroupsAnsweredIncorrect=[];
      $maingroupsTotalQuestions=[];
      $maingroupsCorrectQuestions=[];
      $priorityQuestions=[];
      $priorityQuestions=[];
      $sGroups=[];
      $sGroupsPostiveAnswered=[];
      $sGroupsUnknownAnswered=[];
      $sGroupsNegativeOrNAAnswered=[];

      $assessment=new AssessmentModel();
      $subgroups=$assessment->getAllSubGroups();
      $clients=$assessment->getClientDetailById($cid);
      $firstname=$clients[0]->firstname;
      $lastname=$clients[0]->lastname;
      $attemptdate=$clients[0]->attemptdate;

      foreach($results as $r)
      {
        if($r->subgroupid==0)
        {
        $a=array_search($r->name,$maingroups);
        if($a!="")
        {
          $maingroupsTotalQuestions[$a]+=1;

          if($r->reservevalue!=""&&$r->reservevalue==$r->resultsanswer)
          {

          }
          else if($r->questionanswer==$r->resultsanswer)
           {

             $maingroupsCorrectQuestions[$a]+=$r->weight;
             $answer=$mainGroupsAnsweredCorrect[$a];
             array_push($answer,$r->question.'***'.$r->priority);
             $mainGroupsAnsweredCorrect[$a]=$answer;
           }
           else {
             $answer=$mainGroupsAnsweredIncorrect[$a];

             array_push($answer,$r->question.'***'.$r->priority);
             $mainGroupsAnsweredIncorrect[$a]=$answer;
           }
          }

        else {
          array_push($maingroups,$r->name);
          array_push($priorityQuestions,$r->maingroupid);
          array_push($sGroups,"");
          array_push($sGroupsPostiveAnswered,[]);
          array_push($sGroupsNegativeOrNAAnswered,[]);
          array_push($sGroupsUnknownAnswered,[]);

          if($r->reservevalue!=""&&$r->reservevalue==$r->resultsanswer)
          {
           array_push($maingroupsTotalQuestions,0);
           array_push($maingroupsCorrectQuestions,0);

          }
          else if($r->questionanswer==$r->resultsanswer) {
            array_push($maingroupsTotalQuestions,1);
            array_push($maingroupsCorrectQuestions,$r->weight);

            $answer=[];
            array_push($answer,$r->question.'***'.$r->priority);
            array_push($mainGroupsAnsweredCorrect,$answer);
            $answer=[];
            array_push($mainGroupsAnsweredIncorrect,$answer);

        }
        else
        {
          array_push($maingroupsTotalQuestions,1);
           array_push($maingroupsCorrectQuestions,0);
          $answer=[];
          array_push($answer,$r->question.'***'.$r->priority);
          array_push($mainGroupsAnsweredIncorrect,$answer);
          $answer=[];
          array_push($mainGroupsAnsweredCorrect,$answer);
        }
        }
      }
      else {
        $a=array_search($r->name,$maingroups);
        $s=$sGroups[$a];

        if($s!="")
        {
          if($r->reservevalue=="Unknown"&&$r->reservevalue==$r->resultsanswer)
          {
          $answer=$sGroupsUnknownAnswered[$a];
          array_push($answer,$r->question);
          $sGroupsUnknownAnswered[$a]=$answer;
          }
           else if($r->questionanswer==$r->resultsanswer&&$r->reservevalue!="N/A")
           {

             $answer=$sGroupsPostiveAnswered[$a];
             array_push($answer,$r->question);
             $sGroupsPostiveAnswered[$a]=$answer;
           }
           else {
              $answer=$sGroupsNegativeOrNAAnswered[$a];
              array_push($answer,$r->question);
              $sGroupsNegativeOrNAAnswered[$a]=$answer;
           }
          }
        else {
          $sGroups[$a]=$r->subgroupid;

          if($r->reservevalue=="Unknown"&&$r->questionanswer==$r->resultsanswer)
          {
           $answer=$sGroupsUnknownAnswered[$a];
           array_push($answer,$r->question);
           $sGroupsUnknownAnswered[$a]=$answer;
          }
          else if($r->questionanswer==$r->resultsanswer&&$r->reservevalue!="N/A") {

            $answer=$sGroupsPostiveAnswered[$a];
            array_push($answer,$r->question);
            $sGroupsPostiveAnswered[$a]=$answer;

        }
        else
        {
          $answer=$sGroupsNegativeOrNAAnswered[$a];
          array_push($answer,$r->question);
          $sGroupsNegativeOrNAAnswered[$a]=$answer;
        }
      }
    }
  }
  return [$maingroups,$maingroupsTotalQuestions,$maingroupsCorrectQuestions];
    }
}
