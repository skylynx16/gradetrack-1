<?php

class gt_model extends CI_Model
{
	//--------------------------------------------------------------------------------------------------------------------------------------
    //GET RECORDS BY GENERIC ACCESS VERSION1
	function getRecords($tables, $fieldName, $where, $join, $joinType, $sortBy, $sortOrder, $limit, $fieldNameLike, $like, $whereSpecial) {
		$q = $this->db->select('*')
			 ->distinct()
			 ->from($tables[0]); 
			 
			 //JOIN---------------------------------------
			 if(!empty($join)) {
				 for($i = 0; $i < count($join);$i++) {
					$q->join($tables[$i + 1], $join[$i],  $joinType[$i]);
				 }
			 }
			 
			 //WHERE--------------------------------------
			 if(!empty($where)) {
				 for($i = 0; $i < count($where);  $i++) {
					$q->where($fieldName[$i],  $where[$i]); 
				 }
			 }

			 //WHERE SPECIAL--------------------------------------
			 if(!empty($whereSpecial)) {
				 for($i = 0; $i < count($whereSpecial);  $i++) {
					$q->where($whereSpecial[$i]);
				 }
			 }
			 
			 
			 //LIKE--------------------------------------
			 if(!empty($like)) {
				 for($i = 0; $i < count($like);  $i++) {
					$q->like($fieldNameLike[$i],  $like[$i]);
				 }
			 }
			 
			 
			 //ORDER BY----------------------------------
			 if(!empty($sortBy)) {
				 for($i = 0; $i < count($sortBy);  $i++) {
					$q->order_by($sortBy[$i],  $sortOrder[$i]);
				 }
			 }
			 //LIMIT----------------------------------
			 if(!empty($limit)) {
				$q->limit($limit[0],  $limit[1]);
			 }
			 
		$data = $q->get()->result();
        return $data;
	}

     //--------------------------------------------------------------------------------------------------------------------------------------
    //GET RECORDS BY GENERIC ACCESS
	function getRecordsData($data, $tables, $fieldName, $where, $join, $joinType, $sortBy, $sortOrder, $limit, $fieldNameLike, $like, $whereSpecial, $groupBy) {

		//DATA--------------------------------------
		$dataSelect = null;
		if(!empty($data)) {
			for($i = 0; $i < count($data);  $i++) {
				if($i == 0) {
					$dataSelect = $dataSelect . $data[$i];
				} else {	
					$dataSelect = $dataSelect . ", " . $data[$i];
				}
			}
		}
		
		$q = $this->db->select($dataSelect)
			 ->distinct()
			 ->from($tables[0]); 
			 
			 //JOIN---------------------------------------
			 if(!empty($join)) {
				 for($i = 0; $i < count($join);$i++) {
					$q->join($tables[$i + 1], $join[$i],  $joinType[$i]);
				 }
			 }
			 
			 //WHERE--------------------------------------
			 if(!empty($where)) {
				 for($i = 0; $i < count($where);  $i++) {
					$q->where($fieldName[$i],  $where[$i]); 
				 }
			 }

			 //WHERE SPECIAL--------------------------------------
			 if(!empty($whereSpecial)) {
				 for($i = 0; $i < count($whereSpecial);  $i++) {
					$q->where($whereSpecial[$i]);
				 }
			 }
			 
			 
			 //LIKE--------------------------------------
			 if(!empty($like)) {
				 for($i = 0; $i < count($like);  $i++) {
					$q->like($fieldNameLike[$i],  $like[$i]);
				 }
			 }
			 
			 
			 //ORDER BY----------------------------------
			 if(!empty($sortBy)) {
				 for($i = 0; $i < count($sortBy);  $i++) {
					$q->order_by($sortBy[$i],  $sortOrder[$i]);
				 }
			 }
			 //LIMIT----------------------------------
			 if(!empty($limit)) {
				$q->limit($limit[0],  $limit[1]);
			 }
			 //GROUP BY----------------------------------
			 if(!empty($groupBy)) {
				 for($i = 0; $i < count($groupBy);  $i++) {
					$q->group_by($groupBy[$i]);
				 }
			 }
			 
		$data = $q->get()->result();
        return $data;
	}
    //GET RECORDS BY GENERIC ACCESS
    //--------------------------------------------------------------------------------------------------------------------------------------
    

