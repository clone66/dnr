
///////////////////////////////
APPROVED 
/////////////////////////////

	SELECT  


		  max(Name),
		   max(FirstName),
			max(MidName)  
				,count(TimeVal)
		 
	  
	  FROM [Orion].[dbo].pList join [Orion].[dbo].pLogData on pLogData.HozOrgan=pList.ID where  DoorIndex=36 and  TimeVal >='01.03.2021' and TimeVal<='13.03.2021 23:59:59.000' 
		group by HozOrgan,Orion.dbo.pList.Name

	  order by Name 
  
 ///////////////////////////////
APPROVED 
///////////////////////////// 


  
  ////////////////////////
  ///TimeVal
  ////////////////////////



	SELECT Name,FirstName,MidName,TimeVal
	FROM [Orion].[dbo].pList join [Orion].[dbo].pLogData on pLogData.HozOrgan=pList.ID
	where DoorIndex=36 and TimeVal >='01.04.2021' and TimeVal<='28.04.2021 23:59:59.000' order by TimeVal

  ////////////////////////
  ///TimeVal
  ////////////////////////
  
  ////////////////////////
  ///ENTERING
  ////////////////////////
  
  
	SELECT Remark,TimeVal,Name,FirstName,MidName
	FROM Orion.dbo.pLogData join Orion.dbo.pList on pLogData.HozOrgan=pList.ID
	where (DoorIndex=1 or DoorIndex=3 or DoorIndex=5 or DoorIndex=7 or DoorIndex=9 or DoorIndex=11 or DoorIndex=15 and DoorIndex=22) 
	and TimeVal >='01.05.2021' and TimeVal<='17.05.2021 23:59:59.000' order by TimeVal
  
////////////////////////
///ENTERING
////////////////////////  
  
////////////////////////  
  UPDATE
////////////////////////    
		  use Orion;
		UPDATE pLogData

		set HozOrgan=294
		 from pLogData where DoorIndex=36 and HozOrgan=2606
		and TimeVal >='17.08.2021 12:00:59' and TimeVal<='17.08.2021 12:50:59.000' 

////////////////////////  
  UPDATE
////////////////////////    
  
  
////////////////////
delete .bak
//////////////////////////

DECLARE @DeleteDate DATETIME = DATEADD(d,-14,GETDATE());
EXECUTE master.dbo.xp_delete_file 0,"F:\Orion\bak\",N'bak',@DeleteDate,0; 
//////////////////////////  
  
  
  
  