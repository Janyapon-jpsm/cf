<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbon Footprint Emission</title>
    <link rel="icon" href="\images\leaf-solid.svg" type="image/png">

    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <!-- Load jQuery first -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Then load jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <script src="monthpicker.js"></script>

    <link rel="stylesheet" href="/path/to/cdn/jquery-ui.min.css" />

    <style>
        body {
            font-family: 'Kanit', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23d3d3d3' fill-opacity='0.6'%3E%3Ccircle cx='5' cy='5' r='1.5'/%3E%3C/g%3E%3C/svg%3E");
        }

        .header {
            position: sticky;
            top: 0;
            background-color: #20B2AA;
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .back-icon {
            font-size: 36px;
            background-color: #20B2AA;
            border: #20B2AA;
            border-radius: 20px;
            padding: 10px;
            color: #E5E5E5;
        }

        .back-icon:hover {
            background-color: #01696E;
            color: #f0f0f0;
        }

        .logo {
            max-height: 40px;
        }

        .header h1 {
            display: flex;
            align-items: center;
            margin: 0;
            flex-grow: 1;
            justify-content: center;
        }

        .monthpicker {
            text-align: left;
            margin: 30px 0px 50px 50px;
            max-width: 100%;
        }

        .calendar-icon {
            color: #01696E;
        }

        .content-sec {
            text-align: center;
            width: 1390px;
            padding: 10px;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        .content-sec:hover {
            background-color: whitesmoke;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .footer {
            margin-top: 40px;
            padding: 10px 0;
            width: 100%;
            position: relative;
            background-color: #E5E5E5;
            color: #A9A9A9;
            text-align: center;
        }

        .edit-icon {
            font-size: 15px;
            background-color: #E5E5E5;
            border: #E5E5E5;
            border-radius: 20px;
            padding: 10px;
            color: #A9A9A9;
        }

        .edit-icon:hover {
            background-color: #A9A9A9;
            color: #f0f0f0;
        }

        .title {
            padding-left: 30px;
            color: #01696E;
        }

        .content div {
            display: inline-block;
            text-align: left;
        }

        .chart-container {
            display: inline-block;
            vertical-align: top;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-right: 20px;
            box-shadow: 3px 4px 6px rgba(0, 0, 0, 0.1);
            width: 45%;
        }

        .cf-details {
            display: inline-block;
            vertical-align: top;
            color: #20B2AA;
            padding: 20px;
            width: 45%;
        }

        .pics-container {
            text-align: center;
        }

        .cfpics {
            max-height: 200px;
            margin: 10px 20px;
        }

        .content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .flex-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 10px;
            margin: 0 auto;
        }

        .chart-container {
            display: inline-block;
            vertical-align: top;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 45%;
            max-width: 550px;
        }

        .cf-details {
            display: inline-block;
            vertical-align: top;
            color: #20B2AA;
            padding: 10px;
            width: 45%;
            max-width: 600px;
        }

        .title {
            text-align: left;
            padding-left: 40px;
            color: #01696E;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <button class="back-icon">
            <i class="fas fa-arrow-left" onclick="location.href='carbon-footprint-MedCMU-dashboard-em'"></i>
        </button>
        &emsp;&emsp;
        <h1>
            <img class=" logo" src="\images\logo-med.png" onclick="location.href='carbon-footprint-MedCMU-dashboard-em'" />&nbsp; <b>Carbon Footprint </b> &nbsp;&nbsp;<i class="fas fa-leaf"></i>
        </h1>
    </div>

    <div class=" monthpicker">
        <!-- Month Picker Input -->
        <input id="monthpicker" type="text" placeholder="Select Month and Year">
        <span class="calendar-icon">
            <i class="fas fa-calendar-alt"></i>
        </span>
    </div>

    <div class="content-sec">
        <h2 class="title">Carbon Footprint จากการเผาไหม้เชื้อเพลิง</h2>
        <div class="content">
            <div class="flex-container">
                <div class="chart-container">
                    <canvas id="Chart1"></canvas>
                </div>
                <div class="cf-details">
                    <p>Lorem ipsum odor amet, consectetuer adipiscing elit. Dui tempus vulputate himenaeos facilisis vel. Rhoncus enim mus primis aenean eleifend. Quis porttitor penatibus ridiculus elit tincidunt natoque. Tincidunt aliquam velit augue tortor vulputate ante. Platea mauris nec odio convallis accumsan ultricies finibus netus. Vehicula rutrum dictum iaculis ac pretium auctor platea. Facilisi semper est cursus diam convallis est donec. Nisi tellus malesuada sed blandit; eros nibh augue nisl. Aptent aptent sodales aenean inceptos iaculis; volutpat proin sociosqu.</p>
                </div>
            </div>
        </div>

        <div class="pics-container">
            <img class="cfpics" src="\images\CF1-1.png" />
            <img class="cfpics" src="\images\CF1-2.png" />
            <img class="cfpics" src="\images\CF1-3.png" />
            <img class="cfpics" src="\images\CF1-4.jpg" />
        </div>
    </div>

    <div class="content-sec">
        <h2 class="title">Carbon Footprint จากการรั่วไหลและอื่นๆ</h2>
        <div class="content">
            <div class="flex-container">
                <div class="chart-container">
                    <canvas id="Chart2"></canvas>
                </div>
                <div class="cf-details">
                    <p>Lorem ipsum odor amet, consectetuer adipiscing elit. Dui tempus vulputate himenaeos facilisis vel. Rhoncus enim mus primis aenean eleifend. Quis porttitor penatibus ridiculus elit tincidunt natoque. Tincidunt aliquam velit augue tortor vulputate ante. Platea mauris nec odio convallis accumsan ultricies finibus netus. Vehicula rutrum dictum iaculis ac pretium auctor platea. Facilisi semper est cursus diam convallis est donec. Nisi tellus malesuada sed blandit; eros nibh augue nisl. Aptent aptent sodales aenean inceptos iaculis; volutpat proin sociosqu.</p>
                </div>
            </div>
        </div>

        <div class="pics-container">
            <img class="cfpics" src="\images\CF2-1.png" style="width: 300px; height: 500px;" />
            <img class="cfpics" src="\images\CF2-2.jpg" />
            <img class="cfpics" src="\images\CF2-3.jpg" />
            <img class="cfpics" src="\images\CF2-4.jpg" />
        </div>
    </div>

    <div class="content-sec">
        <h2 class="title">Carbon Footprint จากการใช้พลังงาน</h2>
        <div class="content">
            <div class="flex-container">
                <div class="chart-container">
                    <canvas id="Chart3"></canvas>
                </div>
                <div class="cf-details">
                    <p>Lorem ipsum odor amet, consectetuer adipiscing elit. Dui tempus vulputate himenaeos facilisis vel. Rhoncus enim mus primis aenean eleifend. Quis porttitor penatibus ridiculus elit tincidunt natoque. Tincidunt aliquam velit augue tortor vulputate ante. Platea mauris nec odio convallis accumsan ultricies finibus netus. Vehicula rutrum dictum iaculis ac pretium auctor platea. Facilisi semper est cursus diam convallis est donec. Nisi tellus malesuada sed blandit; eros nibh augue nisl. Aptent aptent sodales aenean inceptos iaculis; volutpat proin sociosqu.</p>
                </div>
            </div>
        </div>

        <div class="pics-container">
            <img class="cfpics" src="\images\CF3-1.jpg" />
            <img class="cfpics" src="\images\CF3-2.png" />
            <img class="cfpics" src="\images\CF3-3.jpg" />
            <img class="cfpics" src="\images\CF3-4.jpg" style="width: 300px; height: 500px;" />
        </div>
    </div>

    <div class="content-sec">
        <h2 class="title">Carbon Footprint ทางอ้อมอื่นๆ</h2>
        <div class="content">
            <div class="flex-container">
                <div class="chart-container">
                    <canvas id="Chart4"></canvas>
                </div>
                <div class="cf-details">
                    <p>Lorem ipsum odor amet, consectetuer adipiscing elit. Dui tempus vulputate himenaeos facilisis vel. Rhoncus enim mus primis aenean eleifend. Quis porttitor penatibus ridiculus elit tincidunt natoque. Tincidunt aliquam velit augue tortor vulputate ante. Platea mauris nec odio convallis accumsan ultricies finibus netus. Vehicula rutrum dictum iaculis ac pretium auctor platea. Facilisi semper est cursus diam convallis est donec. Nisi tellus malesuada sed blandit; eros nibh augue nisl. Aptent aptent sodales aenean inceptos iaculis; volutpat proin sociosqu.</p>
                </div>
            </div>
        </div>
        <div class="pics-container">
            <img class="cfpics" src="\images\CF4-1.jpg" />
            <img class="cfpics" src="\images\CF4-2.jpg" />
            <img class="cfpics" src="\images\CF4-3.jpg" />
            <img class="cfpics" src="\images\CF4-4.jpg" />
        </div>
    </div>

    <script>
        // Month picker initialization
        $("#monthpicker").datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'MM yy',
            onClose: function(dateText, inst) {
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).val($.datepicker.formatDate('MM yy', new Date(year, month, 1)));
            }
        });

        $("#monthpicker").focus(function() {
            $(".ui-datepicker-calendar").hide();
            $("#ui-datepicker-div").position({
                my: "center top",
                at: "center bottom",
                of: $(this)
            });
        });

        // Define data for all charts
        const chart1Data = [55, 49, 47, 44, 40, 38, 37, 35, 30, 28, 25, 24, 19];
        const chart2Data = [55, 49, 47, 44, 40, 38, 37, 35, 30, 28, 25];
        const chart3Data = [55, 49, 44];
        const chart4Data = [55, 49, 47, 44, 40, 38, 37, 35];

        // Find the maximum value across all charts
        const globalMaxValue = Math.max(
            ...chart1Data,
            ...chart2Data,
            ...chart3Data,
            ...chart4Data
        );

        function createChart(chartId, xValues, yValues, title) {
            // Function to adjust color lightness
            function adjustColor(color, amount) {
                return '#' + color.replace(/^#/, '').replace(/../g, color => ('0' + Math.min(255, Math.max(0, parseInt(color, 16) + amount)).toString(16)).substr(-2));
            }

            // Sort and get top 3
            const indexedValues = yValues.map((value, index) => ({
                value,
                index
            }));
            indexedValues.sort((a, b) => b.value - a.value);

            const baseColor = "#20B2AA";
            const barColors = new Array(yValues.length).fill("#D3D3D3");

            // Assign colors to top 3
            barColors[indexedValues[0].index] = adjustColor(baseColor, -40);
            barColors[indexedValues[1].index] = adjustColor(baseColor, -20);
            barColors[indexedValues[2].index] = baseColor;

            return new Chart(chartId, {
                type: "horizontalBar",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: title
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                min: 0,
                                max: globalMaxValue // Use the global maximum value
                            }
                        }]
                    }
                }
            });
        }

        // Create charts with the same maximum value
        createChart("Chart1",
            ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M"],
            chart1Data,
            "Carbon Footprint จากการเผาไหม้เชื้อเพลิง"
        );

        createChart("Chart2",
            ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K"],
            chart2Data,
            "Carbon Footprint จากการรั่วไหลและอื่นๆ"
        );

        createChart("Chart3",
            ["A", "B", "C"],
            chart3Data,
            "Carbon Footprint จากการใช้พลังงาน"
        );

        createChart("Chart4",
            ["A", "B", "C", "D", "E", "F", "G", "H"],
            chart4Data,
            "Carbon Footprint ทางอ้อมอื่นๆ"
        );
    </script>

    <footer class="footer">
        <p>© 2024 Janyapon Saingam. All rights reserved.</p>
        <p>This research was conducted at the Faculty of Medicine, Chiang Mai University.</p>

        <button class="edit-icon">
            <i class="fas fa-pen" onclick="location.href='admin/login'"></i>
        </button>
    </footer>
</body>

</html>