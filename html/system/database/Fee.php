<?php

class Fee
{

    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData($syid, $semid, $yrlvl)
    {
        // Prepare the SQL query using placeholders
        $stmt = $this->db->con->prepare("SELECT fee_id, tfPerUnits, misc, school_year, semterm 
                                         FROM `fees` 
                                         LEFT JOIN schoolyear ON fees.syid = schoolyear.sy_id 
                                         LEFT JOIN sem ON fees.semid = sem.semid
                                         WHERE fees.syid = ? AND fees.semid = ? AND fees.lvl = ?");

        if (!$stmt) {
            // Handle prepare error, e.g., log it and return
            error_log("Prepare failed: " . $this->db->con->error);
            return null;
        }

        // Bind the parameters
        $stmt->bind_param("iii", $syid, $semid, $yrlvl);

        // Execute the query
        if (!$stmt->execute()) {
            // Handle execute error, e.g., log it and return
            error_log("Execute failed: " . $stmt->error);
            return null;
        }

        // Fetch the result
        $result = $stmt->get_result();
        if ($result) {
            $items = $result->fetch_assoc();
        } else {
            // Handle case where there is no valid result set
            $items = null;
        }

        // Close the statement
        $stmt->close();

        return $items;
    }


    public function checkIfEmpty($syid, $semid, $lvl)
    {
        $sql = "SELECT * FROM fees WHERE syid = {$syid} AND semid = {$semid} AND lvl = {$lvl}";
        $result =  $this->db->con->query($sql);

        $row = mysqli_num_rows($result);

        if ($row > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function insertData($params = null, $table = "fees")
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

    public function editFees(
        $tf,
        $msc,
        $syid,
        $semid,
        $lvl
    ) {

        $sql = "UPDATE fees SET tfPerUnits = {$tf},misc = {$msc} WHERE syid = {$syid} AND semid = {$semid} AND lvl = {$lvl}";

        $result = $this->db->con->query($sql);
        //echo $sql;
        return $result;
    }

    public function addfee(
        $tfee,
        $misc,
        $syid,
        $semid,
        $lvl
    ) {

        $params = array(
            'tfPerUnits' => $tfee,
            'misc' =>  $misc,
            'syid' =>  $syid,
            'semid' => $semid,
            'lvl' => $lvl
        );


        $isEmpty = $this->checkIfEmpty($syid, $semid, $lvl);

        if ($isEmpty) {
            $result = $this->insertData($params);
        } else {
            $this->editFees(
                $tfee,
                $misc,
                $syid,
                $semid,
                $lvl
            );
        }
    }
}
