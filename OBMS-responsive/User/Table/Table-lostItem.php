<style>
    .claim-status {
        color: white;
        font-weight: bold;
        padding: 8px;
        border-radius: 5px;
    }

    .claim-status-claim {
        color: green;
        font-family: 'Roboto';
        border-radius: 10px;
        align-items: center;
        text-align: center;
    }

    .claim-status-pending {
      
        color: yellow;
        border-radius: 10px;
        text-align: center;
    }

    .claim-status-not-found {
        
        color: red;
        border-radius: 10px;
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 10px;
    }
</style>

<table>
    <thead>
        <tr>
            <th scope="col">BUS NO.</th>
            <th scope="col">DRIVERS NAME</th>
            <th scope="col">CONDUCTORS NAME</th>
            <th scope="col">ITEM DESCRIPTION</th>
            <th scope="col">DATE LOST</th>
            <th scope="col">STATUS</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'TABLE-Connection.php';
        $sql = "SELECT * FROM lost_tb";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $statusClass = '';

            switch ($row['status']) {
                case 'Found':
                    $statusClass = 'claim-status-claim';
                    break;
                case 'Pending':
                    $statusClass = 'claim-status-pending';
                    break;
                case 'Not-Found':
                    $statusClass = 'claim-status-not-found';
                    break;
                default:
                    $statusClass = '';
            }
            

            

            $bus_no = $row['bus_no'];
            $dname = $row['drivers_name'];
            $cname = $row['conductors_name'];
            $item = $row['item'];

            // Format the date using the date function
            $date = date('Y-m-d', strtotime($row['date']));

            echo '
                <tr>
                    <td>' . $bus_no . '</td>
                    <td>' . $dname . '</td>
                    <td>' . $cname . '</td>
                    <td>' . $item . '</td>
                    <td>' . $date . '</td>
                    <td class="' . $statusClass . '">' . $row['status'] . '</td>
                </tr>
            ';
        }
        ?>
    </tbody>
</table>