<?php
    include_once('connection2.php');
     
    $database = new Connection();
    $db = $database->open();
    
    // Sanitize the GET parameter 'id' to prevent SQL injection attacks
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $stmt = $db->prepare("SELECT * FROM records
                            JOIN vacc_records ON records.id = vacc_records.id and records.user_id = records.user_id
                            JOIN vacc_backtracking_records ON records.id = vacc_backtracking_records.id and records.user_id = vacc_backtracking_records.user_id
                            WHERE records.id = ?");
    $stmt->execute([$id]);
    $record = $stmt->fetch();

    // Get the value of fname from the $record variable
    $fname = $record['fname'];
    $mname = $record['mname'];
    $lname = $record['lname'];

    $today = date("F j, Y");

    ob_start();
                require_once '../vendor/autoload.php';
                $mpdf = new \Mpdf\Mpdf();
                $html =   '<head>
                            <style>
                                h1{font-size: 18px; font-weight: normal;}
                                h2{font-size: 21px; text-align: center;}
                                h5{font-size: 15px; text-align: center; font-style: Algerian;}
                                h3{text-align: right; text-decoration: underline;}
                                h4{font-size: 11px; font-weight: normal;}
                                 br {
                                        line-height: 2%;
                                     }
                                h6{
                                    font-size: 18px; font-weight: normal; margin: 0;
                                }
                                footer {
                                    position: fixed;
                                    bottom: 0;
                                    width: 100%;

                                    text-align: center;
                                }
                            </style>
                        </head>
                        <img src="../images/logo.png"><br><br>
                        <hr style="margin: 0 auto 0 auto; color: #269dd8;">
                        <div style="margin-right: 1cm; margin-left: 1cm; margin-bottom: 0cm; ">
                        <h5> MUNICIPALITY OF ARGAO <br> <p style="font-size: 21px; margin: 0 auto 0 auto;" >RURAL HEALTH UNIT</p> </h5>
                        <h2> CERTIFICATE OF VACCINATION </h2>
                        
                        <p style="margin: 0 auto; font-size: 12pt;">To Whom It May Concern: </p>
                        
                        <p> &emsp; &emsp;This is to certify that <b>'.$fname.'</b> <b>'.$mname.'</b> <b>'.$lname.'</b> has taken all the vaccines listed below with the following details:</p>

                        <h2> Vaccination History </h2>
                        <table border="1" cellspacing="0" cellpadding="5" width="100%" align="center">
                            <tr>
                                <th>Number</th>
                                <th>Vaccine Name</th>
                                <th>Administered By</th>
                                <th>Age Administered</th>
                                <th>Date Taken</th>
                            </tr>';
                        $date_taken_array = array();
                        for($i = 1; $i <= 10; $i++) {
                            if (isset($record['vacc_name' . $i]) && !empty($record['vacc_name' . $i])) {
                                $date_taken_array[$i]['vacc_name'] = $record['vacc_name'.$i];
                                $date_taken_array[$i]['administered_by'] = $record['administered_by'.$i];
                                $date_taken_array[$i]['age_atm_taken'] = $record['age_atm_taken'.$i];
                                $date_taken_array[$i]['date_taken'] = $record['date_taken'.$i];
                            }
                        }

                        for($s = 1; $s <= 10; $s++) {
                            if (isset($record['vacc__name' . $s]) && !empty($record['vacc__name' . $s])) {
                                $date_taken_array[$i]['vacc_name'] = $record['vacc__name'.$s];
                                $date_taken_array[$i]['administered_by'] = $record['administered__by'.$s];
                                $date_taken_array[$i]['age_atm_taken'] = $record['age__atm__taken'.$s];
                                $date_taken_array[$i]['date_taken'] = $record['date__taken'.$s];
                                $i++;
                            }
                        }

                        usort($date_taken_array, function($a, $b) {
                            return strtotime($b['date_taken']) - strtotime($a['date_taken']);
                        });
                        $count = 1;
                        foreach($date_taken_array as $key => $row) {


                                $html .= 
                                        '<tr>
                                            <td align="center">' . $count . '</td>
                                            <td align="center">' . $row['vacc_name'] . '</td>
                                            <td align="center">' . $row['administered_by'] . '</td>
                                            <td align="center">' . $row['age_atm_taken'] . '</td>
                                            <td align="center">' . $row['date_taken'] . '</td>
                                        </tr>';

                                $count++;
                        }
                        $html .='</table>
                                <p>&emsp; &emsp;This certification is issued on <b>'.$today.'</b>.</p>
                                <br><br>
                                <h3 style="margin: 0 auto 0 auto;">DR. HAYCE F. RAMOS</h3>
                                <h6 style="text-align: right; text-decoration: none; margin: 0 auto 0 auto; ">Head, Argao Rural Health Unit I</h6>
                                <br><br>
                                <h3 style="margin: 0 auto 0 auto;">DR. ABIGAIL CLARICE P. BAJENTING</h3>
                                <h6 style="text-align: right; text-decoration: none; margin: 0 auto 0 auto; ">Head, Argao Rural Health Unit II</h6>
                                <br><br>
                                <h4>Not Valid Without Argao RHU Seal<br>Or with Erasure or Alteration</h4>
                               
                                <footer style=" color: #a29d9d; font-style: italic; margin-right: 0; margin-left: 0; text-align: center; margin: 0 auto 0 auto; font-size: 8px; margin-bottom: 0px;">
                                
                                <hr style="color: #269dd8; margin: 3 auto 0 auto;"><b>
                                "Argao Rural Health Unit: A healthcare for all."</b></footer></div>';
                $mpdf->WriteHTML($html);
                $mpdf->Output();
    ob_end_flush();
?>