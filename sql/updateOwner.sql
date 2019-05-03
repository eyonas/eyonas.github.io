update final_owners
set final_owners.name = :name, final_owners.address = :address, final_owners.city = :city, final_owners.Zip_code = :zipcode,
final_owners.email = :email, final_owners.username = :username, final_owners.password = :password
where
final_owners.ownerid = :id;