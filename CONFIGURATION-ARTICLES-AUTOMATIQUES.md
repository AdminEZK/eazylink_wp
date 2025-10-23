# Configuration des Articles Automatiques - EazyLink

## 📋 Vue d'ensemble

Ce guide vous explique comment configurer la création d'articles automatique sur votre site EazyLink, soit via l'administration WordPress, soit via N8N pour une automatisation complète.

## ✅ Fonctionnalités Configurées

### 1. Affichage Dynamique sur la Page d'Accueil
- ✅ Les 4 derniers articles publiés s'affichent automatiquement
- ✅ Récupération automatique des catégories, images et extraits
- ✅ Fallback élégant si aucun article n'existe
- ✅ Liens dynamiques vers les articles complets

### 2. API REST Personnalisée
- ✅ Endpoint sécurisé pour créer des articles via N8N
- ✅ Authentification par clé API
- ✅ Gestion automatique des catégories et tags
- ✅ Upload automatique des images depuis URL
- ✅ Validation et sécurisation des données

## 🔧 Configuration WordPress Admin

### Étape 1: Accéder à la Configuration API
1. Connectez-vous à votre administration WordPress
2. Allez dans **Réglages > API EazyLink**
3. Notez la clé API générée automatiquement
4. Copiez les URLs des endpoints

### Étape 2: Créer des Articles Manuellement
1. Allez dans **Articles > Ajouter**
2. Remplissez le titre, contenu, extrait
3. Assignez une catégorie
4. Ajoutez une image à la une
5. Publiez l'article

### Étape 3: Utiliser le Créateur d'Articles Intégré
1. Allez dans **Outils > Créer Articles**
2. Cliquez sur "Créer les Articles"
3. 5 articles de démonstration seront créés automatiquement

## 🤖 Configuration N8N

### Étape 1: Récupérer les Informations API
Dans WordPress Admin > Réglages > API EazyLink :
- **URL API** : `https://votre-site.com/wp-json/eazylink/v1/create-article`
- **Clé API** : Copiez la clé générée
- **URL Catégories** : `https://votre-site.com/wp-json/eazylink/v1/categories`

### Étape 2: Configurer le Workflow N8N

#### Node HTTP Request - Créer un Article
```json
{
  "method": "POST",
  "url": "https://votre-site.com/wp-json/eazylink/v1/create-article",
  "headers": {
    "Content-Type": "application/json",
    "X-API-Key": "VOTRE_CLE_API_ICI"
  },
  "body": {
    "title": "{{ $json.title }}",
    "content": "{{ $json.content }}",
    "excerpt": "{{ $json.excerpt }}",
    "category": "{{ $json.category }}",
    "tags": ["{{ $json.tag1 }}", "{{ $json.tag2 }}"],
    "featured_image_url": "{{ $json.image_url }}",
    "status": "publish"
  }
}
```

#### Node HTTP Request - Récupérer les Catégories
```json
{
  "method": "GET",
  "url": "https://votre-site.com/wp-json/eazylink/v1/categories"
}
```

### Étape 3: Exemples de Workflows N8N

#### Workflow 1: Création d'Article depuis RSS
1. **RSS Feed Read** → Lire un flux RSS
2. **Set** → Formater les données
3. **HTTP Request** → Créer l'article via API

#### Workflow 2: Création d'Article depuis IA (OpenAI)
1. **Schedule Trigger** → Déclenchement programmé
2. **OpenAI** → Générer le contenu
3. **Set** → Formater les données
4. **HTTP Request** → Créer l'article via API

#### Workflow 3: Création d'Article depuis Notion
1. **Notion Trigger** → Déclenchement sur nouvelle page
2. **Notion** → Récupérer le contenu
3. **Set** → Formater les données
4. **HTTP Request** → Créer l'article via API

## 📊 Structure des Données

### Paramètres Requis
- `title` (string) : Titre de l'article
- `content` (string) : Contenu HTML de l'article

### Paramètres Optionnels
- `excerpt` (string) : Résumé de l'article
- `category` (string) : Nom de la catégorie (créée automatiquement si inexistante)
- `tags` (array) : Liste des tags
- `featured_image_url` (string) : URL de l'image à la une
- `status` (string) : 'draft', 'publish', ou 'pending' (défaut: 'publish')

### Réponse API
```json
{
  "success": true,
  "post_id": 123,
  "post_url": "https://votre-site.com/article-titre/",
  "edit_url": "https://votre-site.com/wp-admin/post.php?post=123&action=edit",
  "title": "Titre de l'article",
  "status": "publish",
  "date": "2024-01-15 10:30:00"
}
```

## 🔒 Sécurité

### Authentification
- Clé API unique générée automatiquement
- Authentification via header `X-API-Key`
- Vérification des permissions WordPress
- Validation et sanitisation de toutes les données

### Bonnes Pratiques
1. **Gardez votre clé API secrète**
2. **Utilisez HTTPS uniquement**
3. **Régénérez la clé API régulièrement**
4. **Surveillez les logs d'accès**

## 🎯 Catégories Recommandées

Pour votre blog EazyLink, nous recommandons ces catégories :
- Intelligence Artificielle
- Marketing Digital
- SEO
- Transformation Digitale
- E-commerce
- Stratégie IA
- Technologie
- ROI
- Innovation

## 🔄 Automatisation Avancée

### Scénarios d'Usage
1. **Publication Programmée** : Articles générés et publiés automatiquement
2. **Veille Technologique** : Création d'articles depuis des sources RSS
3. **Contenu IA** : Génération automatique via GPT/Claude
4. **Curation de Contenu** : Agrégation depuis plusieurs sources
5. **Newsletter Automatique** : Transformation d'emails en articles

### Intégrations Possibles
- **OpenAI/Claude** : Génération de contenu IA
- **RSS Feeds** : Curation automatique
- **Notion** : CMS headless
- **Airtable** : Base de données d'articles
- **Google Sheets** : Planning éditorial
- **Slack** : Notifications de publication

## 📈 Monitoring et Analytics

### Suivi des Publications
- Logs WordPress pour tracer les créations d'articles
- Réponses API avec URLs et IDs des articles créés
- Intégration possible avec Google Analytics

### Métriques Importantes
- Nombre d'articles créés automatiquement
- Taux de succès des publications
- Performance des articles automatiques vs manuels
- Engagement sur les différentes catégories

## 🚀 Mise en Production

### Checklist de Déploiement
- [ ] Configuration de la clé API
- [ ] Test des endpoints API
- [ ] Configuration du workflow N8N
- [ ] Test de création d'article
- [ ] Vérification de l'affichage sur la page d'accueil
- [ ] Configuration des catégories
- [ ] Test des images automatiques
- [ ] Mise en place du monitoring

### Support et Maintenance
- Sauvegarde régulière de la base de données
- Mise à jour des plugins WordPress
- Surveillance des logs d'erreur
- Optimisation des performances

---

## 📞 Support

Pour toute question ou problème :
1. Vérifiez les logs WordPress (wp-content/debug.log)
2. Testez les endpoints API manuellement
3. Vérifiez la configuration N8N
4. Consultez la documentation WordPress REST API

**Votre site EazyLink est maintenant prêt pour la création d'articles automatique !** 🎉
