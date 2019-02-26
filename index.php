<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style> 
    .container{
        width: auto; 
        align:center; 
    }
    
    </style>
    
    <title>Using Chart.js witth PHP and MySQL </title>
</head>
<body>
    <div class="container">
            <!-- this library uses <canvas>  -->
            <canvas id="myChart"></canvas>
    </div> 

    <?php 
        // conection string 
        $conn = mysqli_connect("localhost", "root", "", "classicmodels"); 
       
        // customers count 
        $query = "SELECT * from customers"; 
        $custumers_query  = mysqli_query($conn, $query); 
        $customer_count = mysqli_num_rows($custumers_query); 

        // employees count 
        $query = "SELECT * from employees"; 
        $emps_query  = mysqli_query($conn, $query); 
        $emps_count = mysqli_num_rows($emps_query); 

        // offices count 
        $query = "SELECT * from offices"; 
        $offices_query  = mysqli_query($conn, $query); 
        $offices_count = mysqli_num_rows($offices_query); 
    ?> 
  

    <!-- You can use this CDN  -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> -->
    <script src="chart.js/Chart.min.js"></script>

    <script>
            var ctx = document.getElementById("myChart");

        Chart.defaults.global.defaultFontFamily = 'Georgia'; // any font 
        Chart.defaults.global.defaultFontSize=22;
        Chart.defaults.global.defaultFontColor='Green'; 
        
            var myChart = new Chart(ctx, {
                type: 'bar', // you can use several shapes bar, horizontalBar, pie, line, doughnut, radar, polarArea
                data: {
                    labels: ["Customers", "employees", "offices"],
                    datasets: [{
                     
                        data: [<?= $customer_count;?>, <?= $emps_count; ?>, <?= $offices_count; ?>],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    title: {
                        display:true, 
                        text:'Using Chart.js witth PHP and MySQL',
                        fontSize:25
                    }, 
                    legend:{
                        display:false,
                        position:'right',
                        labels:{
                            fontColor:'#000'
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                // important to make the least item have value
                                beginAtZero:true
                            }
                        }]
                    }, 
                    tooltips:{
                        enabled:true
                    }
                }
            });
            </script>

</body>
</html>