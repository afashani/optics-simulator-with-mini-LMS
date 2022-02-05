<!--  this is admin dashboard  -->
<!doctype html>
<?php

////require header
//$isDashboard=true;
require_once '../Includes/Admin-header.php';
//require_once '../Includes/ConfigDB.php';
//
//
//
////connection object
//$newConnection=new ConfigDB();
////create connection
//$conn=$newConnection ->createConnection();
//
////function for requires founds
//function my_autoload($className){
//    require_once '../Classes/'.$className.'.Class.php';
//
//}
//
////require files checker inbuild function
//spl_autoload_register('my_autoload');
//
////function object
//
//
//
//$mod=new Moderators();
//$user=new RegisteredUser();
//$blog=new Blog();
//$order=new Order();
//$product=new Product();
//
////set mod count
//
//    //all mod =active + non active
//    $modCount=$mod ->countOfModerators($conn);
//    $modActiveCount=$mod -> countOfActiveModerators($conn);
//    $modNonActiveCount=$modCount-$modActiveCount;
//
//    //all user count =active+ non active
//    $userCount=$user -> countUsers($conn);
//    $userActiveCount=$user -> countActiveUsers($conn);
//    $userNonActiveCount=$userCount-$userActiveCount;
//
//    //all blog count = approved+pending
//
//    $blogApprovedCount=$blog -> countAllBlog($conn);
//    $blogAllCount=$blog -> countApprovedBlog($conn);
//    $blogPendingCount=$blogAllCount-$blogApprovedCount;
//
//    echo $blogApprovedCount."blogApprovedCount  ";
//    echo $blogAllCount."blogAllCount  ";
//    echo $blogPendingCount."blogPendingCount  ";
//
//
//    //get totak eanings
//    $productIds=$order -> getAllOrderDetailsProIds($conn);
//    $productQtys=$order -> getAllOrderDetailsProductsQty($conn);
//
//    $totalEarning=0;
//
//for($i=0 ; $i < count($productIds) ;$i++) {
//
//    $pid = $productIds[$i];
//    $qty = (int)$productQtys[$i];
//    $productData = $product->viewSingleProduct($conn, $pid);
//    $productPrice = $productData[6];
//
//    //single total amount*qty
//    $singleTotal = $productPrice * $qty;
//    //single qty and unit price
//    $totalEarning += $singleTotal;
//}
//
//$soldItems=$order -> getTotalSoldItems($conn);
//
////total orders
//$totalOrders=$order -> getTotalOrders($conn);
//
////get item list and qty
//$itemListAndQty=$product -> countProductItems($conn);
//
////sumbit data
//
//$admin=new Administrator();
//
//if(isset($_SESSION['adminId'])){
//    $adminId=$_SESSION['adminId'];
//}
//$accountDetails=$admin -> getAccountDetails($conn, $adminId);
//
////header model operations
//if(isset($_POST['resetUserName'])){
//    $Username=$accountDetails[4];
//}
//if(isset($_POST['resetEmail'])){
//    $Email=$accountDetails[2];
//}
//if(isset($_POST['resetPassword'])){
//    $passwordText="**********";
//}
//
//$Fname=$accountDetails[0];
//$Lname=$accountDetails[1];
//$Email=$accountDetails[2];
//$Type=$accountDetails[3];
//$Username=$accountDetails[4];
//$passwordText="**********";
//
////mod data
//
//$chartData1=($modActiveCount/$modCount)*100;
//$chartData2=($modNonActiveCount/$modCount)*100;
//
////user data
//$dataPoints = array(
//    array("label"=>"Active", "y"=>$chartData1),
//    array("label"=>"Deleted", "y"=>$chartData2),
//
//);
//
////reg data
//$chartData3=($userActiveCount/$userCount)*100;
//$chartData4=($userNonActiveCount/$userCount)*100;
//$dataPoints2= array(
//    array("label"=>"Active", "y"=>$chartData3),
//    array("label"=>"Deleted", "y"=>$chartData4),
//
//);
//
////all data
//$chartData5=($userCount/($userCount+$modCount))*100;
//$chartData6=($modCount/($userCount+$modCount))*100;
//$dataPoints3= array(
//    array("label"=>"Registered Users", "y"=>$chartData5),
//    array("label"=>"Moderators", "y"=>$chartData6),
//
//);
//
//$conn-> close();

