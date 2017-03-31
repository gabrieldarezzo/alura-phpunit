# How to Install:  


```
git clone git@github.com:gabrieldarezzo/phpunit.git
cd phpunit  
composer update  
.\vendor\bin\phpunit  
```



Obs: Caso tenha mais classes, pode alterar o config.php 

@dica:
Recomendo usar o [ConEmu](https://conemu.github.io/):  


Pois da suporte a cores, Ex: 
```  
.\vendor\bin\phpunit --colors
```
Saida:
```diff 
+ SUCCESS!
- FAILLLLLLLLLLLLLLL!
```


### Alguns Atividades:  

Um leilão não deve aceitar: - 2 lances em sequência dado pelo mesmo usuário; - Um mesmo usuário não pode dar mais do que 5 lances no mesmo leilão;  


Implemente o método dobraLance(Usuario $usuario) na classe Leilao. Este método deve encontrar o último lance dado por este usuário e criar um novo lance com o dobro do lance anterior. Caso ele não tenha dado nenhum lance anteriormente, não é criado um novo lance.
Repare que ainda precisamos seguir as regras da propor um lance: no máximo 5 lances por usuários e dois lances seguidos do mesmo usuário não é válido.

Pratique TDD 100% do tempo durante a implementação.

