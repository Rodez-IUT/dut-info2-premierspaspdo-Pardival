Ce qui se passe est une injection SQL à cause de la faille de sécurité présente dans le programme. 
En effet l'utilisateur à alors la possibilité de fermer de rechercher ce qu'il veut en manipulant le programme via le formulaire .
C'est comme sa qu'il a pu fermer les guillemets de la requete ainsi injecter OR 1=1 qui annule alors toute la requette
car 1=1 est toujours vrai. Ce qu'il se passe alors c'est que toutes les requettes possible du formulaire s'affiche. 