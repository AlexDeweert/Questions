select owner.name, horse.Name from owneronhorse
inner join horse on owneronhorse.HorseID = horse.id
inner join owner on owneronhorse.OwnerID = owner.id

