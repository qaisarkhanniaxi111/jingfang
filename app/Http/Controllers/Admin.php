<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\AssessmentModel;
use App\Models\Processing;
use Illuminate\Support\Facades\Session;
use Redirect;
use Str;
use Mail;

class Admin extends Controller
{
  public function __construct()
  {
  }
    public function login()
    {
      return View("admin/login",array("loginfailed"=>""));
    }
    public function loginsubmit(Request $r)
    {
      $recaptcha_secret="6LeGza4mAAAAALvmgwLlmELm-tCdQtrVqhCOcGzR";
      $responsee=$r->get("g-recaptcha-response");
      $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$responsee);
      $response=json_decode($response,true);
      if($response["success"]===true)
      {
      $r->validate([
  'username'=>'required',
  'password'=>'required'
]);
$username=$r->get("username");
$password=$r->get("password");
$ad=new AdminModel();
$result=$ad->login($username,$password);
if($result>0)
{
  Session::put("admin","admin");
  return redirect("/dashboard");
}
else {
  return View("admin/login",array("loginfailed"=>"Credentials do not match"));
}
}
else {
  return View("admin/login",array("loginfailed"=>"Recaptcha error"));
}
}

public function dashboard()
{
  $admin=new AdminModel();
//  $results=$admin->getResults();
//  $invites=$admin->getInvites();
   $results=[];
   $invites=[];
  return View("admin.admintop").View("admin/dashboard",["results"=>count($results),"invites"=>count($invites)]);
}

public function groups()
{
  $ad=new AdminModel();
  $groups=$ad->getGroups();
  return View("admin.admintop").View("admin/groups",["groups"=>$groups]);
}

public function addGroup(Request $r)
{
  $name=$r->get("name");
  $threshold=$r->get("threshold");
  $admin=new AdminModel();
  $id=$admin->addGroup($name,$threshold);
  return $id;
}

public function editGroup(Request $r)
{
  $name=$r->get("name");
  $threshold=$r->get("threshold");
  $id=$r->get("id");
  $admin=new AdminModel();
  $id=$admin->editGroup($id,$name,$threshold);
  return "";
}

public function deleteGroup(Request $r)
{
  $id=$r->get("id");
  $admin=new AdminModel();
  $id=$admin->deleteGroup($id);
  return "";
}

public function subgroups()
{
  $ad=new AdminModel();
  $groups=$ad->getGroups();
  $subgroups=$ad->getSubGroups($groups[0]->id);
  return View("admin.admintop").View("admin/subgroups",["groups"=>$groups,"subgroups"=>$subgroups]);
}

public function addSubGroup(Request $r)
{
  $name=$r->get("name");
  $maingroup=$r->get("maingroup");
  $admin=new AdminModel();
  $id=$admin->addSubGroup($name,$maingroup);
  return $id;
}

public function editSubGroup(Request $r)
{
  $name=$r->get("name");
  $maingroup=$r->get("maingroup");
  $id=$r->get("id");
  $admin=new AdminModel();
  $id=$admin->editGroup($id,$name,$maingroup);
  return "";
}

public function deleteSubGroup(Request $r)
{
  $id=$r->get("id");
  $admin=new AdminModel();
  $id=$admin->deleteGroup($id);
  return "";
}

public function changeGroup(Request $r)
{
  $ad=new AdminModel();
  $maingroupid=$r->get("maingroup");
  $subgroups=$ad->getSubGroups($maingroupid);
  return $subgroups;
}

public function invites()
{
  $ad=new AdminModel();
  $invites=$ad->getClinicans();
  return View("admin.admintop").View("admin/invites",array("invites"=>$invites));
}

public function addInvite(Request $r)
{

  $firstname=$r->get("firstname");
  $lastname=$r->get("lastname");
  $emailaddress=$r->get("emailaddress");
  $status=$r->get("status");
  if($status=="enable")
  {
    $status="e";
  }
  else {
    $status="d";
  }
   $password=Str::random(10);

$data=array("first"=>$firstname,"lastname"=>$lastname,"emailaddress"=>$emailaddress,"random"=>$password);
Mail::send("admin.invitetemplate",$data,function($messages) use ($emailaddress){
$messages->to($emailaddress);
$messages->subject("Invitation to use the JingFang Assessment as a Clinican");
});

$ad=new AdminModel();
$ad->addInvite($firstname,$lastname,$emailaddress,$password,$status);
return "";
}