?>
<head>
    <meta content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DashBoard | Admin </title>

    <link rel="stylesheet" href="../../Inc/css/main.css" type="text/css">
    <link rel="stylesheet" href="../../Inc/css/header.css" type="text/css">

<!--    <script src="../../Inc/JS/header.js" type="application/javascript"></script>-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        window.onload = function() {

            //students
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title:{
                    text: "Number of Students"
                },
                axisY: {
                    title: "Students",
                    includeZero: true
                },
                legend: {
                    cursor:"pointer",
                    itemclick : toggleDataSeries
                },
                toolTip: {
                    shared: true,
                    content: toolTipFormatter
                },
                data: [{
                    type: "bar",
                    showInLegend: true,
                    name: "Boys",
                    color: "gold",
                    dataPoints: [
                        { y: 100, label: "Grade 12" },
                        { y: 120, label: "Grade 13" },


                    ]
                },
                    {
                        type: "bar",
                        showInLegend: true,
                        name: "Girls",
                        color: "black",
                        dataPoints: [
                            { y: 80, label: "Grade 12" },
                            { y: 70, label: "Grade 13" },


                        ]
                    },
                   ]
            });
            chart.render();

            //resourses
            var chart2 = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                title:{
                    text: "Number of Resourses"
                },
                axisY: {
                    title: "Students",
                    includeZero: true
                },
                legend: {
                    cursor:"pointer",
                    itemclick : toggleDataSeries
                },
                toolTip: {
                    shared: true,
                    content: toolTipFormatter
                },
                data: [{
                    type: "bar",
                    showInLegend: true,
                    name: "Activities",
                    color: "gold",
                    dataPoints: [
                        { y: 20, label: "Grade 12" },
                        { y: 50, label: "Grade 13" },


                    ]
                },
                    {
                        type: "bar",
                        showInLegend: true,
                        name: "Tutorial",
                        color: "black",
                        dataPoints: [
                            { y: 20, label: "Grade 12" },
                            { y: 55, label: "Grade 13" },


                        ]
                    },
                ]
            });
            chart2.render();

            function toolTipFormatter(e) {
                var str = "";
                var total = 0 ;
                var str3;
                var str2 ;
                for (var i = 0; i < e.entries.length; i++){
                    var str1 = "<span style= \"color:"+e.entries[i].dataSeries.color + "\">" + e.entries[i].dataSeries.name + "</span>: <strong>"+  e.entries[i].dataPoint.y + "</strong> <br/>" ;
                    total = e.entries[i].dataPoint.y + total;
                    str = str.concat(str1);
                }
                str2 = "<strong>" + e.entries[0].dataPoint.label + "</strong> <br/>";
                str3 = "<span style = \"color:Tomato\">Total: </span><strong>" + total + "</strong><br/>";
                return (str2.concat(str)).concat(str3);
            }

            function toggleDataSeries(e) {
                if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                }
                else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

        }
    </script>

</head>

<body>
    <!--  dashboard content goes here  -->
    <div class="row bg-white  mt-5 mb-5">
        <div class="col-12">
            <div class="card-deck mt-2 text-center font-weight-bold  ">
                <div class="card border border-primary border-2 mt-5 mb-5 ">

                    <div class="card-header bg-primary text-white ">
                        <h2>Students</h2>
                    </div>

                        <div class="card-body bg-white text-dark">
                            <div id="chartContainer" style="height: 200px; width: 100%;"></div>
                        </div>

                </div>

                <div class="card countsInfo border border-primary border-2 mt-5 mb-5">

                    <div class="card-header bg-primary text-white ">
                        <h2>Resources</h2>
                    </div>

                    <div class="card-body bg-white text-dark">
                        <div id="chartContainer1" style="height: 200px; width: 100%;"></div>
                    </div>

                </div>

            </div>
        </div>
    </div>




            </div>
        </div>
    </div>
</body>
<!--  js files here -->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

