const { createServer } = require('http');
const { parse } = require('url');
const axios = require('axios');

// Configuration WordPress
const WP_URL = process.env.WP_URL || 'http://website.local/';
const WP_USERNAME = process.env.WP_USERNAME || 'Admin';
const WP_PASSWORD = process.env.WP_PASSWORD || 'Admin';
const WP_API_BASE = '/wp-json/wp/v2';

// Port du serveur
const PORT = process.env.PORT || 3000;

// Fonction pour obtenir un token d'authentification
async function getAuthToken() {
    try {
        const response = await axios.post(`${WP_URL}/wp-json/jwt-auth/v1/token`, {
            username: WP_USERNAME,
            password: WP_PASSWORD
        });
        return response.data.token;
    } catch (error) {
        console.error('Erreur d\'authentification:', error.message);
        // Fallback à l'authentification basique si JWT n'est pas disponible
        return Buffer.from(`${WP_USERNAME}:${WP_PASSWORD}`).toString('base64');
    }
}

// Fonction pour lister les ressources disponibles
async function listResources() {
    return {
        posts: `${WP_URL}${WP_API_BASE}/posts`,
        pages: `${WP_URL}${WP_API_BASE}/pages`,
        categories: `${WP_URL}${WP_API_BASE}/categories`,
        tags: `${WP_URL}${WP_API_BASE}/tags`,
        media: `${WP_URL}${WP_API_BASE}/media`,
        users: `${WP_URL}${WP_API_BASE}/users`,
        comments: `${WP_URL}${WP_API_BASE}/comments`,
        taxonomies: `${WP_URL}${WP_API_BASE}/taxonomies`,
        types: `${WP_URL}${WP_API_BASE}/types`,
        statuses: `${WP_URL}${WP_API_BASE}/statuses`,
        settings: `${WP_URL}${WP_API_BASE}/settings`,
        themes: `${WP_URL}${WP_API_BASE}/themes`,
        plugins: `${WP_URL}${WP_API_BASE}/plugins`,
        // Types de contenu personnalisés
        resources: `${WP_URL}${WP_API_BASE}/resource`,
        experts: `${WP_URL}${WP_API_BASE}/expert`,
        solutions: `${WP_URL}${WP_API_BASE}/solution`,
        case_studies: `${WP_URL}${WP_API_BASE}/case_study`,
        // Taxonomies personnalisées
        resource_types: `${WP_URL}${WP_API_BASE}/resource_type`,
        seo_categories: `${WP_URL}${WP_API_BASE}/seo_category`,
        sectors: `${WP_URL}${WP_API_BASE}/sector`
    };
}

// Fonction pour lire une ressource
async function readResource(uri) {
    try {
        let authHeader;
        try {
            const token = await getAuthToken();
            authHeader = { Authorization: `Bearer ${token}` };
        } catch (error) {
            // Fallback à l'authentification basique
            authHeader = { Authorization: `Basic ${Buffer.from(`${WP_USERNAME}:${WP_PASSWORD}`).toString('base64')}` };
        }

        const response = await axios.get(uri, { headers: authHeader });
        return response.data;
    } catch (error) {
        console.error(`Erreur lors de la lecture de la ressource ${uri}:`, error.message);
        throw error;
    }
}

// Fonction pour créer une ressource
async function createResource(resourceType, data) {
    try {
        let authHeader;
        try {
            const token = await getAuthToken();
            authHeader = { Authorization: `Bearer ${token}` };
        } catch (error) {
            // Fallback à l'authentification basique
            authHeader = { Authorization: `Basic ${Buffer.from(`${WP_USERNAME}:${WP_PASSWORD}`).toString('base64')}` };
        }

        const endpoint = `${WP_URL}${WP_API_BASE}/${resourceType}`;
        const response = await axios.post(endpoint, data, { headers: authHeader });
        return response.data;
    } catch (error) {
        console.error(`Erreur lors de la création de la ressource ${resourceType}:`, error.message);
        throw error;
    }
}

// Fonction pour mettre à jour une ressource
async function updateResource(resourceType, id, data) {
    try {
        let authHeader;
        try {
            const token = await getAuthToken();
            authHeader = { Authorization: `Bearer ${token}` };
        } catch (error) {
            // Fallback à l'authentification basique
            authHeader = { Authorization: `Basic ${Buffer.from(`${WP_USERNAME}:${WP_PASSWORD}`).toString('base64')}` };
        }

        const endpoint = `${WP_URL}${WP_API_BASE}/${resourceType}/${id}`;
        const response = await axios.put(endpoint, data, { headers: authHeader });
        return response.data;
    } catch (error) {
        console.error(`Erreur lors de la mise à jour de la ressource ${resourceType}/${id}:`, error.message);
        throw error;
    }
}

