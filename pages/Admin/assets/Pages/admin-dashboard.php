<!--  this is admin dashboard  -->
<!doctype html>
<?php

require_once '../Includes/Admin-header.php';
require_once '../Includes/ConfigDB.php';
require_once '../Includes/Functions.php';


//connection object
$newConnection=new ConfigDB();
//create connection
$conn=$newConnection ->createConnection();

$func=new Functions();

$countG12=0;
$countG13=0;
$countActivity=0;
$countTutorials=0;


$countG12= $func -> countOfStudent($conn,12);
$countG13= $func -> countOfStudent($conn,13);




$countActivity=$func -> countOfActivities($conn);

$countTutorials=$func -> countOfTutorials($conn);


$tableData=$func -> viewAnswersProgress($conn);
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
                    name: "Student",
                    color: "gold",
                    dataPoints: [
                        { y:
                                <?php echo $countG12; ?>
                                , label: "Grade 12" },
                        { y:
                            <?php echo $countG13; ?>
                            , label: "Grade 13" },


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
                    name: "Count",
                    color: "gold",
                    dataPoints: [
                        { y:
                            <?php echo $countActivity; ?>
                            , label: "Activities" },
                        { y:
                            <?php echo $countTutorials; ?>
                            , label: "Tutorials" },

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
    <div class="row bg-white  mx-auto d-flex align-content-center ">
        <div class="col-12 mx-auto">

            <div class="card-deck mt-5 text-center font-weight-bold  ">
                <div class="card border border-primary border-2  mb-2 ">

                    <div class="card-header bg-light text-dark ">
                        <h2>Students</h2>
                    </div>

                        <div class="card-body bg-white text-dark">
                            <div id="chartContainer" style="height: 200px; width: 100%;"></div>
                        </div>

                </div>

                <div class="card countsInfo border border-primary border-2 mb-2 ">

                    <div class="card-header bg-light text-dark ">
                        <h2>Resources</h2>
                    </div>

                    <div class="card-body bg-white text-dark">
                        <div id="chartContainer1" style="height: 200px; width: 100%;"></div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="row bg-white  mx-auto d-flex align-content-center mt-2 ">
        <div class="col-12 mx-auto">


                <div class="card border border-primary border-2  mb-2 text-center ">

                    <div class="card-header bg-light text-dark ">
                        <h2>Activities</h2>
                    </div>

                    <div class="card-body bg-white text-dark">
                        <div class="table-responsive" >
                            <table class="table table-striped text-dark text-center dataTable" id="dataTable">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th class=" d-none d-lg-table-cell ">Deadline</th>
                                    <th >Responses</th>

                                </tr>
                                </thead>
                                <tbody class="">

                                <?php echo $tableData; ?>


                                </tbody>
                            </table>


                        </div>
                    </div>

                </div>



            </div>

    </div>


</body>
<!--  js files here -->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