public function questions()
{
  $ad=new AdminModel();
  $groups=$ad->getGroups();
  $subgroups=$ad->getSubGroups($groups[0]->id);
  $questions=$ad->getQuestions($groups[0]->id);
  return View("admin.admintop").View("admin/questions",["groups"=>$groups,"subgroups"=>$subgroups,"questions"=>$questions]);
}

public function addQuestion(Request $r)
{
  $description=$r->get("description");
  $maingroupid=$r->get("maingroupid");
  $subgroupid=$r->get("subgroupid");
  $option1=$r->get("option1");
  $option2=$r->get("option2");
  $trueAnswer=$r->get("trueAnswer");
  $weight=$r->get("weight");
  $priority=$r->get("priority");

  if($weight=="")
  {
    $weight=0;
  }
  if($priority=="")
  {
    $priority=0;
  }
  $ad=new AdminModel();
  $result=$ad->addQuestion($description,$maingroupid,$subgroupid,$option1,$option2,$trueAnswer,$weight,$priority);

  return $result[0]->last;
}

public function editQuestion(Request $r)
{
  $id=$r->get("id");
  $description=$r->get("description");
  $maingroupid=$r->get("maingroupid");
  $subgroupid=$r->get("subgroupid");
  $option1=$r->get("option1");
  $option2=$r->get("option2");
  $trueAnswer=$r->get("trueAnswer");
  $weight=$r->get("weight");
  $priority=$r->get("priority");

  if($weight=="")
  {
    $weight=0;
  }
  if($priority=="")
  {
    $priority=0;
  }
  $ad=new AdminModel();
  $result=$ad->editQuestion($id,$description,$maingroupid,$subgroupid,$option1,$option2,$trueAnswer,$weight,$priority);

  return "";
}

public function deleteQuestion(Request $r)
{
  $id=$r->get("id");
  $ad=new AdminModel();
  $result=$ad->deleteQuestion($id);
  return "";
}

public function changeMainGroupQuestion(Request $r)
{
  $id=$r->get("maingroup");
  $ad=new AdminModel();
  $subgroups=$ad->getSubGroups($id);
  $questions=$ad->getQuestions($id);
  return [$subgroups,$questions];
}

public function changeSubGroupQuestion(Request $r)
{
  $maingroup=$r->get("maingroup");
  $subgroup=$r->get("subgroup");
  $ad=new AdminModel();
  $questions=$ad->getQuestionsSubgroup($maingroup,$subgroup);
  return $questions;
}

public function results()
{
  $admin=new AdminModel();
  $results=$admin->getResults();
  return View("admin.admintop").View("admin/results",["results"=>$results]);
}