// Fonction pour supprimer une ressource
async function deleteResource(resourceType, id) {
    try {
        let authHeader;
        try {
            const token = await getAuthToken();
            authHeader = { Authorization: `Bearer ${token}` };
        } catch (error) {
            // Fallback à l'authentification basique
            authHeader = { Authorization: `Basic ${Buffer.from(`${WP_USERNAME}:${WP_PASSWORD}`).toString('base64')}` };
        }

        const endpoint = `${WP_URL}${WP_API_BASE}/${resourceType}/${id}?force=true`;
        const response = await axios.delete(endpoint, { headers: authHeader });
        return response.data;
    } catch (error) {
        console.error(`Erreur lors de la suppression de la ressource ${resourceType}/${id}:`, error.message);
        throw error;
    }
}

// Création du serveur HTTP
const server = createServer(async (req, res) => {
    const { pathname, query } = parse(req.url, true);
    
    // Configuration des en-têtes CORS
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    res.setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    
    // Gestion des requêtes OPTIONS (pre-flight)
    if (req.method === 'OPTIONS') {
        res.writeHead(200);
        res.end();
        return;
    }
    
    try {
        // Endpoint pour lister les ressources disponibles
        if (pathname === '/list_resources' && req.method === 'GET') {
            const resources = await listResources();
            res.writeHead(200, { 'Content-Type': 'application/json' });
            res.end(JSON.stringify(resources));
            return;
        }
        
        // Endpoint pour lire une ressource
        if (pathname === '/read_resource' && req.method === 'GET') {
            if (!query.uri) {
                res.writeHead(400, { 'Content-Type': 'application/json' });
                res.end(JSON.stringify({ error: 'URI parameter is required' }));
                return;
            }
            
            const data = await readResource(query.uri);
            res.writeHead(200, { 'Content-Type': 'application/json' });
            res.end(JSON.stringify(data));
            return;
        }
        
        // Endpoint pour créer une ressource
        if (pathname === '/create_resource' && req.method === 'POST') {
            let body = '';
            req.on('data', chunk => {
                body += chunk.toString();
            });
            
            req.on('end', async () => {
                try {
                    const { resourceType, data } = JSON.parse(body);
                    if (!resourceType || !data) {
                        res.writeHead(400, { 'Content-Type': 'application/json' });
                        res.end(JSON.stringify({ error: 'resourceType and data parameters are required' }));
                        return;
                    }
                    
                    const result = await createResource(resourceType, data);
                    res.writeHead(201, { 'Content-Type': 'application/json' });
                    res.end(JSON.stringify(result));
                } catch (error) {
                    res.writeHead(500, { 'Content-Type': 'application/json' });
                    res.end(JSON.stringify({ error: error.message }));
                }
            });
            return;
        }
        
        // Endpoint pour mettre à jour une ressource
        if (pathname === '/update_resource' && req.method === 'PUT') {
            let body = '';
            req.on('data', chunk => {
                body += chunk.toString();
            });
            
            req.on('end', async () => {
                try {
                    const { resourceType, id, data } = JSON.parse(body);
                    if (!resourceType || !id || !data) {
                        res.writeHead(400, { 'Content-Type': 'application/json' });
                        res.end(JSON.stringify({ error: 'resourceType, id, and data parameters are required' }));
                        return;
                    }
                    
                    const result = await updateResource(resourceType, id, data);
                    res.writeHead(200, { 'Content-Type': 'application/json' });
                    res.end(JSON.stringify(result));
                } catch (error) {
                    res.writeHead(500, { 'Content-Type': 'application/json' });
                    res.end(JSON.stringify({ error: error.message }));
                }
            });
            return;
        }
        
        // Endpoint pour supprimer une ressource
        if (pathname === '/delete_resource' && req.method === 'DELETE') {
            if (!query.resourceType || !query.id) {
                res.writeHead(400, { 'Content-Type': 'application/json' });
                res.end(JSON.stringify({ error: 'resourceType and id parameters are required' }));
                return;
            }
            
            const result = await deleteResource(query.resourceType, query.id);
            res.writeHead(200, { 'Content-Type': 'application/json' });
            res.end(JSON.stringify(result));
            return;
        }
        
        // Endpoint pour exécuter le script de création d'articles SEO
        if (pathname === '/create_seo_content' && req.method === 'POST') {
            try {
                // Importer le script de création d'articles
                const createSeoContent = require('./app/public/create-seo-content.php');
                
                // Exécuter le script
                const result = await createSeoContent();
                
                res.writeHead(200, { 'Content-Type': 'application/json' });
                res.end(JSON.stringify({ success: true, message: 'SEO content created successfully', result }));
            } catch (error) {
                res.writeHead(500, { 'Content-Type': 'application/json' });
                res.end(JSON.stringify({ error: error.message }));
            }
            return;
        }
        
        // Route par défaut
        res.writeHead(404, { 'Content-Type': 'application/json' });
        res.end(JSON.stringify({ error: 'Not found' }));
    } catch (error) {
        console.error('Erreur serveur:', error);
        res.writeHead(500, { 'Content-Type': 'application/json' });
        res.end(JSON.stringify({ error: error.message }));
    }
});

// Démarrage du serveur
server.listen(PORT, () => {
    console.log(`Serveur WordPress MCP démarré sur le port ${PORT}`);
    console.log(`URL WordPress: ${WP_URL}`);
    console.log(`Utilisateur: ${WP_USERNAME}`);
});
