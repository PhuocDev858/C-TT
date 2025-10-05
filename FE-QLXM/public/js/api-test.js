// Test API Connection
document.addEventListener('DOMContentLoaded', function() {
    // Test connection to backend
    if (window.api) {
        console.log('🔗 API Configuration loaded');
        console.log('Backend URL:', window.config?.API_BASE_URL);
        
        // Test a simple API call (you can customize this based on your backend endpoints)
        window.api.get('/health')
            .then(response => {
                console.log('✅ Backend connection successful:', response.data);
            })
            .catch(error => {
                console.log('❌ Backend connection failed:', error.message);
                
                // Try alternative endpoints
                window.api.get('/')
                    .then(response => {
                        console.log('✅ Backend root endpoint accessible:', response.status);
                    })
                    .catch(err => {
                        console.log('⚠️ Backend might not have CORS configured properly:', err.message);
                    });
            });
    }
});