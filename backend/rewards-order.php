<?
include 'header.php';
include_once("models/rewardsModel.php");
$query = new Rewards();

$ids = $_POST['ids'];
$arr = explode(',',$ids);
for($i=1;$i<=count($arr);$i++)
{
	$q = $query->update_order($ids,$i);
}