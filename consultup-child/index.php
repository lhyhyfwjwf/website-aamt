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
include("session.php");
session_start();
get_header(); ?>
<!--==================== ti breadcrumb section ====================-->
<?php get_template_part('index','banner'); ?>
<!--==================== main content section ====================-->
<head>
    <style type="text/css">
        #resulttable{
            
            border-collapse: collapse;
            width:auto; 
            border: 1px solid black;
            text-align: center;
        }
        #resultth{
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
        #resulttr{
            border: 1px solid black;
            height: 50px;  
        }
        #resulttd{
            border: 1px solid black;
            height: 50px;
            padding-left: 15px;
            padding-right: 15px;
        }
        #resulttr:hover{background-color: #f5f5f5}
    </style>
</head>


<main id="content">
    <div class="container">
        <div class="login-grids">
            <div class="col-md-6 log">
        <h2>Find a co-teaching opportunity</h2><br>
        <form action="#" method="post">
            
            <table width="400" height="300">
                <tr>
                    <td><h4>Country</h4></td>
                    <td>
                        <select name="Country" required>
                         <?php
                            $country=$_POST['Country'];
                $level=$_POST['schoolLevel'];
                $subject=$_POST['subject'];
                $_SESSION['country']=$country;
                $_SESSION['level']=$level;
                $_SESSION['subject']=$subject;
                         if($_SESSION['country']==""){?>
                            <option selected hidden value="">Select Country</option>
                            <option value="AU">Australia</option>
                            <option value="CA">Canada</option>
                            <option value="CN">China</option>           
                            <option value="SG">Singapore</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                           <?php  
                         }else{
                         if($_SESSION['country']=="AU"){?>
                              <option value="AU" selected>Australia</option>
                           <?php  
                         }else{?>
                             <option value="AU">Australia</option>
                        <?php }
                         ?>
                          <?php
                         if($_SESSION['country']=="CA"){?>
                              <option value="CA" selected>Canada</option>
                           <?php  
                         }else{?>
                             <option value="CA">Canada</option>
                        <?php }
                         ?> <?php
                         if($_SESSION['country']=="CN"){?>
                              <option value="CN" selected>China</option>
                           <?php  
                         }else{?>
                             <option value="CN">China</option>
                        <?php }
                         ?> <?php
                         if($_SESSION['country']=="SG"){?>
                              <option value="SG" selected>Singapore</option>
                           <?php  
                         }else{?>
                             <option value="SG">Singapore</option>
                        <?php }
                         ?><?php
                         if($_SESSION['country']=="GB"){?>
                              <option value="GB" selected>United Kingdom</option>
                           <?php  
                         }else{?>
                             <option value="GB">United Kingdom</option>
                        <?php }?><?php
                         if($_SESSION['country']=="US"){?>
                              <option value="US" selected>United States</option>
                           <?php  
                         }else{?>
                             <option value="US">United States</option>
                        <?php }
                         }
                         ?>
                     </select>
                    </td>
                </tr>
                
                
                <tr>
                    <td><h4>School Level</h4></td>
                
                    <td>
                        <select name="schoolLevel" required>
                         <?php
                         if($_SESSION['level']==""){?>
                         <option selected hidden value="">Select School Type</option>
                              <option value="1">Early Year</option>
                         <option value="2">Primary</option>
                         <option value="3">Secondary</option>
                         <option value="4">Senior</option>
                         <option value="5">Tertiary</option>
                           <?php  
                         }else{
                         if($_SESSION['level']==1){?>
                              <option value="1" selected>Early Year</option>
                           <?php  
                         }else{?>
                             <option value="1">Early Year</option>
                        <?php }
                         ?>
                          <?php
                         if($_SESSION['level']==2){?>
                              <option value="2" selected>Primary</option>
                           <?php  
                         }else{?>
                             <option value="2">Primary</option>
                        <?php }
                         ?> <?php
                         if($_SESSION['level']==3){?>
                              <option value="3" selected>Secondary</option>
                           <?php  
                         }else{?>
                             <option value="3">Secondary</option>
                        <?php }
                         ?> <?php
                         if($_SESSION['level']==4){?>
                              <option value="4" selected>Senior</option>
                           <?php  
                         }else{?>
                             <option value="4">Senior</option>
                        <?php }
                         ?><?php
                         if($_SESSION['level']==5){?>
                              <option value="5" selected>Tertiary</option>
                           <?php  
                         }else{?>
                             <option value="5">Tertiary</option>
                        <?php }
                         }
                         ?>

                      
                     </select>
                    
                    </td>
                </tr>
                
                
                <tr>
                    <td><h4>Subject</h4></td>

                
                    <td>
                        <select name="subject">
                            <option selected hidden value="">Select Subject</option>
                        <?php
                        include("conndb.php");
                        $sql = "SELECT department FROM aamt_registerschool";  
                        $results=mysqli_query($conn, $sql);  
                        if (!$results){
                            die('Cannot read data:'.mysqli_error());
                        }
                        $depart=[];
                         while($rows = mysqli_fetch_array($results)){
                             array_push($depart, $rows['department']);
                             }
                                $depart=array_unique($depart);
                         foreach($depart as $key => $val){
                             echo "<option value='$val'>$val</option>";
                         }
                        ?>
                    
                    </select>
                    </td>

                </tr>
            
                <tr>
                    <td><button type="submit"  value="Search">Search</button></td>
                
                </tr>   </table> 
        </form>
                <?php 
                
                if(!empty($country) & !empty($level) & !empty($subject)){
                include("conndb.php");
                $sql = "SELECT * FROM aamt_registerschool where country='$country' and schoolLevel='$level' and department='$subject'";  
                $results=mysqli_query($conn, $sql);  
                if (!$results){
                    die('Cannot read data:'.mysqli_error());
                }
                $rows=mysqli_num_rows($results);          
        
                if($rows){//0 false 1 true 
                    
                            echo "<h3>Your Search Results</h3><br>";
                              echo "<table id=\"resulttable\">";
                              echo"
                                    <tr id=\"resulttr\" >
                                        <th id=\"resultth\">Country</th>
                                        <th id=\"resultth\">Subject</th>
                                        <th id=\"resultth\">School Name</th>
                                        <th id=\"resultth\">School Level</th>
                                        <th id=\"resultth\">School Type</th>
                                        <th id=\"resultth\">School Size</th>
                                        <th id=\"resultth\">School Address</th>
                                        <th id=\"resultth\">Phone</th>
                                        <th id=\"resultth\">Email</th>
                                        <th id=\"resultth\">Contact Person</th>
                                        <th id=\"resultth\">Apply</th>
                                    </tr>
                                ";


                    while($rows = mysqli_fetch_assoc($results)){
               
                                echo"
                                    <tr id=\"resulttr\">
                                        <td id=\"resulttd\">{$rows['country']}</td>
                                        <td id=\"resulttd\">{$rows['department']}</td>
                                        <td id=\"resulttd\">{$rows['schoolName']}</td>
                                        <td id=\"resulttd\">
                                    ";
                                        $schoolL=array();
                                    $schoolL=explode(',',$rows['schoolLevel']);
                                    for($i=0;$i<count($schoolL);$i++){
                                        if($schoolL[$i]==1){
                                            echo "Primary";
                                        }else if($schoolL[$i]==2){
                                            echo "Secondary";
                                        }else if($schoolL[$i]==3){
                                            echo "Tertiary";
                                        }
                                    }
                                        
                                        echo"
                                        </td>
                                        <td id=\"resulttd\">";
                                        
                                         $schoolT=array();
                                    $schoolT=explode(',',$rows['schoolType']);
                                    for($i=0;$i<count($schoolT);$i++){
                                        if($schoolT[$i]==1){
                                            echo "School";
                                        }else if($schoolT[$i]==2){
                                            echo "College";
                                        }else if($schoolT[$i]==3){
                                            echo "University";
                                        }else if($schoolT[$i]==4){
                                            echo "Institution";
                                        }
                                    }
                                        
                                        echo"
                                        </td>
                                        <td id=\"resulttd\">";
                                        $schoolS=array();
                                    $schoolS=explode(',',$rows['schoolSize']);
                                    for($i=0;$i<count($schoolS);$i++){
                                        if($schoolS[$i]==1){
                                            echo "Small";
                                        }else if($schoolS[$i]==2){
                                            echo "Medium";
                                        }else if($schoolS[$i]==3){
                                            echo "Large";
                                        }
                                    }
                                        echo"
                                        </td>
                                        <td id=\"resulttd\">{$rows['schoolAddress']} {$rows['city']} {$rows['state']} {$rows['country']}</td>
                                        <td id=\"resulttd\">+{$rows['countryCode']}&nbsp;{$rows['phone']}</td>
                                        <td id=\"resulttd\">{$rows['email']}  </td>
                                        <td id=\"resulttd\" style=\"text-transform: capitalize\">{$rows['firstName']}&nbsp;{$rows['lastName']}</td>";?> 
                                        <td id="resulttd" style="text-transform: capitalize"><a href="wp-content/themes/consultup-child/apply.php?toid=<?php echo $rows['id'];?>">Apply</a></td>
                                   <?php echo  "</tr>";
                            }
                            echo "</table>"; 




                               
                               
                         }else{
                                echo "<h3 style=\"color: red;\">No results, please try to search others</h3>";
                                mysqli_close($conn);
                            }
                }
            ?>   
                
            </div> 
            <div class="col-md-6 login-right">
                            <h2>Join us NOW!</h2>
                            
                            <br>
                            <p><a href="wp-content/themes/consultup-child/login.php">Already?&nbsp; Login</a></p>
                            <p><a href="wp-content/themes/consultup-child/schoolRegister.php">Join us as a school</a></p>
                            <p><a href="wp-content/themes/consultup-child/teacherRegister.php">Join us as a teacher</a></p>
            </div>
    </div>
 </div>

    
</main>
<?php
session_destroy();
get_footer();
?>