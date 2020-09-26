
///////////////////////////////
APPROVED 
/////////////////////////////

SELECT  


      max(Name),
	   max(FirstName),
	    max(MidName)  
	 		,count(TimeVal)
	 
  
  FROM [Orion].[dbo].pList join [Orion].[dbo].pLogData on pLogData.HozOrgan=pList.ID where  DoorIndex=36 and TimeVal >='01.08.2020' and TimeVal<='31.08.2020 23:59:59.000' 
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
where DoorIndex=36 and TimeVal >='01.08.2020' and TimeVal<='31.08.2020 23:59:59.000' order by TimeVal

  ////////////////////////
  ///TimeVal
  ////////////////////////
  
  
  
  
  
  