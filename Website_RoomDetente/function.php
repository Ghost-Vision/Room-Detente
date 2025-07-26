<?php


function build_UserList()
{
    $mysqli= require __DIR__."/database.php";
    $sql = "SELECT * FROM users";

    $userList = "<table class='table table-hover'>";
    $userList.= "<br>";

    $userList.= "<thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>";
    $idRow =1;

    if($result = $mysqli->query($sql))
    {
        while($row = $result->fetch_assoc())
        {
            $field1name = $row["id"];
            $field2name = $row["name"];
            $field3name = $row["firstname"];
            $field4name = $row["phone"];
            $field5name = $row["email"];
        
            $userList.='<tr> 
                            <td>'.$idRow.'</td> 
                            <td>'.$field2name.'</td> 
                            <td>'.$field3name.'</td> 
                            <td>'.$field4name.'</td>
                            <td>'.$field5name.'</td>
                        </tr>';
            $idRow++;
        }
        $result->free();
    }
    $userList.="</tbody>";
    $userList.="</table>";
    
    echo $userList;
}

//-----------------------------------------------------------------------------------//

function build_CommentList()
{
    $mysqli=require __DIR__."/database.php";

    $sql = "SELECT * FROM comments";
    $commentList="";

    if($result = $mysqli->query($sql))
    {
        while($row = $result->fetch_assoc())
        {


            $fieldName = $row["name"];
            $fieldFirstName = $row["firstname"];
            $fieldEmail = $row["email"];
            $fieldMessage = $row["message"];
            $fieldDate = $row["date"];

            $commentList.=' <div class="dashboard-avis-com-content">';
            $commentList.=' <p class="dashboard-avis-com-id"><em>'.$fieldName.'</em> - </p>';
            $commentList.=' <p class="dashboard-avis-com-id"><em>'.$fieldFirstName.'</em> - </p>';
            $commentList.=' <p class="dashboard-avis-com-id"><em>'.$fieldEmail.'</em></>';
            $commentList.= '<p style="padding:.5rem 0;">'.$fieldMessage.'</p>';
            $commentList.=' <p class="dashboard-avis-com-id"><small><em>'.$fieldDate.'</em></small></p>';
            $commentList.=' </div>';
            
        }
        $result->free();
    }

    echo $commentList;
}

//-----------------------------------------------------------------------------------//

function build_OrderList()
{
    $mysqli= require __DIR__."/database.php";

    $sql = "SELECT *
            FROM orders
            INNER JOIN users
            ON user_id = id
            WHERE id = {$_SESSION["user_id"]}";

    $orderList = "<table class='table table-hover'>";
    $orderList.= "<br>";

    $orderList.= "<thead>
                    <tr>
                        <th>ID de Commande</th>
                        <th>Massage</th>
                        <th>Date</th>
                        <th>Heure</th>
                    </tr>
                </thead>";
    $orderList.='<tbody>';

    if($result = $mysqli->query($sql))
    {
        while($row = $result->fetch_assoc())
        {
            $fieldID = $row["order_id"];
            $fieldMassage = $row["order_item"];

            $sql_OrderdDate = $row["order_date"];
            $fieldDate = date('d/m/Y', strtotime($sql_OrderdDate));

            $sql_OrderHour = $row["order_hour"];
            $fieldHour = date('H\\h\\ i', strtotime($sql_OrderHour));

            
            $orderList.='<tr> 
                            <td>'.$fieldID.'</td>
                            <td>'.$fieldMassage.'</td>
                            <td>'.$fieldDate.'</td>
                            <td>'.$fieldHour.'</td>
                        </tr>';
        }
        $result->free();
    }
    $orderList.="</tbody>";
    $orderList.="</table>";
    
    echo $orderList;
}

//-----------------------------------------------------------------------------------//

