<table>

        <thead>
        <tr>
            <th scope="col">BUS NO.</th>
            <th scope="col">DEPARTURED</th>
            <th scope="col">DESTINATION</th>
            <th scope="col">SERVICE</th>
            <th scope="col">PASSENGER</th>
            <th scope="col">DRIVER'S NAME</th>
            <th scope="col">CONDOCTOR'S NAME</th>
            
        </tr>
            </thead>
                <tbody>
              <?php
                    include('TABLE-Connection.php');
                    $sql = "SELECT *FROM departure_tb";
                    $result = mysqli_query($conn,$sql);
                    
                    if($result)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $bus_no = $row['bus_no'];
                            $time_dept = $row['time_dept'];
                            $route = $row['route_destination'];
                            $unit = $row['unit'];
                            $passenger = $row['passenger'];
                            $dName = $row['drivers_name'];
                            $cName = $row['conductors_name'];

                            echo
                            '
                            <tr>
                                 <td>'.$bus_no.'</td>
                                 <td>'.$time_dept.'</td>
                                 <td>'.$route.'</td>
                                 <td>'.$unit.'</td>
                                 <td>'.$passenger.'</td>
                                 <td>'.$dName.'</td>
                                 <td>'.$cName.'</td>
                            </tr>
                            ';
                        }
                    }
              ?>
                </tbody>
     </table>