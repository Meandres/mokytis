#!/bin/bash

echo "Ce script nécessite mariadb/mysql"

echo "Indiquez le nom d'utilisateur de la BD :"
read username


mysql -u $username -p < Modele/BDD.sql

if [ $? -eq 0 ]; then
    echo "La base est initialisée !"
fi