function build_calendar($month,$year, $rooms)
{
    $mysqli= require __DIR__."/database.php";

    $sql = "SELECT * FROM rooms";
    $stmt = $mysqli->prepare($sql);
    $rooms = "";
    $first_room = 0;
    $i = 0;
    if ($stmt->execute())
    {
        $result=$stmt->get_result();
        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
                if($i==0)
                {
                    $first_room=$row["id"];
                }
                $rooms.="<option value='".$row['id']."'>".$row["name"]."</option>";
                $i++;
            }
            $stmt->close();
        }

        if($i!=0)
        {
            $first_room = $rooms;
        }
    }

    // ------------------- //
    $sql = "SELECT * FROM bookings
            WHERE  MONTH(date)=? AND YEAR(date)=? AND room_id=? ";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssi",$month,$year,$first_room);       
    $bookings=array();

    if ($stmt->execute())
    {
        $result=$stmt->get_result();
        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
                $bookings[]=$row['date'];
            }
            $stmt->close();
        }
    }
    

    // We create an array containing names of all days in a week
    $daysOfWeek = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
    //Getting the first day of the month that is in the argument of this function
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
    //Getting the number of day this month contain
    $numberDays = date('t',$firstDayOfMonth);
    //Getting some information about the first day on this month
    $dateComponents = getdate($firstDayOfMonth);
    //Getting the name of this month
    $monthName = $dateComponents["month"];
    //Getting the index value 0-6 of the first day of this month
    $dayOfWeek = $dateComponents["wday"];

    if($dayOfWeek==0)
    {
        $dayOfWeek=6;
    }
    else
    {
        $dayOfWeek=$dayOfWeek-1;
    }
    //Getting the current date
    $dateToday = date('Y-m-d');

    //Creating the HTML table
    $calendar ="<table class='table table-bordered'>";
    $calendar.= "<center>
                    <h2>$monthName $year </h2>
                    <div class='flex-center-row'>";

    $calendar.= "<a class='button btn-primary btn-xs' href='?month=".date('m', mktime(0,0,0,$month-1,1,$year))."&year=".date('Y',mktime(0,0,0,$month-1,1,$year))."'>Previous Month<a>";
    $calendar.= "<a class='button btn-primary btn-xs' href='?month=".date('m')."&year=".date('Y')."'>Current Month<a>";
    $calendar.= "<a class='button btn-primary btn-xs' href='?month=".date('m', mktime(0,0,0,$month+1,1,$year))."&year=".date('Y',mktime(0,0,0,$month+1,1,$year))."'>Next Month<a>";
    
    $calendar.="    </div>
                </center>
                <br>";

    // $calendar.="
    // <form id='room_select_form'>
    //     <div class='row'>
    //         <div class='col-md-6 col-md-offset-3 form-group'>
    //             <label>Select Room</label>
    //             <select class='form-control' id='room_select' name='room'>
    //                 '.$rooms.'
    //             </select>
    //             <input type='hidden' name='month' value='".$month."'></input>
    //             <input type='hidden' name='year' value='".$year."'></input>
    //         </div>
    //     </div>
    // </form>";

    $calendar.="<tr>";

    //Creating the calendar headers
    foreach ($daysOfWeek as $day)
    {
        $calendar.="<th class='header'>$day</th>";
    }

    $calendar.= "</tr><tr>";

    //the variable $daysOfWeek will make sure that there must be only 7 columns on our table
    if($dayOfWeek>0)
    {
        for($i=0 ; $i<$dayOfWeek; $i++)
        {
            $calendar.="<td></td>";  
        }
    }

    //initializing the day counter
    $currentDay = 1;

    //Getting the month number
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while ($currentDay<=$numberDays)
    {
        //if 7th column (saturday) reached, start a new row
        if ($dayOfWeek == 7)
        {
            $dayOfWeek = 0;
            $calendar.="<tr></tr>"; 
        } 

        $currentDayRel = str_pad($currentDay,2,"0",STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $dayName = strtolower(date("l",strtotime($date)));
        $eventNum = 0;
        $today = $date==date("Y-m-d")?"today":"";
        if($dayName=="saturday" || $dayName=="sunday")
        {
            $calendar.="<td class='dayoff'>
                            <h4>$currentDay</h4>
                            <button class='button btn-danger btn-xs'>OFF</button>
                        </td>";
        }
        else if($date<date("Y-m-d"))
        {
            $calendar.="<td>
                            <h4>$currentDay</h4>
                            <button class='button btn-danger btn-xs'>N/A</button>
                        </td>";
        }
        else
        {
            $totalbookings = checkSlots($mysqli, $date);

            //Actuellement nous avons 18 slots chaques jours.
            if($totalbookings==18)
            {
                $calendar.="<td class='$today'>
                            <h4>$currentDay</h4>
                            <a class='button btn-danger btn-xs' href='#'>Full</a>
                        </td>";
            }
            else
            {
                $availableslots=18-$totalbookings;
                $calendar.="<td class='$today'>
                            <h4>$currentDay</h4>
                            <a class='button btn-success btn-xs' href='book.php?date=".$date."'>Réservé</a>
                            ";
                // $calendar.="<small><i>$availableslots slots available</i></small>
                $calendar.="</td>";
            }
        }
        

        $calendar.="</td>";

        //incrementing the counter
        $currentDay++;
        $dayOfWeek++;
    }

    //Completing the row of the last week in month if necessary
    if ($dayOfWeek !=7)
    {
        $remainingDays = 7-$dayOfWeek;
        for ($i=0; $i<$remainingDays; $i++)
        {
            $calendar.="<td></td>";
        }
    }

    $calendar.="</tr>";
    $calendar.="</table>";

    echo $calendar;
}

