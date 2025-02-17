# OIDC Restriction Roles

**OIDC Restriction Roles** est un module complémentaire au module [OIDC](https://www.drupal.org/project/oidc) de Drupal. Il permet de restreindre l’attribution des rôles Drupal en fonction des informations contenues dans le token OIDC, notamment les groupes ou attributs renvoyés par le fournisseur d'identité (IdP).

## 📌 Fonctionnalités

- **Filtrage des rôles OIDC** : Restreint l’attribution automatique des rôles Drupal en fonction des claims du token OIDC.
- **Basé sur les groupes OIDC** : Seuls les utilisateurs appartenant à certains groupes dans le fournisseur d’identité peuvent obtenir des rôles spécifiques.
- **Complément au module OIDC** : Ce module ne remplace pas [OIDC pour Drupal](https://www.drupal.org/project/oidc) mais ajoute une couche de restriction.
- **Facilement configurable** : Compatible avec les fournisseurs d'identité OIDC comme Google, Azure AD, Keycloak, etc.

---

## ⚙️ Prérequis

- **Drupal 9 ou 10** installé
- Le module [OIDC](https://www.drupal.org/project/oidc) activé
- Un fournisseur d’identité OIDC (Keycloak, Google, Azure AD, etc.)

---

## 🚀 Installation

1. **Téléchargez le module**  
   Clonez le dépôt dans le dossier `modules/custom/` de votre site Drupal :

   ```bash
   cd modules/custom/
   git clone https://github.com/AltiUP/oidc-restriction-roles.git
   ```

2. **Activez le module dans Drupal**  

   Via Drush :

   ```bash
   drush en oidc_restriction_roles -y
   ```

   Ou via l'interface d'administration (`/admin/modules`).

---

## ⚙️ Configuration

1. **Accédez à la configuration du module**  
   Allez dans **Administration > Configuration > Système > OpenID Connect** (`/admin/config/services/oidc`).

2. **Définissez vos restrictions de rôles**  
   Dans l'onglet **OIDC Restriction Roles**, configurez :
   - Les rôles Drupal pouvant être attribués via OIDC
   - Les groupes ou claims requis dans le token OIDC pour chaque rôle

3. **Exemple de configuration avec Keycloak**  
   Supposons que Keycloak envoie un claim `groups` contenant `["admins", "editors"]`, et que vous souhaitiez attribuer le rôle `editor` uniquement si l'utilisateur appartient au groupe `editors`.

   Votre configuration pourrait ressembler à ceci :

   ```yaml
   roles_restrictions:
     editor:
       claim: "groups"
       value: "editors"
   ```

---

## 🛠️ Développement & Personnalisation

Si vous souhaitez modifier ou étendre le module :
- Le fichier principal du module se trouve dans `oidc_restriction_roles.module`
- Les hooks d'intégration avec OIDC sont dans `oidc_restriction_roles.services.yml`
- Pour ajouter des conditions personnalisées, modifiez `src/EventSubscriber/OidcRoleRestrictionSubscriber.php`

---

## 🐝 Rapport de Bugs & Contributions

Si vous souhaitez signaler un bug ou proposer une amélioration, vous pouvez :
- Ouvrir une **issue** sur [le dépôt GitHub](https://github.com/AltiUP/oidc-restriction-roles/issues)
- Soumettre une **pull request** avec vos modifications


---

## 📚 Licence

Ce module est sous licence **GPL v2 ou ultérieure**.

---

## 👤 Crédits

Ce module a été développé et maintenu par [AltiUP](https://github.com/AltiUP).

---

## 📢 Ressources & Support

- 📚 **Documentation du module OIDC** : [https://www.drupal.org/project/oidc](https://www.drupal.org/project/oidc)
- 🔗 **Spécifications OpenID Connect** : [https://openid.net/connect/](https://openid.net/connect/)
- ❓ **Discussion et support** : Utilisez les issues du dépôt GitHub pour signaler des bugs ou proposer des améliorations.

---

🚀 **OIDC Restriction Roles** vous permet de mieux contrôler l’attribution des rôles dans Drupal en fonction des informations envoyées par votre fournisseur d’identité OIDC. 🎯
