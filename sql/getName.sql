select final_owners.name as ownerName, final_dogs.name as name
from final_owners join final_dogs on
final_owners.ownerid = final_dogs.ownerid
where final_dogs.dogid = :id;