//---------------------------------------------------------------------//
$mysqli = require __DIR__."/database.php";

function checkSlots($mysqli, $date)
{
    $sql = "SELECT * FROM bookings
            WHERE  date=?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s",$date);       
    $totalbookings=0;

    if ($stmt->execute())
    {
        $result=$stmt->get_result();
        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
                $totalbookings++;
            }
            $stmt->close();
        }
    }
    return $totalbookings;
}

if(isset($_GET["date"]))
{
    $date = $_GET["date"];
    $sql = "SELECT * FROM bookings
            WHERE  date=?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s",$date);       
    $bookings=array();

    if ($stmt->execute())
    {
        $result=$stmt->get_result();
        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
                $bookings[]=$row['timeslot'];
            }
            $stmt->close();
        }
    }
}

if(isset($_POST["submit"]))
{
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $timeslot =$_POST["timeslot"];

    $sql = "SELECT * FROM bookings
    WHERE  date=? AND timeslot = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss",$date, $timeslot);        

    if ($stmt->execute())
    {
        $result=$stmt->get_result();
        if($result->num_rows>0)
        {
            $msg = "<div class='alert alert-danger'>Already Booked</div>";
        }
        else
        {
            $sql = "INSERT INTO bookings (name, lastname, phone, email, date, timeslot)
            VALUES(?,?,?,?,?,?)";

            $stmt = $mysqli->prepare($sql);
            $stmt = $mysqli->stmt_init();

            if ( ! $stmt->prepare($sql)) 
            {
                die("SQL error: " . $mysqli->error);
            }

            $stmt->bind_param("ssssss",
                            $name,
                            $lastname,
                            $phone,
                            $email,
                            $date,
                            $timeslot);
                            
            $stmt->execute();
            $msg = "<div class='alert alert-success'>Booking Successfull</div>";
            $bookings[]=$timeslot;   
            $stmt->close();
            $mysqli->close(); 
        }
    }
}

$duration = 30;
$cleanup = 0;
$start = "09:00";
$end = "18:00";

//---------------------------------------------------------------------//
function timeslot($duration, $cleanup, $start, $end)
{
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slot = array();

    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval))
    {
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end)
        {
            break;
        }
        // $slot[]= $intStart->format("H:iA")." - ".$endPeriod->format("H:iA");
        $slot[]= $intStart->format("H:i");
    }

    return $slot;   
}