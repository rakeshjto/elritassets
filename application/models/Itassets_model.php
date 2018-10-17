<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itassets_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
			$this->db=$this->load->database('default',true);
			
    } 
	
    function get_summary()
    {
    	$sql="SELECT 'COMPUTERS' ASSET_NAME, COUNT(*) ASSET_CNT  FROM `glpi_computers` where computertypes_id=1
		UNION SELECT 'LAPTOPS' ASSET_NAME, COUNT(*) ASSET_CNT  FROM `glpi_computers` where computertypes_id<>1
		UNION SELECT 'MONITORS' ASSET_NAME, COUNT(*) ASSET_CNT  FROM `glpi_monitors`  
		UNION SELECT 'PRINTERS' ASSET_NAME, COUNT(*) ASSET_CNT  FROM `glpi_printers`
		";
		$query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function get_overview($asset,$report_item){
		switch ($report_item) 
		{
			case "Serial":
				if($asset=='COMPUTERS'){
				$asset='COMPUTERS';
				$criteria="WHERE computertypes_id=1";
				}
				else if($asset=='LAPTOPS'){
				$asset='COMPUTERS';
				$criteria="WHERE computertypes_id<>1";
				}
				else{
				$criteria="";
				}
				$sql="SELECT SUBSTRING(serial,1,4) report_item,count(*) CNT FROM `glpi_".$asset."` " .$criteria. " group by SUBSTRING(serial,1,4) ORDER BY CNT DESC";
				break;
			
			case "STATUS":
				if($asset=='COMPUTERS'){
				$asset='COMPUTERS';
				$criteria="WHERE computertypes_id=1";	
				}
				else if($asset=='LAPTOPS'){
				$asset='COMPUTERS';
				$criteria="WHERE computertypes_id<>1";
				}
				else{
				$criteria="";
				}
				$sql="SELECT B.NAME report_item,count(*) CNT FROM `glpi_".$asset."` A LEFT OUTER JOIN GLPI_STATES as B on A.STATES_ID=B.ID " .$criteria. " group by B.NAME ORDER BY CNT DESC";
				break;
			
			case "Make":
				if($asset=='COMPUTERS'){
				$asset='COMPUTERS';
				$criteria="LEFT OUTER JOIN GLPI_MANUFACTURERS as B on A.MANUFACTURERS_ID=B.ID WHERE computertypes_id=1";
				$name= "B.NAME";
				}
				else if($asset=='LAPTOPS'){
				$asset='COMPUTERS';
				$criteria="LEFT OUTER JOIN GLPI_MANUFACTURERS as B on A.MANUFACTURERS_ID=B.ID WHERE computertypes_id<>1";	
				$name= "B.NAME";
				}
				else if($asset=='PRINTERS'){
				$asset='PRINTERS';
				$criteria="";
				$name= "left(A.name,INSTR(A.name,' ')-1)";				
				}
				else{
				$criteria="LEFT OUTER JOIN GLPI_MANUFACTURERS as B on A.MANUFACTURERS_ID=B.ID";	
				$name= "B.NAME";
				}
				$sql="SELECT " .$name. " report_item,count(*) CNT FROM `glpi_".$asset."` A " .$criteria. "  group by " .$name. " ORDER BY CNT DESC";
				break;
			
			case "OSV":
				if($asset=='COMPUTERS'){
				$asset='COMPUTERS';
				$criteria="WHERE computertypes_id=1";	
				}
				else if($asset=='LAPTOPS'){
				$asset='COMPUTERS';
				$criteria="WHERE computertypes_id<>1";	
				}
				else{
				$criteria="";	
				}
				if($asset=='COMPUTERS'|| $asset=='LAPTOPS'){
					$sql="SELECT CONCAT(D.NAME,' ',C.NAME) report_item,count(*) CNT FROM `glpi_".$asset."` A 
						LEFT OUTER JOIN glpi_items_operatingsystems as B on A.ID=B.ITEMS_ID  
						LEFT OUTER JOIN glpi_operatingsystemversions as C on B.OPERATINGSYSTEMVERSIONS_ID=C.ID 
						LEFT OUTER JOIN glpi_operatingsystems as D on B.OPERATINGSYSTEMS_ID=D.ID 
						" .$criteria. " group by CONCAT(D.NAME,' ',C.NAME) ORDER BY CNT DESC";
				}
				break;
			
			case "X86_64":
				if($asset=='COMPUTERS'){
				$asset='COMPUTERS';
				$criteria="WHERE computertypes_id=1";	
				}
				else if($asset=='LAPTOPS'){
				$asset='COMPUTERS';
				$criteria="WHERE computertypes_id<>1";	
				}
				else{
				$criteria="";	
				}
				if($asset=='COMPUTERS'|| $asset=='LAPTOPS'){
					$sql="SELECT C.NAME report_item,count(*) CNT FROM `glpi_".$asset."` A 
							LEFT OUTER JOIN glpi_items_operatingsystems as B on A.ID=B.ITEMS_ID  
							LEFT OUTER JOIN glpi_operatingsystemarchitectures as C on B.operatingsystemarchitectures_ID=C.ID 
							" .$criteria. " group by C.NAME ORDER BY CNT DESC";
				}
				break;
			
			case "Edak_User":
				if($asset=='COMPUTERS'){
				$asset='COMPUTERS';
				$criteria="WHERE computertypes_id=1";	
				}
				else if($asset=='LAPTOPS'){
				$asset='COMPUTERS';
				$criteria="WHERE computertypes_id<>1";	
				}
				else if($asset=='MONITORS'){
				$asset='COMPUTERS';
				$criteria="LEFT OUTER JOIN glpi_computers_items as C ON A.ID=C.COMPUTERS_ID WHERE C.ITEMTYPE='Monitor'";	
				}
				else if($asset=='PRINTERS'){
				$asset='COMPUTERS';
				$criteria="LEFT OUTER JOIN glpi_computers_items as C ON A.ID=C.COMPUTERS_ID WHERE C.ITEMTYPE='Printer'";	
				}
				$sql="SELECT left(A.name,INSTR(a.name,'-')-1) report_item,B.NAME incharge_name,COUNT(*) CNT FROM `glpi_".$asset."` A LEFT OUTER JOIN users as B on left(A.name,INSTR(A.name,'-')-1)=B.username " .$criteria. "  group by left(a.name,INSTR(A.name,'-')-1),B.NAME ORDER BY CNT DESC";
				break;
				
			case "Location":
				if($asset=='COMPUTERS'){
				$asset='COMPUTERS';
				$criteria="WHERE computertypes_id=1";	
				}
				else if($asset=='LAPTOPS'){
				$asset='COMPUTERS';
				$criteria="WHERE computertypes_id<>1";	
				}
				else if($asset=='MONITORS'){
				$asset='COMPUTERS';
				$criteria="LEFT OUTER JOIN glpi_computers_items as C ON A.ID=C.COMPUTERS_ID WHERE C.ITEMTYPE='Monitor'";	
				}
				else if($asset=='PRINTERS'){
				$asset='COMPUTERS';
				$criteria="LEFT OUTER JOIN glpi_computers_items as C ON A.ID=C.COMPUTERS_ID WHERE C.ITEMTYPE='Printer'";	
				}
				$sql="SELECT B.division report_item,COUNT(*) CNT FROM `glpi_".$asset."` A 
					LEFT OUTER JOIN units as B on left(A.name,INSTR(A.name,'-')-1)=B.code " .$criteria. "
					group by B.division ORDER BY CNT DESC";
				break;			
			
			default:
				
		}
		
		$query = $this->db->query($sql);
        return $query->result_array();
	}
	
	function edak_userWise_comps()
    {
		$sql= "SELECT a.id,a.compname,a.contact,a.edakname, b.name empname,b.mobile,b.designation, c.division ,d.remote_addr from 
		(SELECT id,name compname, contact,left(name,INSTR(name,'-')-1) edakname,is_deleted from glpi_computers) A
		LEFT OUTER JOIN users as b on a.edakname=b.unit LEFT OUTER JOIN units as c on a.edakname=c.code LEFT OUTER JOIN glpi_plugin_fusioninventory_inventorycomputercomputers as D on a.id=d.computers_id where a.is_deleted=0";
     $query = $this->db->query($sql);
     return $query->result_array();   
    }
} 


