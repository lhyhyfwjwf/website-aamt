<?php
$genmul=$_SERVER['DOCUMENT_ROOT'];
require_once("$genmul/wp-config.php");
?>
<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package consultup
 */

get_header(); ?>
<!--==================== ti breadcrumb section ====================-->
<?php get_template_part('index','banner'); ?>
<!--==================== main content section ====================-->

<head>
    <style type="text/css">
        #resulttable {

            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
            text-align: center;


        }

        #resultth {
            border: 1px solid black;
            height: 70px;
            font-weight: bold;
            text-align: center;
            font-size: 16px;
            padding-left: 15px;
            padding-right: 15px;
            background-color: cornflowerblue;
            color: white;

        }
        #resultthh {
            border: 1px solid black;
            height: 70px;
            font-weight: bold;
            text-align: center;
            font-size: 16px;
            padding-left: 15px;
            padding-right: 15px;
            background-color: #2367e2;
            color: white;

        }

        #resulttr {
            border: 1px solid black;
            height: 50px;


        }

        #resulttd {
            border: 1px solid black;
            height: 50px;
            padding-left: 15px;
            padding-right: 15px;
        }

        #resulttr:hover {
            background-color: #f5f5f5
        }
    </style>

</head>


<main id="content">
    <div class="container">
      
        
                <h2>All Applications:</h2><br>

                <?php
                include("conndb.php");
               $ar=$_GET['ar'];
 
            $applicationid=$_GET['applicationid'];
        if($ar=="reject"){
            $rejectsql="update aamt_applications set approval='2' where id='$applicationid'";
         
            $rejectResults=mysqli_query($conn, $rejectsql); 
        }
         if($ar=="approve"){
            $approvesql="update aamt_applications set approval='1' where id='$applicationid'";
            
            $rejectResults=mysqli_query($conn, $approvesql); 
        }   
                
                 
                $allResultSql="SELECT * FROM aamt_applications";
                            $rs=mysqli_query($conn, $allResultSql);  
                            if (!$rs){
                                die('Cannot read data:'.mysqli_error());
                            }
                            $r=mysqli_num_rows($rs);   
                            if($r){//0 false 1 true 
                    
                          
                              echo "<table id=\"resulttable\">";
                              echo"
                                    <tr id=\"resulttr\">
                                     
                                        <th id=\"resultthh\" colspan=\"4\">Applicant</th>
                                      
                                        <th id=\"resultthh\" colspan=\"4\">To</th>
                                        
                                        
                                    </tr>
                                    <tr id=\"resulttr\" >
                                        <th id=\"resultth\">No.</th>
                                        <th id=\"resultth\">From Name</th>
                                        <th id=\"resultth\">Phone</th>
                                        <th id=\"resultth\">email</th>
                                        <th id=\"resultth\">To School Name</th>
                                        <th id=\"resultth\">School Address</th>
                                        <th id=\"resultth\">Approve/Reject</th>
                                        <th id=\"resultth\">See Details</th>
                                    </tr>
                                ";

                                    $no=1;
                    while($r = mysqli_fetch_assoc($rs)){
                       
                                $applyFrom=$r['applyFrom'];
                                $applyTo=$r['applyTo'];
                        
                        $applyFromSql = "SELECT * FROM aamt_registerteacher where id='$applyFrom'"; 
                        $applyToSql = "SELECT * FROM aamt_registerschool where id='$applyTo'"; 
                        $fromResults=mysqli_query($conn, $applyFromSql); 
                        $toResults=mysqli_query($conn, $applyToSql); 
                        if (!$fromResults){
                                die('Cannot read data:'.mysqli_error());
                            }else{
                            $fromRows=mysqli_num_rows($fromResults); 
                        }
                            
                        if (!$toResults){
                                die('Cannot read data:'.mysqli_error());
                            }
                            $toRows=mysqli_num_rows($toResults);
                        
                                echo"
                                    <tr id=\"resulttr\">";
                        
                        while($fromRows = mysqli_fetch_assoc($fromResults)){
                        
                            
                                     echo "<td id=\"resulttd\">$no</td>
                                     <td id=\"resulttd\">{$fromRows['firstName']}{$fromRows['lastName']}</td>
                                        <td id=\"resulttd\">+{$fromRows['countryCode']}&nbsp;{$fromRows['phone']}</td>
                                        <td id=\"resulttd\">{$fromRows['email']}</td>";
                                        
                        $no++;
                               while($toRows = mysqli_fetch_assoc($toResults)){   
                                   
                                        echo "<td id=\"resulttd\">{$toRows['schoolName']}</td>
                                        <td id=\"resulttd\">{$toRows['schoolAddress']}&nbsp;{$toRows['city']}&nbsp;{$toRows['state']}&nbsp;{$toRows['country']}</td>
                                        <td id=\"resulttd\">";
                                if ($r['approval']==0){
                                    
                               
        ?>
        <a href="/wp-content/themes/consultup-child/allApplications.php?ar=approve&applicationid=<?php echo $r['id'];?>">Approve</a>&nbsp;&nbsp;<a href="/wp-content/themes/consultup-child/allApplications.php?ar=reject&applicationid=<?php echo $r['id'];?>">Reject</a>
                                   <?php
                                }
                                   if ($r['approval']==1){
                                    ?>
                                                     Approved
                                   <?php
                                }
                                   if ($r['approval']==2){
                                    ?>
                                                     Rejected
                                   <?php
                                }
                                   echo "</td><td>";?>
        <a href="/wp-content/themes/consultup-child/approvalApplication.php?toid=<?php echo $toRows['id'];?>&fromemail=<?php echo $fromRows['email'];?>&applicationid=<?php echo $r['id'];?>">See details</a>
        
        <?php "</td>
                                        </tr>";
                                        
                                    
                            

                               }
                               }
                    }
                               
                               
                         }
        echo "</table>"; 
        ?>
        
        <br><br>
        
        
                
                <br>
               
<!--
        <form action="/wp-content/themes/consultup-child/applySendMail.php" method="post">
                                
                                       <input type="text" name="fromemail" value="<?php echo $fromemail;?>" hidden/>
                                    
                                    <input type="text" name="toid" value="<?php echo $toid;?>" hidden/>
                            
                                       <button type="submit" name="s1" value="s1">Confirm</button>
                                   
                                   
                                
                            </form><br>
-->
        
    

        </div>
  


</main>
<?php
get_footer();
?>