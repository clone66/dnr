
SELECT TOP 1000 [ID]
      ,[Gtype]
      ,[GTypeCodeAdd]
      ,[Config]
      ,Convert(varbinary(20),CodeP)
      ,[CodePAdd]
      ,[Status]
      ,[Owner]
      ,[OwnerName]
      ,[GrStatus]
      ,[GroupID]
      ,[Start]
      ,[Finish]
      ,[fingertemplate]
      ,[IndexForContactId]
      ,[Comment]
  FROM [Orion].[dbo].[pMark] where OwnerName='Тангиева Зарема Магомедовна'