    //------------------------------------------------------------------------
    //INSERT RECORDS
	function insertRecords($tableName, $data)
	{
		$id = $this->db->insert($tableName, $data);
		
		return $this->db->insert_id();
	}
    //INSERT RECORDS
    //------------------------------------------------------------------------
    //------------------------------------------------------------------------
    //UPDATE RECORDS
	function updateRecords($tableName, $fieldName, $where, $data)
	{
		//WHERE--------------------------------------
		if(!empty($where)) {
			for($i = 0; $i < count($where);  $i++) {
		    	$this->db->where($fieldName[$i], $where[$i]);
			}
		}
		$this->db->update($tableName, $data);

		return 1;
    }
    //UPDATE RECORDS
    //------------------------------------------------------------------------
    //------------------------------------------------------------------------
    //DELETE RECORDS
	function deleteRecords($tableName, $fieldName, $where)
	{
		$this->db->where($fieldName, $where);
		$this->db->delete($tableName);
    }
    //DELETE RECORDS
    //------------------------------------------------------------------------

    //------------------------------------------------------------------------
    //GET SUBJECTS TAUGHT
	function getsubjectstaught($FCode)
	{
		$subjectstaught =
		$this->db->query(
		"Select distinct
		tblenrollment.SectCode,
		tblenrollment.ESubjCode,
		tblsubject.Description,
		tblschedule.FCode
		from tblenrollment
		left join tblsubject on tblenrollment.ESubjCode = tblsubject.SubjCode
		left join tblschedule on tblenrollment.ESubjCode = tblschedule.SubjCode
		left join tblstudentpersonaldata on tblenrollment.StudNo = tblstudentpersonaldata.StudNo
		where tblschedule.FCode = '".$FCode."';"
		);

		return $subjectstaught->result();
	}
    //GET SUBJECTS TAUGHT
    //------------------------------------------------------------------------

    //------------------------------------------------------------------------
    //GET SUBJECTS ENROLLED
	function getsubjectsenrolled($StudNo)
	{
		$subjectsenrolled=
		$this->db->query(
		"Select
		tblenrollment.SectCode,
		tblenrollment.ESubjCode,
		tblsubject.Description,
		tblenrollment.StudNo
		from tblenrollment
		left join tblsubject on tblenrollment.ESubjCode = tblsubject.SubjCode
		left join tblschedule on tblenrollment.ESubjCode = tblschedule.SubjCode
		where tblenrollment.StudNo = '".$StudNo."';"
		);

		return $subjectsenrolled->result();
	}
    //GET SUBJECTS ENROLLED
    //------------------------------------------------------------------------

	//CREATE TABLE
	function createtable($SubjCode)
	{
		$changedname = str_replace(".","",str_replace("_","",$SubjCode));

		$this->db->query(
		"CREATE TABLE IF NOT EXISTS tbl".$changedname." (
		    StudNo varchar(15) Unique,
		    StudName varchar(100),
		    PercMidtermGrade float,
		    DecMidtermGrade float,
		    MidtermGradeConfirmed int default 0,
		    PercPreFinalGrade float,
		    DecPreFinalGrade float,
		    PercFinalGrade float,
		    DecFinalGrade float
		);"
		);

		$this->db->query(
		"INSERT IGNORE INTO tbl".$changedname." (StudNo, StudName)
		select
			tblenrollment.StudNo,
			concat(tblstudentpersonaldata.FName,' ',tblstudentpersonaldata.MName,' ', tblstudentpersonaldata.LName) As StudName
		from tblenrollment
		left join tblsubject on tblenrollment.ESubjCode = tblsubject.SubjCode
		left join tblschedule on tblenrollment.ESubjCode = tblschedule.SubjCode
		left join tblstudentpersonaldata on tblenrollment.StudNo = tblstudentpersonaldata.StudNo
		where tblenrollment.ESubjCode = '".$SubjCode."';
		");

		return "tbl".$changedname;
	}
    //CREATE TABLE
    //------------------------------------------------------------------------
}