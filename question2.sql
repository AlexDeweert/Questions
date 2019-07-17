--2.1
select owner.name, horse.Name from owneronhorse
inner join horse on owneronhorse.HorseID = horse.id
inner join owner on owneronhorse.OwnerID = owner.id

--2.2
select
  horse.Name as horseName,
  jockey.name as jockeyName
 from jockeyonhorse
 inner join horse on jockeyonhorse.HorseID = horse.Id
 inner join jockey on jockeyonhorse.JockeyID = jockey.Id
 
 --2.3
 select jockeyName from (
   select horse.Id as horseID, jockey.Name as jockeyname
   from jockeyonhorse
   inner join horse on jockeyonhorse.HorseID = horse.Id
   inner join jockey on jockeyonhorse.JockeyID = jockey.id
 ) as T
 inner join owneronhorse on T.horseID = owneronhorse.HorseID
 where OwnerID = 1234
 group by jockeyName
 
 --2.4
select * from (
   select PhotoURL from (
     select * from jockeyonhorse
     inner join horse on horse.Id = jockeyonhorse.HorseID
     where HorseID = 23) as T
   inner join assetphotos on JockeyID = assetphotos.AssetID) AS U
 
 --2.4.1
select IFNULL(PhotoURL, "/default.png") as PhotoURL from (
   select JockeyID, HorseID from jockeyonhorse
   inner join horse on horse.Id = jockeyonhorse.HorseID
   where HorseID = 23) as T
 inner join assetphotos on JockeyID = assetphotos.AssetID
 
 --2.5
 select PhotoURL from (
   select * from (
     select * from assetphotos where assetphotos.AssetTableName = "horse") as Horses
     inner join owneronhorse on owneronhorse.HorseID = Horses.AssetID
     inner join horse on horse.Id = Horses.AssetID
     where Breed = "Arabian") as Arabians
   inner join owner on owner.Id = Arabians.OwnerID
where owner.Email = "careers@northorca.com"
