<table>
            <thead>
        <tr>
            <th scope="col">BUS NO.</th>
            <th scope="col">SERVICE</th>
            <th scope="col">DEPARTURED</th>
            <th scope="col">Route Destination</th>
        </tr>
            </thead>
                <tbody>
                    <?php 
                    include 'TABLE-Connection.php';
                        $sql = "SELECT *FROM arrival_tb";

                        $result = mysqli_query($conn,$sql);

                       while($row = mysqli_fetch_assoc($result)) {


                        
                        $bus_no = $row['bus_no'];
                        $unit = $row['unit'];
                        $departure_time = $row['departured_time'];
                        $route = $row['route_destination'];

                        echo '
                        <tr>
                    
                    <td>'.$bus_no.'</td>
                    <td>'.$unit.'</td>
                    <td>'.$departure_time.'</td>
                    <td>'.$route.'</td>
                    </tr>
                        ';

                       }
                    ?>
                    
                
                </tbody>
</table>
