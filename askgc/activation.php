<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Activation Page</title>
    
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="form">
      <ul class="tab-group">
        <li class="tab active" ><a href="#activation">Activation Page</a></li>
      </ul>
      
      <div class="tab active">
        
        <div id="activation" ><span style=" text-align:center"><img src="../images/askgcpic.png" class="png" align="middle"></span> 
         <table>
           <tr>
           <td style=" text-align:center">&nbsp;</td>
           </tr>
         </table>
      
          <form action="processactivation.php" method="post" autocomplete="off">
           
           <div class="field-wrap">
            <label>
               <span class="req">*</span>
            </label>
            <input type="hidden" required autocomplete="off" name="activation" value=<?php if(isset($_GET['activation'])){ echo $_GET['activation'];} else{header("Location:login.php");}?>>
           </div>
   		<button type="submit" class="button button-block" name="submit">Activate Account</button>

	</form>
       </div>
     </div>
</div>

</body>

</html>

