
# CSI2532 - Lab9 - Jetons d'API


## Exercice 1: Configurer PHPAPP

``` git clone @github.com:professor-forward/phpapp.git ```



## Exercice 2: Créer un client

```sql
CREATE TABLE clients(name varchar(100) PRIMARY KEY,
                     token varchar(500) DEFAULT md5(random()::text),
                     data jsonb);
                     
INSERT INTO clients(name,token)
VALUES('Big Co.','d7d85f7eac7360d725b44d327445473e' ),
('Small Co.','9f8983a8494c8a003e064374ffb77cb6');
```



### Exercice 3,4,5

voir api.php