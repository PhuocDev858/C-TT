import axios from 'axios';

// API Configuration - use window.config if available
const API_BASE_URL = window.config?.API_BASE_URL || 'https://qlxm-778654bd1837.herokuapp.com';
const API_PREFIX = window.config?.API_PREFIX || '/api';

// Configure axios for API calls
window.axios = axios.create({
    baseURL: `${API_BASE_URL}${API_PREFIX}`,
    timeout: 10000,
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    }
});

// Add request interceptor for authentication
window.axios.interceptors.request.use(function (config) {
    // Add auth token if exists
    const token = localStorage.getItem('auth_token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
}, function (error) {
    return Promise.reject(error);
});

// Add response interceptor for error handling
window.axios.interceptors.response.use(
    response => response,
    error => {
        if (error.response?.status === 401) {
            // Handle unauthorized - redirect to login
            localStorage.removeItem('auth_token');
            window.location.href = '/login';
        }
        return Promise.reject(error);
    }
);

// Export API helper functions
window.api = {
    // Auth endpoints
    login: (credentials) => window.axios.post('/login', credentials),
    register: (userData) => window.axios.post('/register', userData),
    logout: () => window.axios.post('/logout'),

    // CRUD operations examples
    get: (endpoint) => window.axios.get(endpoint),
    post: (endpoint, data) => window.axios.post(endpoint, data),
    put: (endpoint, data) => window.axios.put(endpoint, data),
    delete: (endpoint) => window.axios.delete(endpoint),

    // Specific endpoints (customize based on your backend)
    getProducts: () => window.axios.get('/products'),
    getCategories: () => window.axios.get('/categories'),
    getOrders: () => window.axios.get('/orders'),
};