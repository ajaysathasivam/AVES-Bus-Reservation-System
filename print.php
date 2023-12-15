<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=600, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
   setTimeout(function(){
   	docprint.close()
   },750)
}
</script>
<style>
.bt{
	background - color: white;
	border: 2px solid #e7e7e7;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: overline;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px 0px 800px;
  transition-duration: 0.4s;
  cursor: pointer;
  
}

.bt:hover {background-color: #e7e7e7;}
#print_content
{
  margin-top: 70px;
  margin-bottom: 5%;
  margin-right: 50%;
  margin-left: 30%;
}
.home
{
  margin-top: 5px;
  margin-bottom: 0%;
  margin-right: 40%;
  margin-left: 30%;
}	
.printall
{
	background-image:'busreservation/AVES.jpg';
}
</style>
<div class = printall>
	<div class = home>
	<a href="index.php">Home</a><br><br>
	Print and present this details upon boarding the bus.<br><br>
	</div>
		<div id="print_content" style="width: 400px;" >
	<strong>Ticket Reservation Details</strong><br><br>
<?php
include('db.php');
$id=$_GET['id'];
$setnum=$_GET['setnum'];
$result = mysqli_query($conn,"SELECT * FROM customer WHERE transactionum='$id'");
while($row = mysqli_fetch_array($result))
	{
		echo 'Transaction Number : '.$row['transactionum'].'<br>'.'<br>';
		echo 'Name : '.$row['fname'].' '.$row['lname'].'<br>'.'<br>';
		echo 'Address : '.$row['address'].'<br>'.'<br>';
		echo 'Contact : '.$row['contact'].'<br>'.'<br>';
		echo 'Payable : ₹'.$row['payable'].'<br>'.'<br>';
	}
$results = mysqli_query($conn,"SELECT * FROM reserve WHERE transactionnum='$id'");
while($rows = mysqli_fetch_array($results))
	{
		$ggagaga=$rows['bus'];
		echo 'Route Type of Bus : ';
		$resulta = mysqli_query($conn,"SELECT * FROM route WHERE id='$ggagaga'");
		while($rowa = mysqli_fetch_array($resulta))
			{
			echo $rowa['route'].'<br>'.'<br>'.$rowa['type'].'<br>'.'<br>';
			$time=$rowa['time'];
			}
		echo 'Time of Departure : '.$time.'<br>'.'<br>';
		echo 'Seat Number : '.$setnum.'<br>'.'<br>';
		echo 'Date Of Travel : '.$rows['date'].'<br>'.'<br>';
	}
?>
		</div>
	<div class = bt>
	<a href="javascript:Clickheretoprint()">Print</a>
	</div>
</div>