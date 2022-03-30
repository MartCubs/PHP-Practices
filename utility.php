<?php


$todo=$_POST['todo'];
if(isset($todo) and $todo=="search"){
$search_text=$_POST['search_text'];
$type=$_POST['type'];

$search_text=ltrim($search_text);
$search_text=rtrim($search_text);

if($type<>"any"){
$query="select * from student where name='$search_text'";
}else{
$kt=split(" ",$search_text);//Breaking the string to array of words
// Now let us generate the sql 
while(list($key,$val)=each($kt)){
if($val<>" " and strlen($val) > 0){$q .= " name like '%$val%' or ";}

}// end of while
$q=substr($q,0,(strlen($q)-3));
// this will remove the last or from the string. 
$query="select * from student where $q ";
} // end of if else based on type value
echo $query;
echo "<br><br>";
$nt=mysql_query($query);
echo mysql_error();
while($row=mysql_fetch_array($nt)){
echo "$row[name],$row[class]<br>";
}
// End if form submitted


}else{
echo "<form method=post action=''><input type=hidden name=todo value=search>
<input type=text name=search_text ><input type=submit value=Search><br>
<input type=radio name=type value=any checked>Match any where <input type=radio name=type value=exact>Exact Match

</form>
";
}

?>