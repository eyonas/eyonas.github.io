select dogid, final_owners.name as ownerName, final_owners.email as email, final_dogs.name as name, 
	final_dogs.breed as breed, final_dogs.sex as sex, final_dogs.age as age, final_dogs.color as color
from final_owners join final_dogs on
final_owners.ownerid = final_dogs.ownerid
where breed = :word;
	