<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

    <button onclick="exportTableToExcel('data')" class="btn btn-primary btn-lg btn-block">Export to Excel </button>
    <?PHP
    // Database connection
    $_servername = "localhost";
    // $_username = "id17847083_laveta2allergy";
    // $password = "New@20182018";
    // $dbname = "id17847083_laveta2";
    $_username = "root";
    $password = "";
    $dbname = "reg";
    $con =  mysqli_connect($_servername, $_username, $password, $dbname);
    if (!$con) {
        die("Error :" . mysqli_connect_error());
    } else {
        $sql = "select * from login";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {

            echo "<table class='table table-hover'>";
            echo "<thead class= thead-dark>";
            echo "<tr>";
            echo "<th scope='col'>ID</th>";
            echo "<th scope='col'>Name</th>";
            echo "<th scope='col'>Place</th>";
            echo "<th scope='col'>Mob</th>";
            echo "<th scope='col'>Email</th>";

            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<th scope='row'>" . $row["ID"] . "</th>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["place"] . "</td>";
                echo "<td>" . $row["mob"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "0 results";
        }
    }
    mysqli_close($con);
    ?>
    <script>
        function exportTableToExcel(tableID, filename = '') {
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

            // Specify file name
            filename = filename ? filename + '.xls' : 'excel_data.xls';

            // Create download link element
            downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }
        }
    </script>

</body>

</html>