public function viewResultAdmin(Request $r)
{
  $id=$r->get("id");

  $assessment=new AssessmentModel();


    $user=$assessment->getClientDetailById($id);
  if($user[0]->stage=="Closed")
  {
  $results=$assessment->getResults($user[0]->id);
  $p=new Processing;
  $data=$p->calculateTheResult($results,$user[0]->id);

  $maingroups2=$data[0];
  //print_r($maingroups);
  $mainGroupsAnsweredCorrect2=$data[1];
  $mainGroupsAnsweredIncorrect2=$data[2];

  $maingroupsTotalQuestions2=$data[3];
  $maingroupsCorrectQuestions2=$data[4];

  $maingroups=[];
  $mainGroupsAnsweredCorrect=[];
  $mainGroupsAnsweredIncorrect=[];
  $maingroupsTotalQuestions=[];
  $maingroupsCorrectQuestions=[];


        $priorityQuestions2=$data[5];
        $sGroups2=$data[7];
        $sGroupsPostiveAnswered2=$data[8];
        $sGroupsUnknownAnswered2=$data[9];
        $sGroupsNegativeOrNAAnswered2=$data[10];
        $clients=$assessment->getClientDetailById($user[0]->id);
        $firstname=$clients[0]->firstname;
        $lastname=$clients[0]->lastname;
        $attemptdate=$clients[0]->attemptdate;

        $priorityQuestions=[];
        $sGroups=[];
        $sGroupsPostiveAnswered=[];
        $sGroupsUnknownAnswered=[];
        $sGroupsNegativeOrNAAnswered=[];


  $percentages=[];
  for($i=0;$i<count($maingroups2);$i++)
  {
  $percentages[''.$maingroupsCorrectQuestions2[$i]/$maingroupsTotalQuestions2[$i].'']=$maingroups2[$i];

  }

  krsort($percentages);
  $p=array_keys($percentages);
  for($i=0;$i<count($maingroups2);$i++)
  {

    $flag=0;
    for($j=0;$j<count($p);$j++)
    {
      $g=$percentages[$p[$j]];
      if($g==$maingroups2[$i])
      {
        $flag=1;break;
      }
    }
    if($flag==0)
    {
      $percentages[$maingroups2[$i]]=$maingroups2[$i];
    }
  }

  $p=array_keys($percentages);
  for($i=0;$i<count($p);$i++)
  {
    $g=$percentages[$p[$i]];
    for($j=0;$j<count($maingroups2);$j++)
    {
      if($g==$maingroups2[$j])
      {
        $maingroups[$i]=$maingroups2[$j];
        $mainGroupsAnsweredCorrect[$i]=$mainGroupsAnsweredCorrect2[$j];
        $mainGroupsAnsweredIncorrect[$i]=$mainGroupsAnsweredIncorrect2[$j];
        $maingroupsCorrectQuestions[$i]=$maingroupsCorrectQuestions2[$j];
        $maingroupsTotalQuestions[$i]=$maingroupsTotalQuestions2[$j];
        $priorityQuestions[$i]=$priorityQuestions2[$j];
        $sGroups[$i]=$sGroups2[$j];
        $sGroupsPostiveAnswered[$i]=$sGroupsPostiveAnswered2[$j];
        $sGroupsUnknownAnswered[$i]=$sGroupsUnknownAnswered2[$j];
        $sGroupsNegativeOrNAAnswered[$i]=$sGroupsNegativeOrNAAnswered2[$j];
      }
    }
  }

  return View("assessment.assessmenttop").View("assessment/viewResultSubmit",["firstname"=>$firstname,"lastname"=>$lastname,"maingroups"=>$maingroups,"maingroupstotalquestions"=>$maingroupsTotalQuestions,"maingroupscorrectquestions"=>$maingroupsCorrectQuestions,"maingroupsansweredcorrect"=>$mainGroupsAnsweredCorrect,"maingroupsansweredincorrect"=>$mainGroupsAnsweredIncorrect,"sgroups"=>$sGroups,"sgroupsansweredpositively"=>$sGroupsPostiveAnswered,"sgroupsunknownanswered"=>$sGroupsUnknownAnswered,"sgroupsnegativeonaanswered"=>$sGroupsNegativeOrNAAnswered,"attemptdate"=>$attemptdate]);
}
else {
  echo "Sorry result is not ready";
}
}




public function surveyresult()
{
  $admin=new AdminModel();
  $result=$admin->getSurveyResult();
  $invites=$admin->totalInvitesSent();
  $firstfamily=[0,0,0,0,0,0];
  $secondfamily=[0,0,0,0,0,0];
  $thirdfamily=[0,0,0,0,0,0];
  $resultstouse=[0,0,0,0,0,0];
  foreach($result as $r)
  {
    $index=$r->firstfamily;
    $firstfamily[$index]+=1;
    $index=$r->secondfamily;
    $secondfamily[$index]+=1;
    $index=$r->thirdfamily;
    $thirdfamily[$index]+=1;
    $index=$r->finalresult;
    $resultstouse[$index]+=1;
  }
  return View("admin.admintop").View("admin/surveyresult",["result"=>count($result),"invites"=>count($invites),"firstfamily"=>$firstfamily,"secondfamily"=>$secondfamily,"thirdfamily"=>$thirdfamily,"resultstouse"=>$resultstouse]);
}

public function changestatus(Request $r)
{
  $id=$r->get("id");
  $status=$r->get("status");
  $admin=new AdminModel();
  $admin->changeStatus($id,$status);
  return "";
}

public function logout()
{
  Session::forget("admin");
  return redirect("/admin");
}

}
