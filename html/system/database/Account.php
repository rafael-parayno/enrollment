<?php


class Account
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData()
    {
        $result = $this->db->con->query("SELECT account_id,mode,personaldata.sno,CONCAT(personaldata.firstname,' ',personaldata.lastname) AS 'StudentName',
                                        RemBalance,totalPayment,Totalbalance,schoolyear.school_year,sem.semterm FROM `accounts` 
                                        LEFT JOIN schoolyear ON accounts.syid = schoolyear.sy_id 
                                        LEFT JOIN sem ON accounts.semid = sem.semid 
                                        LEFT JOIN personaldata ON accounts.sno = personaldata.sno");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDataActivated($semid, $syid)
    {
        // Prepare the SQL query with placeholders
        $stmt = $this->db->con->prepare("SELECT account_id, mode, personaldata.sno, CONCAT(personaldata.firstname, ' ', personaldata.lastname) AS 'StudentName',
                                         RemBalance, totalPayment, Totalbalance, schoolyear.school_year, sem.semterm 
                                         FROM `accounts` 
                                         LEFT JOIN schoolyear ON accounts.syid = schoolyear.sy_id 
                                         LEFT JOIN sem ON accounts.semid = sem.semid
                                         LEFT JOIN personaldata ON accounts.sno = personaldata.sno 
                                         WHERE accounts.semid = ? AND accounts.syid = ?");

        if (!$stmt) {
            // Handle prepare error, e.g., log it and return an empty array
            error_log("Prepare failed: " . $this->db->con->error);
            return [];
        }

        // Bind the parameters
        $stmt->bind_param("ii", $semid, $syid);

        // Execute the query
        if (!$stmt->execute()) {
            // Handle execute error, e.g., log it and return an empty array
            error_log("Execute failed: " . $stmt->error);
            return [];
        }

        // Fetch the results
        $result = $stmt->get_result();
        $resultArray = [];
        while ($item = $result->fetch_assoc()) {
            $resultArray[] = $item;
        }

        // Close the statement
        $stmt->close();

        return $resultArray;
    }


    public function getStudAccountSin($sno, $syid)
    {
        $result = $this->db->con->query("SELECT account_id,mode,RemBalance,totalPayment,Totalbalance,schoolyear.school_year,sem.semterm FROM `accounts` 
                                        LEFT JOIN schoolyear ON accounts.syid = schoolyear.sy_id 
                                        LEFT JOIN sem ON accounts.semid = sem.semid 
                                        LEFT JOIN personaldata ON accounts.sno = personaldata.sno 
                                        WHERE accounts.sno = '{$sno}' AND accounts.syid = {$syid}");

        $acc = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $acc;
    }



    public function getStudAccount($sno)
    {
        $result = $this->db->con->query("SELECT account_id,mode,RemBalance,totalPayment,Totalbalance,schoolyear.school_year,sem.semterm FROM `accounts` 
                                        LEFT JOIN schoolyear ON accounts.syid = schoolyear.sy_id 
                                        LEFT JOIN sem ON accounts.semid = sem.semid 
                                         LEFT JOIN personaldata ON accounts.sno = personaldata.sno 
                                         WHERE accounts.sno = '{$sno}'");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }





    public function checkStudPaid($sno, $syid, $semid)
    {
        $result = $this->db->con->query("SELECT * FROM `accounts` WHERE sno = '{$sno}' AND syid = {$syid} AND semid = {$semid}");

        $resultArray = mysqli_num_rows($result);

        return $resultArray;
    }




    public function insertData($params = null, $table = "accounts")
    {
        if ($this->db->con != null) {
            if ($params != null) {

                $columns = implode(',', array_keys($params));
                // print_r($columns);
                $values = implode(',', array_values($params));
                //   print_r($values);

                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);


                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    public function addAccounts(
        $syid,
        $semid,
        $sno,
        $mode,
        $Totalbal,
        $totalPay,
        $RemBal
    ) {

        $params = array(
            'syid' => $syid,
            'semid' => $semid,
            'sno' => "'{$sno}'",
            'mode ' =>  "'{$mode}'",
            'Totalbalance' =>  $Totalbal,
            'totalPayment' => $totalPay,
            'RemBalance' => $RemBal,
        );


        $result = $this->insertData($params);
    }
}
