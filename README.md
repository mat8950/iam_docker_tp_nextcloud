# Communication sécurisée solutions cloud


# 1er test non réussis à re-tester

stack authentik + treafik


sources :

https://github.com/ChristianLempa/boilerplates/blob/main/docker-compose/traefik/config/example.middleware-authentik.yaml

# Stack IAM

Stack OpenLDAP + Keycloak + NextCloud + kasmweb

Mon but est de faire le TP 100% sur Docker.
L'utilisation des IP fixes n'est pas obligatoire dans mon cas car docker intègre un DNS.

Il y a 2 dossier Principale Ldap et Keycloack

chacun des dossier comporte mes configurations.

## Keycloack

j'ai commencé avec "First-realm-export.json" pour avoir une base de configuration.
j'ai donc fait plusieurs modification comme l'ajout de mappers dans User federation > Settings > LDAP.
Tout ces mmodiffications sont donc dans le nouveau fichier de configuration auto intégré.

la connexion URL est en IP fixe ldap://172.25.0.30:389 mais peut être remplacé avec le nom DNS de l'openldap.

## OpenLDAP

Dans le dossier ldap il y a base.ldif qui contient donc mon user mat.

le fichier est auto intégré dans OpenLDAP.

## Nextcloud

Première connexion création compte admin.

http://localhost/settings/apps/integration/sociallogin ajouter "social login" et l'activer.

se rendre dans administration setting > social login.

Ajouter dans Custom OpenID Connect le contenue si dessous :

| **Champ**                      | **Valeur**                                                            |
| ------------------------------ | --------------------------------------------------------------------- |
| **Internal name**              | Keycloak                                                              |
| **Title**                      | Keycloak                |
| **Authorize URL**              | http://keycloak:8080/realms/TP-REALM/protocol/openid-connect/auth     |
| **Token URL**                  | http://keycloak:8080/realms/TP-REALM/protocol/openid-connect/token    |
| **Display name claim**         | preferred_username                                                    |
| **User info URL**              | http://keycloak:8080/realms/TP-REALM/protocol/openid-connect/userinfo |
| **Logout URL** _(optionnel)_   | http://keycloak:8080/realms/TP-REALM/protocol/openid-connect/logout   |
| **Client ID**                  | nextcloud                                                             |
| **Client Secret**              | _Voir point1_                                                         |
| **Scope**                      | openid profile email                                                  |
| **Groups claim** _(optionnel)_ |                                                                       |
| Groups claim (optional)        |                                                                       |
| Button style                   | _Keycloak_                                                            |
**Point1** Client Secret pour next cloud

Aller sur keycloak admin,  Clients > nextcloud > Settings > Capability config > Client authentication > mettre sur On > save

Puis Crediantials > Clients secret > copier vers nextcloud.

## Kasmweb

connexion :
https://localhost:6901/
- login : kasm_user
- mdp : password

J'ai donc utilisé debian-bookworm-desktop de Kasmweb pour avoir une machine intégré a docker.

lacer un navigateur web et taper http://nextcloud puis cliquer sur le button noir et se connecter avec le user mat.

## Copie configuration 
### Keycloak
```bash
# Exporter le realm
docker exec keycloak /opt/keycloak/bin/kc.sh export --dir=/opt/keycloak/data/export --realm=TP-REALM --users=realm_file

# Récupérer ce fichier depuis l’hôte
docker cp keycloak:/opt/keycloak/data/export ./keycloak_export

```