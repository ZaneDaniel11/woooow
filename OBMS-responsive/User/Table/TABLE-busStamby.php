<table>

<thead>
        <tr>


            <th scope="col">BUS NO.</th>
            <th scope="col">DESTINATION</th>
            <th scope="col">SERVICE</th>
            <th scope="col">Cor Number</th>
            <th scope="col">Departure Time</th>

        </tr>
</thead>

<tbody>

<?php
                include 'TABLE-Connection.php';
                $query = "SELECT *FROM bus_stamby";

                $result = mysqli_query($conn,$query);
    
                if($result)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $bus_no = $row['bus_no'];
                        $route = $row['route_destination'];
                        $unit = $row['unit'];
                        $cor_number = $row['cor_number'];
                        $departure_time = $row['departure_time'];

                        
                        echo'
                        <tr>
                        <td>'.$bus_no.'</td>
                        <td>'.$route.'</td>
                        <td>'.$unit.'</td>
                        <td>'.$cor_number.'</td>
                        <td>'.$departure_time.'</td>
                        </tr>
                        ';
                    }
                }
                else
                {

                }
                ?>
                
                </tbody>


 
            </table>